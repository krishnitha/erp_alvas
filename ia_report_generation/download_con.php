<?php

require "../Classes/PHPExcel.php";
require_once "../config.php";
$ia="ia" . $_POST["ia"];

// echo $ia;
$php = PHPExcel_IOFactory::createReader("Excel2007");
$phpExcel=$php->load("../uploads/Consolidated_ia_report.xlsx");
$phpExcel->getDefaultStyle()->getFont()->setSize(13);
$phpExcel ->getProperties()->setTitle("IA" . $_POST['ia']);
$phpExcel ->getProperties()->setCreator("Alva's ERP team");
$phpExcel ->getProperties()->setDescription("IA MARKS");

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
$sheet = $phpExcel->getActiveSheet(); 

$sheet->getCell('A3')->setValue('SEMESTER ' . $_POST['sem'] . $_POST['sec'] . ', IA ' . $_POST['ia'] . ' REPORT');


// $sheet->getCell('A1')->setValue('Branch: ' . $_POST['dept']);
// $sheet->mergeCells("A1:F1");

// $sheet->getCell('A2')->setValue('Internal ' . $_POST['ia'] . ' Marks');
// $sheet->mergeCells("A2:H2");

$sheet->getCell('A5')->setValue('SL.NO');
$sheet->getStyle('A5')->getFont()->setBold(true);
$sheet->getColumnDimension('A')->setWidth(15);
$sheet->getCell('B5')->setValue('USN');
$sheet->getStyle('B5')->getFont()->setBold(true);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getCell('C5')->setValue('Name');
$sheet->getStyle('C5')->getFont()->setBold(true);
$sheet->getColumnDimension('C')->setWidth(30);

$sheet->mergeCells('A5:A6');
$sheet->mergeCells('B5:B6');
$sheet->mergeCells('C5:C6');

$q = 'select distinct sub from ia_marks' . $_POST['ia'] . ' where sem = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and sec = "' . $_POST['sec'] . '" order by sub';
$result = $link->query($q);
$i = ord('D');

      // echo $_SESSION["branch"];

    
    



// $sub_array = array();

foreach ($result as $r) {
    $sheet->getCell(chr($i) . '5')->setValue($r["sub"]);
    $sheet->mergeCells(chr($i) . '5:' . chr($i+1) . '5');
    $sheet->getCell(chr($i) . '6')->setValue('Marks');
    $sheet->getCell(chr($i+1) . '6')->setValue('Att %');
    $sheet->getStyle(chr($i) . '5:' . chr($i+1) . '5')->getFont()->setBold(true);
    $sheet->getColumnDimension(chr($i))->setWidth(strlen($r['sub'])/2);
    $sheet->getColumnDimension(chr($i+1))->setWidth(strlen($r['sub'])/2);

    $i +=2;
}

$q1 = 'select * from students where semester = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and section = "' . $_POST['sec'] . '"';
$result1 = $link->query($q1);
$row=mysqli_num_rows($result1);
// echo $row;
$co = 7;
$c=0;
foreach($result1 as $r1){
    $cha = ord('D');
    
    $q2 = 'select ia' . $_POST["ia"] . ',att_avg from marks where usn = "' . $r1['usn'] . '" and branch = "' . $_POST['dept'] . '" order by sub';
    echo $q2;
    $c++;
    $result2 = $link->query($q2);
    $sheet->getCell('A' . $co)->setValue($c);
    $sheet->getCell('B' . $co)->setValue($r1["usn"]);
    $sheet->getCell('C' . $co)->setValue($r1["fname"] . ' ' . $r1['lname']);
    $count_sub = 0;
    foreach($result2 as $r2){
        $count_sub+=1;
        $sheet->getCell(chr($cha) . $co)->setValue($r2["ia" . $_POST['ia']]);
        $cha += 1;
        $sheet->getCell(chr($cha) . $co)->setValue($r2["att_avg"]);
        $cha += 1;
    }
    $co += 1;
}
$co+=1;
$sheet->getCell('A' . $co)->setValue('# of Students Absent');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);
$result = $link->query($q);
$cha = ord('D');
foreach($result as $r){
$q3="select COUNT(att) as att from ia_marks" . $_POST["ia"] . ' where sem = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and att=0 and sub="' . $r['sub'] . '" and sec = "' . $_POST['sec'] . '"';
// echo $q3;
$result3=$link->query($q3);
$r5= mysqli_fetch_assoc($result3);
print_r($r5);
$sheet->getCell(chr($cha) . $co)->setValue($r5['att']);
$cha+=2;

}
$c=$co;
for($j=0;$j<8;$j++)
{
    $cha = ord('D');
    $cha1=ord('E');
    // $co1=$co+8;
    for($i=0;$i<$count_sub;$i++)
    {
        

        $sheet->mergeCells(chr($cha) . $c . ':' . chr($cha1) . $c);
        $cha+=2;
        $cha1+=2;
        
    }
    $c+=1;
}
$co+=1;
$sheet->getCell('A' . $co)->setValue('# of Students Scored Less than or equal to 14');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);
$cha = ord('D');
foreach($result as $r){
$q3="select COUNT(" . $ia . ') as mark from marks where sem = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and ' . $ia . '<14 and sub="' . $r['sub'] . '" and sec = "' . $_POST['sec'] . '"';
// echo $q3;
$result3=$link->query($q3);
$r5= mysqli_fetch_assoc($result3);
// print_r($r5);
$sheet->getCell(chr($cha) . $co)->setValue($r5['mark']);
$cha+=2;

}
$co+=1;
$sheet->getCell('A' . $co)->setValue('# of Students Scored between 14 and 20');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);
$cha = ord('D');
foreach($result as $r){
    
$q3="select COUNT(" . $ia . ') as mark from marks where sem = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and ' . $ia . ' BETWEEN 14 AND 20  and sub="' . $r['sub'] . '" and sec = "' . $_POST['sec'] . '"';
// echo $q3;
$result3=$link->query($q3);
$r5= mysqli_fetch_assoc($result3);
// print_r($r5);
$sheet->getCell(chr($cha) . $co)->setValue($r5['mark']);
$cha+=2;

}
$co+=1;
$sheet->getCell('A' . $co)->setValue('# of Students Scored above 20');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);
$cha = ord('D');
foreach($result as $r){
    
$q3="select COUNT(" . $ia . ') as mark from marks where sem = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and ' . $ia . '>20 and sub="' . $r['sub'] . '" and sec = "' . $_POST['sec'] . '"';
// echo $q3;
$result3=$link->query($q3);
$r5= mysqli_fetch_assoc($result3);
// print_r($r5);
$sheet->getCell(chr($cha) . $co)->setValue($r5['mark']);
$cha+=2;

}
$co+=1;
$sheet->getCell('A' . $co)->setValue('# of Students Scored 30');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);
$cha = ord('D');
foreach($result as $r){
    
$q3="select COUNT(" . $ia . ') as mark from marks where sem = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and ' . $ia . '=30 and sub="' . $r['sub'] . '" and sec = "' . $_POST['sec'] . '"';
// echo $q3;
$result3=$link->query($q3);
$r5= mysqli_fetch_assoc($result3);
// print_r($r5);
$sheet->getCell(chr($cha) . $co)->setValue($r5['mark']);
$cha+=2;

}
$co+=1;
$sheet->getCell('A' . $co)->setValue('Pass percentage');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);
$cha = ord('D');
foreach($result as $r){
$q3="select COUNT(" . $ia . ') as mark from marks where sem = "' . $_POST['sem'] . '" and branch = "' . $_POST['dept'] . '" and ' . $ia . '>=14 and sub="' . $r['sub'] . '" and sec = "' . $_POST['sec'] . '"';
// echo $q3;
$result3=$link->query($q3);
$r5= mysqli_fetch_assoc($result3);
// print_r($r5);
$sheet->getCell(chr($cha) . $co)->setValue(ceil(($r5['mark']/$row)*100));
echo $r5['mark'];
$cha+=2;

}
$co+=1;
$sheet->getCell('A' . $co)->setValue('Staff Incharge');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);
$cha = ord('D');
foreach($result as $r){
    $rr=explode(' - ',$r['sub']);
    $q4='select f.faculty_name from faculty_details f,faculty_mapping m where m.faculty_name=f.faculty_name and m.sub_name="' . $rr[1] . '" and f.faculty_dept="' . $_POST["dept"] . '";';
    $result4=$link->query($q4);
    $rr1=mysqli_fetch_assoc($result4);
    $sheet->getCell(chr($cha) . $co)->setValue($rr1["faculty_name"]);
    $cha+=2;

}
$co+=1;
$sheet->getCell('A' . $co)->setValue('Staff Signature');
$sheet->getStyle('A' . $co)->getFont()->setBold(true);
$sheet->mergeCells('A' . $co . ':C' . $co);



// $sheet->getColumnDimension('A')->setWidth(15);
if(file_exists('../uploads/ia_report_generated_'  . $_POST['dept'] . '.xlsx')){
    unlink('../uploads/ia_report_generated_'  . $_POST['dept'] . '.xlsx');
}
    
$writer->save('../uploads/ia_report_generated_'  . $_POST['dept'] . '.xlsx');

// $url = '../uploads/ia_report_generated_'  . $_POST['dept'] . '.xlsx';
// $file_name = 'ia_report_generated_'  . $_POST['dept'] . '.xlsx';
// file_put_contents( $file_name,file_get_contents($url));

?>

<a href="<?php echo '../uploads/ia_report_generated_'  . $_POST['dept'] . '.xlsx' ?>" download id="down">qqqqqqqqqqqq</a>
<script>
    document.getElementById('down').click();
    

    window.location.replace("https://alvaserp.azurewebsites.net/ia_report_generation/select_semester.php");
</script>



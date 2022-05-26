<?php
include("../template/stud_auth.php");
error_reporting(0);
include(
"../template/student_sidebar.php");
?>
<?php
    // include "template/admin-auth.php";
    require_once '../config.php';
    // echo $_SESSION["username"];
    $q1 = 'select branch, semester from students where usn = "' . $_SESSION['username'] . '"';
    $r1 = mysqli_fetch_assoc($link->query($q1));
    $branch = $r1['branch'];
    $sem = $r1['semester'];


    $q = 'select * from subjects where branch = "' . $branch . '" and sem = "' . $sem . '"';
    $sub = array();
    $subcode = array();
    $marks = array();
    $result = $link -> query($q);
    $num_sub = mysqli_num_rows($result);
    foreach($result as $r){
        $sub[] = $r['sub_name'];
        $subcode[] = $r['sub_code'];
    }
    for($i = 0; $i < $num_sub; $i++){
        $q2 = 'select total1 from ia_marks1 where sub = "' . $subcode[$i] . ' - ' . $sub[$i] . '" and usn = "' . $_SESSION['username'] . ' "';
        $marks[$i] = mysqli_fetch_assoc($link->query($q2))['total1'] ?? 0;
    }

    // Notification check

    

    // Notification check




?>
<style>
    #Back-btn{display: none;}
</style>
<div>
    <h1>Welcome <?php echo $_SESSION["username"] ?> </h1>
    
        <div class="row">
            <div class="col">
                <div id="chart">
                    <canvas id="myChart" style="width:100%;max-height:500px;min-height:300px;"></canvas>
                </div>
            </div>
        </div>
    
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script >
    var subjects = [];
    var marks = []
    var i = 0;
    var j = 0;
    <?php 
    foreach($subcode as $s){
    ?>
        subjects[i++] = "<?php echo $s ?>";
    <?php   }
    foreach($marks as $m){
    ?>
        marks[j++] = "<?php echo $m ?>";
    <?php } ?>
    console.log(subjects);
    console.log(marks);
    
</script>
<script>


var myChart = new Chart("myChart", {
    type: 'bar',
    data: {
        labels: subjects,
        datasets: [{
            label: 'Marks',
            data: marks,
            backgroundColor: [
                '#ffe6b877'

            ],
            borderColor: [
                '#fea90f'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            },
            yAxes: [{
            ticks: {
                fontSize: 14
            }
        }],
        xAxes: [{
            ticks: {
                fontSize: 14
            }
        }]
        },

    }
});
</script>
<?php
include("../template/student-footer.php");
?>
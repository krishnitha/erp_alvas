<?php
    include "../template/fac-auth.php";
    include "../template/sidebar-fac.php";

    $q = 'select distinct sub from co_po where to_hod="' . $_SESSION["username"] . '" and approval="waiting"';
    $res = $link -> query($q);

    $qs = 'select distinct sub from co_pso where to_hod="' . $_SESSION["username"] . '" and approval="waiting"';
    $ress = $link -> query($qs);

    $ql = 'select * FROM student_medical_leave as s WHERE status = 0 and (select branch from students where usn = s.usn) = (select branch from hod WHERE name = "' . $_SESSION["username"] . '")';
    $resl = $link -> query($ql);

?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabriela&display=swap" rel="stylesheet">
<div class="container">
    <div class="row">
        <h1 class="" style="font-family: 'Gabriela', serif;" >CO-PO-Approval</h1>
        
        <?php  
            if( mysqli_num_rows($res) != 0){
            foreach($res as $r){ ?>
            <table class="table table-responsive table-striped mt-3">
                
                <h4 class="mt-2">  Subject: <?php echo $r["sub"] ?></h4>
                <thead>
                    <tr class="" >
                    <th scope="col">CO</th>
                    <th scope="col" style="width: 9%;" >PO1</th>
                    <th scope="col" style="width: 9%;" >PO2</th>
                    <th scope="col" style="width: 9%;" >PO3</th>
                    <th scope="col" style="width: 9%;" >PO4</th>
                    <th scope="col" style="width: 9%;" >PO5</th>
                    <th scope="col" style="width: 9%;" >PO6</th>
                    <th scope="col" style="width: 9%;" >PO7</th>
                    <th scope="col" style="width: 9%;" >PO8</th>
                    <th scope="col" style="width: 9%;" >PO9</th>
                    <th scope="col" style="width: 9%;" >PO10</th>
                    <th scope="col" style="width: 9%;" >PO11</th>
                    <th scope="col" style="width: 9%;" >PO12</th>
                    
                    </tr>
                </thead>

            <?php
                $q1 = 'select * from co_po where sub="' . $r["sub"] . '" and to_hod="' . $_SESSION["username"] . '" and approval="waiting"';
                $res1 = $link -> query($q1);
                foreach($res1 as $r1){ ?>
                <tbody>
                    <tr>
                        <td><?php echo $r1["co"]; ?></td>
                        <td><?php echo $r1["po1"]; ?></td>
                        <td><?php echo $r1["po2"]; ?></td>
                        <td><?php echo $r1["po3"]; ?></td>
                        <td><?php echo $r1["po4"]; ?></td>
                        <td><?php echo $r1["po5"]; ?></td>
                        <td><?php echo $r1["po6"]; ?></td>
                        <td><?php echo $r1["po7"]; ?></td>
                        <td><?php echo $r1["po8"]; ?></td>
                        <td><?php echo $r1["po9"]; ?></td>
                        <td><?php echo $r1["po10"]; ?></td>
                        <td><?php echo $r1["po11"]; ?></td>
                        <td><?php echo $r1["po12"]; ?></td>
                    </tr>
                </tbody>
            


                <?php
                }
            ?>
            </table>
            <form action="approve_po.php" method="post">
                <input type="text" name="sub" value="<?php echo $r['sub'] ?>" hidden>
                <input type="submit" class="btn btn-info" value="Approve">
            </form>
            
            <?php
            }}
            else{
                echo '<h5> No Approvals Needed</h5>';
            }
            ?>   
    </div>
    <div class="row mt-5">
        <h1 style="font-family: 'Gabriela', serif;" >CO-PSO-Approval</h1>
        <?php  
        if( mysqli_num_rows($ress) != 0){
            foreach($ress as $r){ ?>
            <table class="table table-responsive table-striped mt-3">
                
                <h3>Subject: <?php echo $r["sub"] ?></h3>
                <thead>
                    <tr class="" >
                    <th scope="col" style="width: 9%;">CO</th>
                    <th scope="col" style="width: 9%;" >PSO1</th>
                    <th scope="col" style="width: 9%;" >PSO2</th>
                    <th scope="col" style="width: 9%;" >PSO3</th>
                    <th scope="col" style="width: 9%;" >PSO4</th>
                    <th scope="col" style="width: 9%;" >PSO5</th>
                    
                    </tr>
                </thead>

            <?php
                $q1 = 'select * from co_pso where sub="' . $r["sub"] . '" and to_hod="' . $_SESSION["username"] . '" and approval="waiting"';
                $res1 = $link -> query($q1);
                foreach($res1 as $r1){ ?>
                <tbody>
                    <tr>
                        <td><?php echo $r1["co"]; ?></td>
                        <td><?php echo $r1["pso1"]; ?></td>
                        <td><?php echo $r1["pso2"]; ?></td>
                        <td><?php echo $r1["pso3"]; ?></td>
                        <td><?php echo $r1["pso4"]; ?></td>
                        <td><?php echo $r1["pso5"]; ?></td>
                    </tr>
                </tbody>
            


                <?php
                }
            ?>
            </table>
            <form action="approve_pso.php" method="post">
                <input type="text" name="sub" value="<?php echo $r['sub'] ?>" hidden>
                <input type="submit" class="btn btn-info" value="Approve">
            </form>
            
            <?php
            }}
            else{
                echo '<h5> No Approvals Needed</h5>';
            }
            ?>   
    </div>

    <div class="row mt-5">
        <h1 style="font-family: 'Gabriela', serif;" >Student Leave Approval</h1>
        <?php  
        if( mysqli_num_rows($resl) != 0){
            foreach($resl as $r){ ?>
            <h4 style="margin-top: 50px;">USN : <?php echo $r["usn"] ?></h4>
            <table class="table table-responsive table-striped mt-3">
                <tbody>
                    <tr class="" >
                        <td scope="col" style="width: 1%;">Reason</td>
                        <td scope="col" style="width: 1%;">:</td>
                        <td scope="col" style="width: 85%;" ><?php echo $r["reason"] ?></td>
                    </tr>
                    <tr class="" >
                        <td scope="col" style="width: 1%;">From</td>
                        <td scope="col" style="width: 1%;">:</td>
                        <td scope="col" style="width: 85%;" ><?php echo $r["from_date"] ?></td>
                    </tr>
                    <tr class="" >
                        <td scope="col" style="width: 1%;">To</td>
                        <td scope="col" style="width: 1%;">:</td>
                        <td scope="col" style="width: 85%;" ><?php echo $r["to_date"] ?></td>
                    </tr>
                    <tr class="" >
                        <td scope="col" style="width: 1%;">Document</td>
                        <td scope="col" style="width: 1%;">:</td>
                        <td scope="col" style="width: 85%;" ><a href="<?php echo $r["doc_name"]; ?>" target="_blank" style="color:blue">View</a></td>
                    </tr>
                </tbody>
            </table>
            <form action="approve_student_medical.php" method="post">
                <input type="text" name="id" value="<?php echo $r['id'] ?>" hidden>
                <input type="submit" class="btn btn-success" name ="approve" value="Approve">
                <input type="submit" class="btn btn-danger" style="margin-left: 40px;" name ="reject" value="Reject">
            </form>
            
            <?php
            }}
            else{
                echo '<h5> No Approvals Needed</h5>';
            }
            ?>   
    </div>
</div>

<?php
    include "../template/footer-fac.php";
?>
<?php


require_once '../config.php';
session_start();








?>

<div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">slno</th>
        <th scope="col">usn</th>
        <th scope="col">name</th>
        <th scope="col">Assignment 1</th>
        <th scope="col">Marks scored</th>
        <th scope="col">Marks scored</th>
        <th scope="col">Max Marks</th>
        <th scope="col">Options</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $cnt = 0;
      foreach ($result as $row) {
        $cnt++;
      ?>
        <form action="fac_assignment_marks_upload.php" method="post">
          
          
          <tr class="">
            <th scope="row"><?php echo $cnt ?></th>
            <td>
              <input type="text" class="form-control tab2-1a" value="<?php echo $row['usn']?>"  name="usn" >
            </td>
            <td>
              <input type="text" class="form-control tab2-1a" value="<?php echo $row['stud_name'] ?>"  name="stud_name" >
            </td>
            <td>
              <input type="number" min="0" max="10" class="form-control tab2-1a" value="<?php echo $row['marks_obt'] ?>"  name = "marks_obt">
            </td>
            <td>
              <input type="number" min="0" max="10" class="form-control tab2-1a" value="<?php echo $row['max_marks'] ?>"  name = "max_marks">
            </td>


            <td>
              <button class="btn btn-md btn-info"> Save! </button>
            </td>
            
           

          </tr>
        </form>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
<?php
      require "header.php";
      include "sidebar.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
            </div>
            <div class="col-sm-6">
            <a class="btn btn-success float-sm-right" href="changeallresult.php">Change Result of the All students</a>
            <a style="margin:0 5px" class="btn btn-success  float-sm-right" href="addstudent.php">Add student</a>
            <a style="margin:0 5px" class="btn btn-default  float-sm-right" onclick="print()">Print</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Students Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Guardian</th>
                    <th>Guardian Phone</th>
                    <th>BirthDate</th>
                    <th>Address</th>
                    <th>Stage</th>
                    <th>level</th>
                    <th>Class</th>
                    <th>Passed</th>
                    <th>Notes</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                        $students_query = "select * from students";
                        $students_result=  mysqli_query($conn,$students_query);
                        foreach($students_result as $students_row){ 
                  ?> 
                    <td><?=$students_row['id']?></td>
                    <td><a href="studentprofile.php?&student_id=<?=$students_row['id']?>" ><?=$students_row['name']?> </td>
                    <td><?=$students_row['guardian_name']?></td>
                    <td>0<?=$students_row['guardian_phone']?></td>
                    <td><?=$students_row['birthdate']?></td>
                    <td><?=$students_row['address']?></td>
                    <td><?=$students_row['stage']?></td>
                    <td><?=$students_row['level']?></td>
                    <td><?php 
                    if(!empty($students_row['class'])){
                      echo $students_row['class'];
                    }else { 
                      echo '<a href="assignstudent.php?&student_id='.$students_row['id'].'" class="fas fa-plus"></a>';
                    }
                    ?>
                    </td>
                    <td><?=$students_row['success']?></td>
                    <td><?=$students_row['notes']?></td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="editstudent.php?&student_id=<?=$students_row['id']?>" class="fas fa-pen"></a>  
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="deletestudent.php?&student_id=<?=$students_row['id']?>" class="fas fa-trash"></i></td>
                  </tr>
               <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <form method="post" action="studentsExport.php">
                <input type="submit" name="export" class="btn btn-success" value="Export To Excel" />
           </form>


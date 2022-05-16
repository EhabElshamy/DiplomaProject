<?php
      require "header.php";
      require "sidebar.php";
      $stage = $_GET['class_stage'];
      $level = $_GET['class_level'];
      $class_name = $_GET['class_name'];

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) Students -->
        <?php
                        $students_query = "select * from `students` where `stage` = '$stage' AND `level` = '$level' AND `class` = '$class_name'";
                        $students_result=  mysqli_query($conn,$students_query);
                        $students_number = mysqli_num_rows($students_result);
        ?>  
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$students_number?></h3>

                <p>Student </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -- Teachers -->
            <?php
                        $teachers_query = "select * from `teachers` where `stage` = '$stage' AND `level` = '$level' AND `class` = '$class_name'";
                        $teachers_result=  mysqli_query($conn,$teachers_query);
                        $teachers_number = mysqli_num_rows($teachers_result);
            ?> 
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$teachers_number?><sup style="font-size: 20px"></sup></h3>

                <p>Teacher</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box coursers -->
            <?php
                        $courses_query = "select * from `courses` where `stage` = '$stage' AND `level` = '$level' AND `class` = '$class_name'";
                        $courses_result=  mysqli_query($conn,$courses_query);
                        $courses_number = mysqli_num_rows($courses_result);
            ?> 
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$courses_number?></h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>


      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Students Info</h3>
                <a class="btn btn-success float-sm-right" href="changeclassresult.php?class_level=<?=$level?>&class_stage=<?=$stage?>&class_name=<?=$class_name?>">Change Result of the All students in Class</a>
                <a style="margin:0 5px" class="btn btn-default  float-sm-right" onclick="print()">Print</a>
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

                
            </div>
            </div>
            </div>
            </div>
            </div>


<?php
    include "footer.php";
?>
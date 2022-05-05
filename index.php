    <?php
      include "header.php";
      include "sidebar.php";
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
                        $students_query = "select * from students";
                        $students_result=  mysqli_query($conn,$students_query);
                        $students_number = mysqli_num_rows($students_result);
        ?>  
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$students_number?></h3>

                <p>Student </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="students.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -- Teachers -->
            <?php
                        $teachers_query = "select * from teachers";
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
              <a href="teachers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box coursers -->
            <?php
                        $courses_query = "select * from courses";
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
              <a href="courses.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box classes -->
            <?php
                        $classes_query = "select * from classes";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        $classes_number = mysqli_num_rows($classes_result);
            ?> 
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$classes_number?></h3>

                <p>Classes</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="classes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>


    </section>
  </div>
<?php
include "footer.php";
?>
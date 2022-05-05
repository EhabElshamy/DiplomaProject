<?php
      include "header.php";
      include "sidebar.php";
      $course_id= $_GET['course_id'];


 //submitting the form
    $message = "";
    if(isset($_POST['submit'])){

    $class = $_POST['class'];
    
    $InsertClassInCourseQuery=mysqli_query($conn,"UPDATE `courses` SET `class`='$class' WHERE `id`='$course_id'");

    if(!$InsertClassInCourseQuery){
        
        
            echo "MySQLi Connection was not established: " . mysqli_connect_error();
        
        }else {
        $message = " Data Updated Successfully";
        }
    }
      
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Class</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Assign Course to Class</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
          <form action="#" method="post">
            <div class="card-body">
              <div class="form-group">
              <?php
                  if (!empty($message)) {
                      echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i> Success!</h5>
                    </div>';
                  }
                  ?>

                <label for="inputStatus">Choose the class you want to assign the course to</label>
                <select name= "class" id="inputStatus" class="form-control custom-select">
                  <!-- get the stages and levels  -->
                  <?php
                         $course_id= $_GET['course_id'];
                         // get student by id
                         $courses_query = "select * from teachers where id = '$course_id'";
                         $courses_result=  mysqli_query($conn,$courses_query);
                         foreach($courses_result as $courses_row){ 
                         $coursestage=$courses_row['stage'];
                         $courselevel=$courses_row['level'];
                         // get stage info by student ifo //
                         $stages_query  = "select * from stages where name ='$coursestage' AND level = '$courselevel'";
                         $stages_result = mysqli_query($conn,$stages_query);
                         foreach($stages_result as $course_stage_level){ 
                         $coursestagecode= $course_stage_level['code'];
                         $classes_query = "select * from classes where stage_code = '$coursestagecode'";
                         $classes_result=  mysqli_query($conn,$classes_query);
                         foreach($classes_result as $classes_row){
                  ?>
                  <option><?= $classes_row['name'] ?></option>
                 <?php }}} ?> 
                </select>
                <br> <br>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
 
        <div class="row">
        <div class="col-12">
          <input name="submit" type="submit" value="Assign Class" class="btn btn-success float-right">
        </div>
      </form>
      </div>
      </div>
    </section>

<?php
      include "header.php";
      include "sidebar.php";
      $teacher_id= $_GET['teacher_id'];


 //submitting the form
    $message = "";
    if(isset($_POST['submit'])){

    $class = $_POST['class'];
    
    $InsertClassInTeacherQuery=mysqli_query($conn,"UPDATE `teachers` SET `class`='$class' WHERE `id`='$teacher_id'");

    if(!$InsertClassInTeacherQuery){
        
        
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
              <h3 class="card-title">Assign teacher to Class</h3>

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

                <label for="inputStatus">Choose the class you want to assign the teacher to</label>
                <select name= "class" id="inputStatus" class="form-control custom-select">
                  <!-- get the stages and levels  -->
                  <?php
                         $teacher_id= $_GET['teacher_id'];
                         // get student by id
                         $teachers_query = "select * from teachers where id = '$teacher_id'";
                         $teachers_result=  mysqli_query($conn,$teachers_query);
                         foreach($teachers_result as $teachers_row){ 
                         $teacherstage=$teachers_row['stage'];
                         $teacherlevel=$teachers_row['level'];
                         // get stage info by student ifo //
                         $stages_query  = "select * from stages where name ='$teacherstage' AND level = '$teacherlevel'";
                         $stages_result = mysqli_query($conn,$stages_query);
                         foreach($stages_result as $teacher_stage_level){ 
                         $teacherstagecode= $teacher_stage_level['code'];
                         $classes_query = "select * from classes where stage_code = '$teacherstagecode'";
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

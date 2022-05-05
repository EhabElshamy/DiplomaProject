<?php
      include "header.php";
      include "sidebar.php";
      $message = "";
 if(isset($_POST['submit'])){

  $student_name  = $_POST['student_name'];
  $guardian_name = $_POST['guardian_name'];
  $guardian_phone =$_POST['guardian_phone'];
  $birthdate  = $_POST['birthdate'];
  $stage = $_POST['stage'];
  $level = $_POST['level'];


  $InsertClassInStudentQuery=mysqli_query($conn,"  INSERT INTO `students`(`name`, `guardian_name`, `guardian_phone`, `birthdate`, `stage`, `level`) VALUES ('$student_name','$guardian_name','$guardian_phone','$birthdate','$stage','$level')
  ");
  if($InsertClassInStudentQuery) $message = "Data Inserted Successfully";
  
 }
?>
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Student</h1>
          </div>
 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Student Info</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form method="post" action="#">
            <div class="card-body">
              <div class="form-group">
              <?php
                  if (!empty($message)) {
                      echo '              <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i>'.$message.'</h5>
                    </div>';
                  }
                  ?>
                <label for="inputName">Student Name</label>
                <input  name="student_name" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Guardian Name</label>
                <input name="guardian_name" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Guardian Phone Number</label>
                <input name="guardian_phone" type="number" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Student Birthdate</label>
                <input name="birthdate" type="date" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputStatus">Stage</label>
                <select required name="stage" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Kindergarden</option>
                  <option>Primary</option>
                  <option>Preparatory</option>
                  <option>Secondary</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Level</label>
                <select required name="level" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>One</option>
                  <option>two</option>
                  <option>three</option>
                  <option>four</option>
                  <option>five</option>
                  <option>six</option>
                </select>
              </div>
              <!-- <div class="form-group">
                <label for="inputStatus">Class</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Success</option>
                </select>
              </div> -->
     
            <!-- /.card-body -->
            <input name="submit" type="submit" value="Add New Student" class="btn btn-success float-right">
            </section>
            </div>
            </div>
                </form>






<?php
include "footer.php";
?>

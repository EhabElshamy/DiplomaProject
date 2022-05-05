<?php
      include "header.php";
      include "sidebar.php";
      $message = "";
 if(isset($_POST['submit'])){

  $teacher_name  = $_POST['teacher_name'];
  $phone_number =$_POST['phone_number'];
  $qualifications = $_POST['qualifications'];
  $birthdate  = $_POST['birthdate'];
  $stage = $_POST['stage'];
  $level = $_POST['level'];


  $InsertClassInTeachersQuery=mysqli_query($conn,"INSERT INTO `teachers`(`name`, `phone`, `birthdate`, `qualifications`, `stage`, `level`) VALUES ('$teacher_name','$phone_number','$birthdate','$qualifications','$stage','$level')");
  if($InsertClassInTeachersQuery) 

  
    $message = "Data Inserted Successfully";
  
 }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Teacher</h1>
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
              <h3 class="card-title">Teacher Info</h3>

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
                      echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i>'.$message.'</h5>
                    </div>';
                  }
                  ?>
                <label for="inputName">Teacher Name</label>
                <input name="teacher_name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Phone Number</label>
                <input name="phone_number" type="number" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Phone Number</label>
                <input name="birthdate" type="date" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Qualifications</label>
                <select required name="qualifications" id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Bachelor</option>
                  <option>Diploma</option>
                  <option>Master</option>
                  <option>PhD</option>
                </select>
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

     
            <!-- /.card-body -->
            <input name="submit" type="submit" value="Add New teacher" class="btn btn-success float-right">
            </section>
          </form>
            </div>
            </div>






<?php
include "footer.php";
?>

<?php
      include "header.php";
      include "sidebar.php";
      $student_id= $_GET['student_id'];
      $message = "";
 if(isset($_POST['submit'])){

  $student_name  = $_POST['student_name'];
  $guardian_name = $_POST['guardian_name'];
  $guardian_phone =$_POST['guardian_phone'];
  $birthdate  = $_POST['birthdate'];
  $address =$_POST['address'];
  $notes =$_POST['notes'];
  $class = $_POST['class'];



  $InsertClassInStudentQuery=mysqli_query($conn,"UPDATE `students`
   SET `name`='$student_name',`guardian_name`='$guardian_name',`guardian_phone`='$guardian_phone',`birthdate`='$birthdate',`address` ='$address' , `notes` = '$notes',`class`='$class'
   WHERE `id` = '$student_id'");
  if($InsertClassInStudentQuery) $message = "Data Updated Successfully";
  
  }
      
?>      
?>
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student info</h1>
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
              <h3 class="card-title">Update Student Info</h3>

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
                  $students_query = "select * from students where id = '$student_id'";
                  $students_result=  mysqli_query($conn,$students_query);
                  foreach($students_result as $students_row){ 
                    $student_stage = $students_row['stage'];
                    $student_level = $students_row['level'];
                    $student_class = $students_row['class'];
                  ?>
                <label for="inputName">Student Name</label>
                <input  name="student_name" value="<?=$students_row['name']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Guardian Name</label>
                <input name="guardian_name" value="<?=$students_row['guardian_name']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Guardian Phone Number</label>
                <input name="guardian_phone" value="<?=$students_row['guardian_phone']?>" type="number" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Student Birthdate</label>
                <input name="birthdate" value="<?=$students_row['birthdate']?>" type="date" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Student Address</label>
                <input name="address" value="<?=$students_row['address']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Student Notes</label>
                <input name="notes" value="<?=$students_row['notes']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
              <label for="inputDescription">Student class</label>
              <select name= "class" id="inputStatus" class="form-control custom-select">
              <option selected disabled><?= $student_class ?></option>
                  <?php
                         $stages_query  = "select * from stages where name ='$student_stage' AND level = '$student_level'";
                         $stages_result = mysqli_query($conn,$stages_query);
                         foreach($stages_result as $student_stage_level){ 
                         $studentstagecode= $student_stage_level['code'];
                         $classes_query = "select * from classes where stage_code = '$studentstagecode' AND name <> '$student_class' ";
                         $classes_result=  mysqli_query($conn,$classes_query);
                         foreach($classes_result as $classes_row){
                  ?>
                  <option><?= $classes_row['name'] ?></option>
                 <?php }} ?> 
                </select>
<?php } ?>
                         </div>
              <!-- <div class="form-group">
                <label for="inputStatus">Class</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Success</option>
                </select>
              </div> -->
     
            <!-- /.card-body -->
            <input name="submit" type="submit" value="Update Student Data" class="btn btn-success float-right">
            </section>
            </div>
            </div>
                </form>






<?php
include "footer.php";
?>

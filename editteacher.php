<?php
      include "header.php";
      include "sidebar.php";
      $teacher_id= $_GET['teacher_id'];
      $message = "";
 if(isset($_POST['submit'])){

  $teacher_name  = $_POST['teacher_name'];
  $qualifications = $_POST['qualifications'];
  $phone_number =$_POST['phone_number'];
  $birthdate  = $_POST['birthdate'];
  $address =$_POST['address'];
  $notes =$_POST['notes'];



  $InsertClassInTeacherQuery=mysqli_query($conn,"UPDATE `teachers` SET `name`='$teacher_name',`qualifications`='$qualifications',`phone`='$phone_number',`birthdate`='$birthdate',`address` ='$address' , `notes` = '$notes' WHERE `id` = '$teacher_id'");
  if($InsertClassInTeacherQuery) $message = "Data Updated Successfully";
  
  }
      
?>      
?>
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
              <h3 class="card-title">Update teacher Info</h3>

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
                  $teachers_query = "select * from teachers where id = '$teacher_id'";
                  $teachers_result=  mysqli_query($conn,$teachers_query);
                  foreach($teachers_result as $teachers_row){ 
                  ?>
                <label for="inputName">Teacher Name</label>
                <input  name="teacher_name" value="<?=$teachers_row['name']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Phone Number</label>
                <input name="phone_number" value="<?=$teachers_row['phone']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Qualifications</label>
                <input name="qualifications" value="<?=$teachers_row['qualifications']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Birthdate</label>
                <input name="birthdate" value="<?=$teachers_row['birthdate']?>" type="date" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription"> Address</label>
                <input name="address" value="<?=$teachers_row['address']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription"> Notes</label>
                <input name="notes" value="<?=$teachers_row['notes']?>" type="text" id="inputName" class="form-control" required>
              </div>
<?php } ?>
              <!-- <div class="form-group">
                <label for="inputStatus">Class</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Success</option>
                </select>
              </div> -->
     
            <!-- /.card-body -->
            <input name="submit" type="submit" value="Update Teacher Data" class="btn btn-success float-right">
            </section>
            </div>
            </div>
                </form>






<?php
include "footer.php";
?>

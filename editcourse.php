<?php
      include "header.php";
      include "sidebar.php";
      $course_id= $_GET['course_id'];
      $message = "";
 if(isset($_POST['submit'])){

    $course_name  = $_POST['course_name'];
    $description =$_POST['description'];




  $InsertClassIncourseQuery=mysqli_query($conn,"UPDATE `courses` SET `name`='$course_name',`description`='$description' WHERE `id` = '$course_id'");
  if($InsertClassIncourseQuery) $message = "Data Updated Successfully";
  
  }
      
?>      
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Course info</h1>
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
              <h3 class="card-title">Update course Info</h3>

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
                  $courses_query = "select * from courses where id = '$course_id'";
                  $courses_result=  mysqli_query($conn,$courses_query);
                  foreach($courses_result as $courses_row){ 
                  ?>
                <label for="inputName">course Name</label>
                <input  name="course_name" value="<?=$courses_row['name']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Course Description</label>
                <input name="description" value="<?=$courses_row['description']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <!-- <div class="form-group">
                <label for="inputDescription">Qualifications</label>
                <input name="qualifications" value="<?=$courses_row['qualifications']?>" type="text" id="inputName" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Student Birthdate</label>
                <input name="birthdate" value="<?=$courses_row['birthdate']?>" type="date" id="inputName" class="form-control" required>
              </div> -->
<?php } ?>
              <!-- <div class="form-group">
                <label for="inputStatus">Class</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Success</option>
                </select>
              </div> -->
     
            <!-- /.card-body -->
            <input name="submit" type="submit" value="Update course Data" class="btn btn-success float-right">
            </section>
            </div>
            </div>
                </form>






<?php
include "footer.php";
?>

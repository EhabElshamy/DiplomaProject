<?php
      include "header.php";
      include "sidebar.php";
      $teacher_id=$_GET['teacher_id'];
      $teachers_query = "select * from teachers where id = $teacher_id";
      $teachers_result=  mysqli_query($conn,$teachers_query);
      foreach($teachers_result as $teachers_row){ 
        $teacher_name= $teachers_row['name'];
        //$guardian_name = $teachers_row['guardian_name'];
        //$guardian_phone = $teachers_row['guardian_phone'];
        $teacher_birthday =  $teachers_row['birthdate'];
        $teacher_address  = $teachers_row['address'];
        $teacher_image    = $teachers_row['image'];
        $teacher_stage=  $teachers_row['stage'];
        $teacher_level = $teachers_row['level'];
        $teacher_class = $teachers_row['class'];
        //$teacher_result= $teachers_row['success'];
        $teacher_notes = $teachers_row['notes'];
      }
      if (isset($_POST['notes'])){
        $notes = $_POST['notes'];

        $UpdateteacherNotesQuery="UPDATE `teachers` SET `notes`='$notes' WHERE `id` = '$teacher_id'";
        $UpdateteacherNotesResult= mysqli_query($conn,$UpdateteacherNotesQuery);
        if(!$UpdateteacherNotesResult){
          echo mysqli_error($conn);
        }
      }

      if (isset($_FILES['photo']['tmp_name'])){
        $imagename=addslashes( $_FILES['photo']['tmp_name']);
        $image=$_FILES['photo']['tmp_name'];
         $types = array('image/jpg', 'image/gif','image/png','image/jpeg');
            if (!in_array($_FILES['photo']['type'], $types))
          {
             echo "
             <div style='text-align:center;text-transform:capitalize' class='alert alert-danger alert-dismissible' role='start'>
                This in not an image.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            ";
          }
          else {
             if(!$image) {
              echo "
                 <div style='text-align:center;text-transform:capitalize' class='alert alert-danger alert-dismissible' role='start'>
                            Please Choose an Image
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";
             } else {    
              $folder= "dist/img/";    
                move_uploaded_file($_FILES["photo"]["tmp_name"], "$folder".$_FILES["photo"]["name"]);
                $path="dist/img/".$_FILES['photo']['name'];
        
        
                $UpdateteacherProfilePageQuery="UPDATE `teachers` SET `image`='$path'  WHERE `id` = '$teacher_id'";
                $UpdateteacherProfilePageResult= mysqli_query($conn,$UpdateteacherProfilePageQuery);
                if(!$UpdateteacherProfilePageResult){
                  echo mysqli_error($conn);
                }

             }
            }
          }       
       
?>      
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
            <a class="btn btn-default   float-sm-right" onclick="print()">Print</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=$teacher_image?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$teacher_name?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Stage</b> <a class="float-right"><?=$teacher_stage ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Level</b> <a class="float-right"><?=$teacher_level ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>class</b> <a class="float-right"><?=$teacher_class ?></a>
                  </li>

                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?=$teacher_address?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Birthdate </strong>

                <p class="text-muted">
                  <span class="tag tag-danger"><?=$teacher_birthday?></span>

                </p>
                <hr>


                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted"><?=$teacher_notes?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Courses</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php
                            $courses_query  = "SELECT * FROM `courses` WHERE `stage` = '$teacher_stage' AND `level` = '$teacher_level' AND `class` = '$teacher_class'";
                            $courses_result =  mysqli_query($conn,$courses_query);
                      
                            foreach($courses_result as $courses_row){
                              $course_name = $courses_row['name'];
                              $course_description  = $courses_row['description'];
                            
                      ?>
                    <div class="post">
                      <div class="user-block">

                        <span class="username">
                           <a href="#"><?=$course_name?></a>
                        </span>

                      </div>

                      <p>
                                <?=$course_description?>
                      </p>
                      <?php } ?> 



                    </div>
                    <hr>
                    <form class="form-horizontal" method="post" action="#">
                    <div class="form-group">
                    <label for="exampleInputFile">Update Teacher Notes</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" name="notes" class="custom-file-label" id="exampleInputFile" value="<?=$teacher_notes ?>">
                      </div>
                      <div class="input-group-append">
                        <button name="updatenotes" type="submit" class="btn btn-success">update</button>
                      </div>
                    </div>
                    </form>

                    <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="exampleInputFile">Update Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-label" id="exampleInputFile" value="">
                      </div>
                      <div class="input-group-append">
                        <button name="update" type="submit" class="btn btn-success">update</button>
                      </div>
                    </div>
                    </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>


          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong><a>teacherAffairs</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src=" /plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src=" /plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src=" /dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" /dist/js/demo.js"></script>
</body>
</html>

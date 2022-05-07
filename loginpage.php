<?php
      include "header.php";
      include "sidebar.php";
      $message = "";

      if(isset($_POST['submit'])){

        $login_message = $_POST['loginmessage'];
      if (isset($_FILES['mainphoto']['tmp_name'])){

        $imagename=addslashes( $_FILES['mainphoto']['tmp_name']);
        $image=$_FILES['mainphoto']['tmp_name'];
         $types = array('image/jpg', 'image/gif','image/png','image/jpeg');
            if (!in_array($_FILES['mainphoto']['type'], $types))
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
                move_uploaded_file($_FILES["mainphoto"]["tmp_name"], "$folder".$_FILES["mainphoto"]["name"]);
                $path="dist/img/".$_FILES['mainphoto']['name'];
        
             }
            }
          } 
          if (isset($_FILES['logo']['tmp_name'])){

            $imagename=addslashes( $_FILES['logo']['tmp_name']);
            $image=$_FILES['logo']['tmp_name'];
             $types = array('image/jpg', 'image/gif','image/png','image/jpeg');
                if (!in_array($_FILES['logo']['type'], $types))
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
                    move_uploaded_file($_FILES["logo"]["tmp_name"], "$folder".$_FILES["logo"]["name"]);
                    $logopath="dist/img/".$_FILES['logo']['name'];
            
                 }
                }
              } 
          $UpdateStudentProfilePageQuery="UPDATE `login` SET `main`='$path' , logo = '$logopath', `message` = '$login_message' WHERE `id` = '1'";
          $UpdateStudentProfilePageResult= mysqli_query($conn,$UpdateStudentProfilePageQuery);
          if(!$UpdateStudentProfilePageResult){
            echo mysqli_error($conn);
          }  
        }  
      
?>      
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Login Page info</h1>
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
              <h3 class="card-title">Update Login Page Info</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
              <form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="exampleInputFile">Update Site message</label>
                    <div class="custom-file">
                        <input type="text" name="loginmessage" class="custom-file-label" id="exampleInputFile" >
                    </div>
                    <label for="exampleInputFile">Update Main Login Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="mainphoto" class="custom-file-label" id="exampleInputFile" >
                      </div>
                    </div>
                    </div>
                    <label for="exampleInputFile">Update Logo Photo</label>
                    <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-label" id="exampleInputFile" >
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          
                        </div>
                      </div>
                

            <input name="submit" type="submit" value="Update login info " class="btn btn-success float-right">
            </section>
            </div>
            </div>

            </form>





<?php
include "footer.php";
?>

<?php
      include "header.php";
      include "sidebar.php";
      $message = "";

 if(isset($_POST['submit'])){


    $login_main_image = $_POST['mainphoto'];
    //$login_logo_image = $_POST['logo'];
    //$login_message = $_POST['loginmessage'];

    echo $login_main_image;
    
    // $UpdateLoginPageInfoQuery=mysqli_query($conn,"UPDATE `login` SET `main`= '$login_main_image' WHERE `id` = '1'");
    // if($UpdateLoginPageInfoQuery) 
    // $message = "Data Updated Successfully";
  
    // } else {
    //     echo mysqli_error($conn);
    } 
      
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
                

            <input name="submit" type="submit" value="Update Student Data" class="btn btn-success float-right">
            </section>
            </div>
            </div>

            </form>





<?php
include "footer.php";
?>

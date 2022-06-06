<?php
      include "header.php";
      include "sidebar.php";
      $message = "";
      if(isset($_POST['submit'])){
     
       $admin_name  = $_POST['admin_name'];
       $password =$_POST['password'];

     
     
       $InsertadminQuery=mysqli_query($conn,"INSERT INTO `admins`(`name`, `password`) VALUES ('$admin_name','$password')");
       if($InsertadminQuery) 
     
        //echo mysqli_error($conn);
         $message = "Admin added Successfully ";

       
      }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New admin</h1>
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
              <h3 class="card-title">admin Info</h3>

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
                <label for="inputName">admin Name</label>
                <input name="admin_name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">password</label>
                <input name="password" type="password" id="inputName" class="form-control">
              </div>

     
            <!-- /.card-body -->
            <input name="submit" type="submit" value="Add New admin" class="btn btn-success float-right">
            </section>
                </form>
            </div>
            </div>






<?php
include "footer.php";
?>

<?php
      include "header.php";
      include "sidebar.php";
 // submitting the form
      $message = "";
 if(isset($_POST['submit'])){

  $stage_code = $_POST['stage_code'];
  $name       = $_POST['name'];

  $InsertClassInStageQuery=mysqli_query($conn,"INSERT INTO `classes`(`name`,`stage_code`) VALUES ('$name','$stage_code')");

  if(!$InsertClassInStageQuery){
    
    
        echo "MySQLi Connection was not established: " . mysqli_connect_error();
    
    }else {
      $message = " Data Inserted Successfully";
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
              <h3 class="card-title">Add Class</h3>

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
                      echo '              <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i> Success!</h5>
                    </div>';
                  }
                  ?>

                <label for="inputStatus">Choose the stage you want to add class in</label>
                <select name= "stage_code" id="inputStatus" class="form-control custom-select">
                  <!-- get the stages and levels  -->
                  <?php
                        $stages_query = "select * from stages";
                        $stages_result=  mysqli_query($conn,$stages_query);
                        foreach($stages_result as $stages_row){ 
                  ?>
                  <option value="<?=$stages_row['code']?>"><?= $stages_row['name']." level ".$stages_row['level'] ." [".$stages_row['code']."]" ?></option>
                 <?php } ?> 
                </select>
                <br> <br>
                <input type="text" name="name" value="class name" class="form-control">
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
 
        <div class="row">
        <div class="col-12">
          <input name="submit" type="submit" value="Add new Class" class="btn btn-success float-right">
        </div>
      </form>
      </div>
      </div>
    </section>

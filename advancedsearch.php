<?php
      include "header.php";
      include "sidebar.php";
      $message = "";


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advanced Search</h1>
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
              <h3 class="card-title">Info</h3>

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
                <label for="inputName">search for</label>
                <select  name="table" id="inputStatus" class="form-control custom-select">
                  <option selected value = "students">Students</option>
                  <option value = "teachers">Teachers</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Name</label>
                <input name="name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Stage</label>
                <select  name="stage" id="inputStatus" class="form-control custom-select">
                  <option selected value=""> All Stages</option>
                  <option value = "kindergarden">Kindergarden</option>
                  <option value = "primary">Primary</option>
                  <option value = "preparatory">Preparatory</option>
                  <option value = "secondary">Secondary</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Level</label>
                <select  name="level" id="inputStatus" class="form-control custom-select">
                  <option value= "">All levels</option>
                  <option>One</option>
                  <option>two</option>
                  <option>three</option>
                  <option>four</option>
                  <option>five</option>
                  <option>six</option>
                </select>
              </div>


              <section class="content">
                <div class="row">

              </div>

              <div class = "form-group">
              <label for="inputStatus">Class</label>
              <select name= "class" id="inputStatus" class="form-control custom-select">
                <option value = "">All Classes</option>
                  <!-- get the stages and levels  -->
                  <?php

                         $stages_query  = "select * from `classes` ORDER BY `stage_code`";
                         $stages_result = mysqli_query($conn,$stages_query);
                         foreach($stages_result as $stage_classes){ 
                  ?>
                  <option value = "<?=$stage_classes['name'] ?>"><?=$stage_classes['stage_code']." - ".$stage_classes['name'] ?></option>
                 <?php } ?> 
                </select>
                </div> 
     
            <!-- /.card-body -->
            <input name="submit" type="submit" value="search" class="btn btn-success float-right">
            </section>
                </form>
            </div>
            </div>
           
 <!-- show the results  -->
<?php
      if(isset($_POST['submit'])){
        $table = $_POST['table'];
        $name  = $_POST['name'];
        $stage = $_POST['stage'];
        $level = $_POST['level'];
        $class = $_POST['class'];
 ?>      
             <a style="margin:0 5px" class="btn btn-default  float-sm-right" onclick="printpart()">Print</a> 
                  <div id="printable" class="card-body">
                <table id="" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthdate</th>
                    <th>Address</th>
                    <th>Stage</th>
                    <th>level</th>
                    <th>Class</th>
                    <th>Notes</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                        $basic_query = "SELECT * FROM `$table`";
                        $where = " WHERE";
                        $and   = "`id` BETWEEN 0 AND 1000000";

                        if(!empty ($name)){
                            $and .=" AND `name` like '%$name%'";
                        }
                        if(!empty ($stage)){
                            $and .=" AND `stage` = '$stage'";
                        }
                        if(!empty ($level)){
                            $and .=" AND `level` = '$level'";
                        }
                        if(!empty ($class)){
                            $and .=" AND `class` = '$class'";
                        }
                        $query = $basic_query . $where . $and ;
                        $result=  mysqli_query($conn,$query);
                        if(!$result){
                            echo mysqli_error ($conn);
                        }
                        foreach($result as $row){ 
                  ?> 
                    <td><?=$row['id']?></td>
                    <?php 
                    if( $table == "students"){?>
                    <td><a href="studentprofile.php?&student_id=<?=$row['id']?>" ><?=$row['name']?> </td>
                    <?php } else { ?>

                    <td><a href="teacherprofile.php?&teacher_id=<?=$row['id']?>" ><?=$row['name']?> </td>

                    <?php } ?> 
                    <td><?=$row['birthdate']?></td>
                    <td><?=$row['address']?></td>
                    <td><?=$row['stage']?></td>
                    <td><?=$row['level']?></td>
                    <td><?php 
                    if(!empty($row['class'])){
                      echo $row['class'];
                    }else { 
                      echo '<a href="assignstudent.php?&student_id='.$row['id'].'" class="fas fa-plus"></a>';
                    }
                    ?>
                    </td>
                    <td><?=$row['notes']?></td>

                  </tr>
                  <?php
                    }
                  ?>
                  </tfoot>
                </table>
              </div>
              <?php

                   }

                ?>
                </div></div></div>

        
                <script>

 








<?php
include "footer.php";
?>
            <script>
function printpart () {
  var printwin = window.open("");
  printwin.document.write(document.getElementById("printable").innerHTML);
  printwin.stop();
  printwin.print();
  printwin.close();
}
</script>

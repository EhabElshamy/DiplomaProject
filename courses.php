<?php
      include "header.php";
      include "sidebar.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses</h1>
          </div>
            <div class="col-sm-6">
            <a class="btn btn-success  float-sm-right" href="addcourse.php">Add course</a>
            <a style="margin:0 5px" class="btn btn-default  float-sm-right" onclick="print()">Print</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">courses Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Stage</th>
                    <th>level</th>
                    <th>Class</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                        $courses_query = "select * from courses";
                        $courses_result=  mysqli_query($conn,$courses_query);
                        foreach($courses_result as $courses_row){ 
                  ?>
                    <td><?=$courses_row['id']?></td>
                    <td><?=$courses_row['name']?></td>
                    <td><?=$courses_row['description']?></td>
                    <td><?=$courses_row['stage']?></td>
                    <td><?=$courses_row['level']?></td>
                    <td><?php 
                    if(!empty($courses_row['class'])){
                      echo $courses_row['class'];
                    }else { 
                      echo '<a href="assigncourse.php?&course_id='.$courses_row['id'].'" class="fas fa-plus"></a>';
                    }
                    ?>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="editcourse.php?&course_id=<?=$courses_row['id']?>" class="fas fa-pen"></a>  
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="deletecourse.php?&course_id=<?=$courses_row['id']?>" class="fas fa-trash"></i></td>

                    </td>
                  </tr>
                  <?php } ?>
               
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


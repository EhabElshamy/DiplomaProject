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
            <h1>Teachers</h1>
            <?php
                      if(isset($_SESSION['message']))
                      {
                          echo "<h4>".$_SESSION['message']."</h4>";
                          unset($_SESSION['message']);
                      }
                ?>
            </div>
            <div class="col-sm-6">
            <a class="btn btn-success float-sm-right" href="addteacher.php">Add teacher</a>
            <a style="margin:0 5px" class="btn btn-default  float-sm-right" onclick="print()">Print</a>
            <a  class="btn btn-primary  float-sm-right" href="teachersImport.php">Import</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

<section id="printable" class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Teachers Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>qualifications</th>
                    <th>Address</th>
                    <th>Stage</th>
                    <th>level</th>
                    <th>Class</th>
                    <th>Notes</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                        $teachers_query = "select * from teachers";
                        $teachers_result=  mysqli_query($conn,$teachers_query);
                        foreach($teachers_result as $teachers_row){ 
                  ?>  
                    <td><?=$teachers_row['id']?></td>
                    <td><a href=teacherprofile.php?&teacher_id=<?=$teachers_row['id']?> ><?=$teachers_row['name']?> </td>

                    <td><?=$teachers_row['phone']?></td>
                    <td><?=$teachers_row['qualifications']?></td>
                    <td><?=$teachers_row['address']?></td>
                    <td><?=$teachers_row['stage']?></td>
                    <td><?=$teachers_row['level']?></td>
                    <td><?php 
                    if(!empty($teachers_row['class'])){
                      echo $teachers_row['class'];
                    }else { 
                      echo '<a href="assignteacher.php?&teacher_id='.$teachers_row['id'].'" class="fas fa-plus"></a>';
                    }
                    ?>
                    <td><?=$teachers_row['notes']?></td>
                    <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="editteacher.php?&teacher_id=<?=$teachers_row['id']?>" class="fas fa-pen"></a>  
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="deleteteacher.php?&teacher_id=<?=$teachers_row['id']?>" class="fas fa-trash"></i></td>

                    </td>
                  </tr>
               <?php } ?> 
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <form method="post" action="teachersExport.php">
                <input type="submit" name="export" class="btn btn-success" value="Export To Excel" />
           </form>




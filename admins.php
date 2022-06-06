<?php
      require "header.php";
      include "sidebar.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>admins</h1>
            </div>
            <div class="col-sm-6">
            <a style="margin:0 5px" class="btn btn-success  float-sm-right" href="addadmin.php">Add New Admin</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">admins Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php
                        $admins_query = "select * from admins";
                        $admins_result=  mysqli_query($conn,$admins_query);
                        foreach($admins_result as $admins_row){ 
                  ?> 
                    <td><?=$admins_row['id']?></td>
                    <td><?=$admins_row['name']?> </td>


                    <td> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="deleteadmin.php?&admin_id=<?=$admins_row['id']?>" class="fas fa-trash"></i></td>
                  </tr>
               <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


<?php
      include "header.php";
      include "sidebar.php";
?>

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stages and levels</h1>
</div>
            <div class="col-sm-6">
            <a class="btn btn-success btn-lg  float-sm-right" href="addclass.php">Add Class</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">KINDERGARDEN</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <strong>Kindergarden Level 1</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'KG1'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href="class.php?&class_level=one&class_stage=kindergarden&class_name=<?=$classes_row['name']?>"><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Kindergarden Level 2</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'KG2'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href="class.php?&class_level=two&class_stage=Kindergarden&class_name=<?=$classes_row['name']?>"><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Primary</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <strong>Primary Level 1</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PM1'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href="class.php?&class_level=one&class_stage=Primary&class_name=<?=$classes_row['name']?>"><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Primary Level 2</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PM2'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Primary Level 3</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PM3'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Primary Level 4</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PM4'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Primary Level 5</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PM5'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Primary Level 6</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PM6'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Preparatory</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <strong>Preparatory Level 1</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PP1'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Preparatory Level 2</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PP2'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Preparatory Level 3</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'PP3'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Secondary</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <strong>Secondary Level 1</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'SC1'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Secondary Level 2</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'SC2'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>
            </div>
            <strong>Secondary Level 3</strong>
            <div>
              <?php
                        $classes_query = "select * from classes where stage_code = 'SC3'";
                        $classes_result=  mysqli_query($conn,$classes_query);
                        foreach($classes_result as $classes_row){ 
              ?>  
              <a class="btn btn-default btn-lg" href=""><?=$classes_row['name']?></a>

              <?php } ?>



    </section>
    </div>
          </div><!-- /.card-body -->
          </div>

          </div><!-- /.container-fluid -->



<?php
      include "footer.php";
?>



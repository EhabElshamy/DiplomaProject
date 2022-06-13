<?php
      require "header.php";
      include "sidebar.php";

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


            <div class="col-md-12 mt-4">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Import Teachers</h4>
                    </div>
                    <div class="card-body">

                        <form action="importTeachers.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control">
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                            <a class="btn btn-success  float-sm-right mt-3" href="Templates\TeachersImportTemplate.xlsx">Download Template</a>

                        </form>

                    </div>
                </div>
            </section>
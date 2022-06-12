<?php
      require "header.php";
      include "sidebar.php";

?>

<div class="container">
        <div class="row">
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
                        <h4>Import courses</h4>
                    </div>
                    <div class="card-body">

                        <form action="importCourses.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control">
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                            <a class="btn btn-success  float-sm-right mt-3" href="Templates\CoursesImportTemplate.xlsx">Download Template</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
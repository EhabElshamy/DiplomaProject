<?php
      require "header.php";
      require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $name = $row['0'];
                $description = $row['1'];
                $stage = $row['2'];
                $level = $row['3'];

                $courseQuery="INSERT INTO `courses`(`name`, `description`,`stage`,`level`) VALUES ('$name','$description','$stage','$level')";

                $result = mysqli_query($conn, $courseQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: courses.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: courses.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: courses.php');
        exit(0);
    }
}
?>
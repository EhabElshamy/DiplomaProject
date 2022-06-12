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
                $guardian_name = $row['1'];
                $guardian_phone = $row['2'];
                $birthdate = $row['3'];
                $address = $row['4'];
                $stage = $row['5'];
                $level = $row['6'];
                $notes = $row['7'];

                $studentQuery="INSERT INTO `students`(`name`, `guardian_name`, `guardian_phone`, `birthdate`,`address`,`stage`, `level`,`success`,`notes`) VALUES ('$name','$guardian_name','$guardian_phone','$birthdate', '$address','$stage','$level','No','$notes')";

                $result = mysqli_query($conn, $studentQuery);
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
            header('Location: students.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: students.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: students.php');
        exit(0);
    }
}
?>
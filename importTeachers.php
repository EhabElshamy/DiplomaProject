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
                $phone_number = $row['1'];
                $birthdate = $row['2'];
                $address = $row['3'];
                $qualifications = $row['4'];
                $stage = $row['5'];
                $level = $row['6'];
                $notes = $row['7'];

                $teacherQuery="INSERT INTO `teachers`(`name`, `phone`, `birthdate`,`address`,`qualifications`, `stage`, `level`,`notes`) VALUES ('$name','$phone_number','$birthdate','$address','$qualifications','$stage','$level','$notes')";

                $result = mysqli_query($conn, $teacherQuery);
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
            header('Location: teachers.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: teachers.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: teachers.php');
        exit(0);
    }
}
?>
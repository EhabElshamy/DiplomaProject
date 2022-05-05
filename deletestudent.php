<?php
    require "connect.php";
    $student_id= $_GET['student_id'];
    $DeleteStudentQuery=mysqli_query($conn,"DELETE FROM `students` WHERE `id` = '$student_id'");
    if($DeleteStudentQuery){
        $message = "Data Deleted Successfully";
        header("Location: students.php");
    }
            
?> 
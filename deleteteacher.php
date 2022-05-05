<?php
    require "connect.php";
    $teacher_id= $_GET['teacher_id'];
    $DeleteTeacherQuery=mysqli_query($conn,"DELETE FROM `teachers` WHERE `id` = '$teacher_id'");
    if($DeleteTeacherQuery){
        $message = "Data Deleted Successfully";
        header("Location: teachers.php");
    }
            
?> 
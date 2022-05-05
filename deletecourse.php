<?php
    require "connect.php";
    $course_id= $_GET['course_id'];
    $DeleteCourseQuery=mysqli_query($conn,"DELETE FROM `courses` WHERE `id` = '$course_id'");
    if($DeleteCourseQuery){
        $message = "Data Deleted Successfully";
        header("Location: courses.php");
    }
            
?> 
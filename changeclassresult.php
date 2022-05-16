<?php

    require "connect.php";
    $stage = $_GET['class_stage'];
    $level = $_GET['class_level'];
    $class_name = $_GET['class_name'];




    $students_query = "select * from `students` where `stage` = '$stage' AND `level` = '$level' AND `class` = '$class_name'";
    $students_result=  mysqli_query($conn,$students_query);
    foreach($students_result as $students_row){ 
        $student_result= $students_row['success'];   
    if($student_result == "No"){
    $ChangeResultStudentQuery=mysqli_query($conn,"UPDATE `students` SET `success` = 'Yes' where `stage` = '$stage' AND `level` = '$level' AND `class` = '$class_name'");
    if($ChangeResultStudentQuery){
        header("Location: class.php?&class_level=$level&class_stage=$stage&class_name=$class_name");
    }else{
     echo   mysqli_error($conn);
    }
}
}   

?> 
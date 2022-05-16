<?php

    require "connect.php";

    $ChangeResultStudentQuery=mysqli_query($conn,"UPDATE `students` SET `success` = 'Yes' where `success` = 'No'");
    if($ChangeResultStudentQuery){
        header("Location: students.php");
    }else{
     echo   mysqli_error($conn);
    } 

?>
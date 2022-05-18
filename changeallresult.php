<?php

    require "connect.php";
    
    $getPassedStudentsQuery= "SELECT * from `students` WHERE `success` = 'Yes'";
    $PassedStudentsResult= mysqli_query ($conn, $getPassedStudentsQuery);
    if( mysqli_num_rows($PassedStudentsResult) == 0 ){
        header("Location: updatestudentresults.php");
    }else {
    while($PassedStudentRow = $PassedStudentsResult->fetch_assoc()){
        $PassedStudentID    = $PassedStudentRow['id']; 
        $PassedStudentStage = $PassedStudentRow['stage'];
        $PassedStudentlevel = $PassedStudentRow['level'];


    $getPassedFromStagesQuery  = "SELECT * FROM `stages` WHERE `name` = '$PassedStudentStage' AND `level` = '$PassedStudentlevel'"; 
    $getPassedFromStagesResult = mysqli_query($conn,$getPassedFromStagesQuery);
    while($getPassedFromStagesRow = $getPassedFromStagesResult->fetch_assoc()){

        $PassedID  = $getPassedFromStagesRow['id'];
        $RequirdID = $PassedID+1;
    
    if($RequirdID == 16){
        $UpdateStudentStageAndLevelQuery = mysqli_query($conn,"UPDATE `students` SET  `success` = 'No' ,`class` = '' where `id` = '$PassedStudentID'");        
        header("Location: students.php"); 
    }else{
    
    $getRequiredStageAndLevelQuery  = "SELECT * FROM `stages` WHERE `id` = '$RequirdID'";
    $getRequiredStageAndLevelResult = mysqli_query($conn,$getRequiredStageAndLevelQuery);
    while($getRequiredStageAndLevelRow = $getRequiredStageAndLevelResult->fetch_assoc()){
        $RequiredStage  =  $getRequiredStageAndLevelRow['name'];
        $RequiredLevel  =  $getRequiredStageAndLevelRow['level'];

        // echo $RequiredStage;
        // echo $RequiredLevel;

    $UpdateStudentStageAndLevelQuery = mysqli_query($conn,"UPDATE `students` SET `stage` = '$RequiredStage' , `level` = '$RequiredLevel' , `success` = 'No' ,`class` = '' where `id` = '$PassedStudentID'");        
        header("Location: students.php"); 
    
    }
  
    }
    }
    }  
    }


?>
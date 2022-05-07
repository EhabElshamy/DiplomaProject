<?php
    require "connect.php";
    $student_id= $_GET['student_id'];

    $students_query = "select * from students where id = $student_id";
    $students_result=  mysqli_query($conn,$students_query);
    foreach($students_result as $students_row){ 
        $student_result= $students_row['success'];   
    if($student_result == 'No'){
    $ChangeResultStudentQuery=mysqli_query($conn,"UPDATE `students` SET `success` = 'Yes' WHERE `id` = '$student_id'");
    if($ChangeResultStudentQuery){
        header("Location: studentprofile.php?&student_id=$student_id");
    }
}else{
    $ChangeResultStudentQuery=mysqli_query($conn,"UPDATE `students` SET `success` = 'No' WHERE `id` = '$student_id'");
    if($ChangeResultStudentQuery){
        header("Location: studentprofile.php?&student_id=$student_id");
    }
}
}     
?> 
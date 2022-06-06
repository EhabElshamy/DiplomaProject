<?php
    require "connect.php";
    $admin_id= $_GET['admin_id'];
    $DeleteadminQuery=mysqli_query($conn,"DELETE FROM `admins` WHERE `id` = '$admin_id'");
    if($DeleteadminQuery){
        $message = "Data Deleted Successfully";
        header("Location: admins.php");
    }
            
?> 
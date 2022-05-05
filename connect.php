<?php

    $conn=mysqli_connect('localhost', 'root','' , 'graduation' );
    $name="SET NAMES utf8";
    mysqli_query($conn,$name);
    if (mysqli_connect_errno())
    
    {
    
        echo "MySQLi Connection was not established: " . mysqli_connect_error();
    
    }
?>
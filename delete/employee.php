<?php
include_once './../config/dbconnect.php';
    $id = $_GET['emp_id'];
    $cmd = "delete from employees where emp_id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../employees.php?deleted=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);


?>
<?php
include_once './../config/dbconnect.php';
    $id = $_GET['id'];
    $cmd = "delete from items where id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../specified.php?deleted=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>
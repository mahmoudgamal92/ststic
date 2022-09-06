<?php
include_once './../config/dbconnect.php';
    $id = $_GET['id'];
    $cmd = "delete from tickets where ticket_id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../tickets.php?deleted=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);


?>
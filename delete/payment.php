<?php
include_once './../config/dbconnect.php';

    $properity_id = $_GET['properity_id'];
    $payment_id = $_GET['payment_id'];
    $cmd = "delete from payment where id = '$payment_id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../payments.php?id=".$properity_id."&deleted=true");
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>
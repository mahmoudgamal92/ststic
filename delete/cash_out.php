<?php
include_once './../config/dbconnect.php';
    $c_id = $_GET['c_id'];
    $properity_id = $_GET['p_id'];
    $cmd = "delete from cashout where id = '$c_id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../cash_out.php?id=".$properity_id."&deleted=true");
        //echo "success";
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>
<?php
include_once './../config/dbconnect.php';
    $id = $_GET['id'];

    $sql = "select * from invoice_sections where section_id = '$id'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    $properity_token = $row['properity_token'];
    
    $cmd = "delete from invoice_sections where section_id = '$id'";
    if (mysqli_query($con,$cmd))
    {
        header("Location:./../invoice.php?id=".$properity_token);
       // echo "token : ".$properity_token;
    }
    else{
    die( "could not insert news right now : ". mysqli_error($con));
    }
    mysqli_close($con);
?>
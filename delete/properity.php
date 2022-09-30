<?php
include_once './../config/dbconnect.php';
$prop_id = $_GET['id'];

$cmd = "delete from properities where id = '$prop_id'";

 if (mysqli_query($con,$cmd))
    {
        header("Location:./../propreties.php?deleted=true");
    }
    
    else
    {
    die( "could not insert news right now : ". mysqli_error($con));
    }
    
    mysqli_close($con);
?>
<?php
include '../config/dbconnect.php';
?>
<?php

  if (isset($_POST['submit'])) {

  $id =  $name =htmlentities(mysqli_real_escape_string($con,$_POST['id']));
  $name =htmlentities(mysqli_real_escape_string($con,$_POST['name']));
  $price =htmlentities(mysqli_real_escape_string($con,$_POST['price']));
  $date =htmlentities(mysqli_real_escape_string($con,$_POST['date']));
  $note =htmlentities(mysqli_real_escape_string($con,$_POST['note']));

  $cmd =  "update payment set name='$name',price='$price',notes='$note',date='$date' where id = '$id'";
    $query = mysqli_query($con,$cmd);
    if ($query) {
       header("Location:./../edit_payment.php?id=".$id."&updated=true");
       //echo "done";
      }
    else {

        echo mysqli_error($con);
    }
  }
?>
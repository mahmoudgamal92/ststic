<?php
include '../config/dbconnect.php';
?>
<?php

  if (isset($_POST['submit'])) {

  $properity_id =  $name =htmlentities(mysqli_real_escape_string($con,$_POST['id']));
  $name =htmlentities(mysqli_real_escape_string($con,$_POST['name']));
  $price =htmlentities(mysqli_real_escape_string($con,$_POST['price']));
  $date =htmlentities(mysqli_real_escape_string($con,$_POST['date']));
  $note =htmlentities(mysqli_real_escape_string($con,$_POST['note']));

  $cmd =  "insert into payment (name,price,notes,date,properity_id) values 
  ('$name','$price','$note','$date','$properity_id')";
    $query = mysqli_query($con,$cmd);
    if ($query) {
       header("Location:./../payments.php?id=".$properity_id."&inserted=true");
       //echo "done";
      }
    else {

        echo mysqli_error($con);
    }
  }
?>
<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {
  $service_type =htmlentities(mysqli_real_escape_string($con,$_POST['service_type']));
  $date_added = date("Y-m-d");
  $cmd = "insert into service_types (name,date_added) values ('$service_type','$date_added')";
    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../services.php?inserted=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
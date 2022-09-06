<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {
  $name =htmlentities(mysqli_real_escape_string($con,$_POST['name']));
  $work =htmlentities(mysqli_real_escape_string($con,$_POST['work']));
  $date_added = date("Y-m-d");

  $cmd = "insert into workers (name,work) values ('$name','$work')";

    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../workers.php?inserted=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
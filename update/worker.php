<?php
include './../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {
  $id =htmlentities(mysqli_real_escape_string($con,$_POST['w_id']));
  $name =htmlentities(mysqli_real_escape_string($con,$_POST['w_name']));
  $work =htmlentities(mysqli_real_escape_string($con,$_POST['w_work']));
  $date_added = date("Y-m-d");

  $cmd = "update workers set name= '$name',work='$work' where id = '$id'";
    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../workers.php?update=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
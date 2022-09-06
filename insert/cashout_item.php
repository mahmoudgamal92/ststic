<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {
  $item =htmlentities(mysqli_real_escape_string($con,$_POST['item']));
  $date_added = date("Y-m-d");

  $cmd = "insert into cashout_items (name,date_added) values ('$item','$date_added')";
    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../cashout_items.php?inserted=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
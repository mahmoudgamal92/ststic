<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {
  $item =htmlentities(mysqli_real_escape_string($con,$_POST['item']));
  $date_added = date("Y-m-d");

  $cmd = "insert into sections (name,date) values ('$item','$date_added')";
    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../invoice_sections.php?inserted=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
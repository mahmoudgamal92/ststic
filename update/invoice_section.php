<?php
include './../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {

  $id = $_POST['item_id'];
  $item =htmlentities(mysqli_real_escape_string($con,$_POST['item_name']));
  $date_added = date("Y-m-d");
  $cmd = "update sections set name='$item' where id = '$id'";
    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../invoice_sections.php?updated=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {
    
  $item_title =htmlentities(mysqli_real_escape_string($con,$_POST['title']));
  $item_desc =htmlentities(mysqli_real_escape_string($con,$_POST['item_desc']));
  $item_price =htmlentities(mysqli_real_escape_string($con,$_POST['item_price']));
  $item_date =htmlentities(mysqli_real_escape_string($con,$_POST['item_date']));
  $notes = htmlentities(mysqli_real_escape_string($con,$_POST['notes']));
  $id = htmlentities(mysqli_real_escape_string($con,$_POST['properity_id']));
  $date_added = date("Y-m-d");

  $cmd = "update cashout set title = '$item_title' ,description='$item_desc',price='$item_price',date ='$date_added',notes='$notes' where id='$id'";
    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../edit_cashout.php?id=".$id."&updated=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
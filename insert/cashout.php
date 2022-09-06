<?php
session_start();
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {
  $item_title =htmlentities(mysqli_real_escape_string($con,$_POST['title']));
  $item_desc =htmlentities(mysqli_real_escape_string($con,$_POST['item_desc']));
  $item_price =htmlentities(mysqli_real_escape_string($con,$_POST['item_price']));
  $item_date =htmlentities(mysqli_real_escape_string($con,$_POST['item_date']));
  $notes = htmlentities(mysqli_real_escape_string($con,$_POST['notes']));
  $properity_id = htmlentities(mysqli_real_escape_string($con,$_POST['properity_id']));
  $date_added = date("Y-m-d");
  $added_by = $_SESSION['admin_name'];
  $cmd = "insert into cashout (title,description,price,date,added_by,notes,properity_id) values 
  ('$item_title','$item_desc','$item_price','$item_date','$added_by','$notes','$properity_id')";

    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../cash_out.php?id=".$properity_id."&inserted=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
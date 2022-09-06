<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {

      $properity_token = htmlentities(mysqli_real_escape_string($con,$_POST['properity_token']));
      $invoice_token = htmlentities(mysqli_real_escape_string($con,$_POST['invoice_token']));
      $section_id = htmlentities(mysqli_real_escape_string($con,$_POST['section_id']));
      $item_name = htmlentities(mysqli_real_escape_string($con,$_POST['item_name']));
      $standard = htmlentities(mysqli_real_escape_string($con,$_POST['standard']));
      $quantity = htmlentities(mysqli_real_escape_string($con,$_POST['quantity']));
      $price = htmlentities(mysqli_real_escape_string($con,$_POST['price']));
      $discount_type = htmlentities(mysqli_real_escape_string($con,$_POST['discount_type']));
      $discount_value = htmlentities(mysqli_real_escape_string($con,$_POST['discount_value']));
      $total = $quantity * $price;
      $date = date("Y-m-d");

  $cmd = "insert into invoice_items (item_name,standard,quantity,price,discount_type,discount_value,properity_token,invoice_token,section_id,total,date_added) values ('$item_name','$standard','$quantity','$price','$discount_type','$discount_value','$properity_token','$invoice_token','$section_id','$total','$date')";

    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../invoice.php?id=".$properity_token);
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
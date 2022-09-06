<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {

  $invoice_token = htmlentities(mysqli_real_escape_string($con,$_POST['invoice_token']));
  $properity_token = htmlentities(mysqli_real_escape_string($con,$_POST['properity_token']));
  $section_name = htmlentities(mysqli_real_escape_string($con,$_POST['section_name']));
  $cmd = "insert into invoice_sections (properity_token,invoice_token,section_title) values 
  ('$properity_token','$invoice_token','$section_name')";
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
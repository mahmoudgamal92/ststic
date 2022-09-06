<?php
include '../config/dbconnect.php';
?>
<?php
  $section_id = htmlentities(mysqli_real_escape_string($con,$_POST['sec_id']));
  $properity_token = htmlentities(mysqli_real_escape_string($con,$_POST['prop_tkn']));
  $invoice_token = htmlentities(mysqli_real_escape_string($con,$_POST['in_tkn']));
  $cmd = "insert into invoice_sections (properity_token,invoice_token,section_title) values 
  ('$properity_token','$invoice_token','$section_name')";
    if (mysqli_query($con,$cmd)) 
      {
        //header("Location:./../invoice.php?id=".$properity_token);
        echo "1";
      }
      else 
    {
        echo mysqli_error($con);
  }
?>
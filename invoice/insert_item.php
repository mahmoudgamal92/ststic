<?php
include '../config/dbconnect.php';
?>
<?php
      $properity_token = $_POST['prop_tkn'];
      $invoice_token = $_POST['in_tkn'];
      $section_id = $_POST['sec_id'];
      $item_name = "بند جديد";

  $cmd = "insert into invoice_items (item_name,properity_token,invoice_token,section_id) values ('$item_name','$properity_token','$invoice_token','$section_id')";
    if (mysqli_query($con,$cmd)) 
      {
        echo "success";
      }
      else 
    {
        echo mysqli_error($con);
    }
?>
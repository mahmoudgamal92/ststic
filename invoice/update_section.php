<?php
include '../config/dbconnect.php';
?>
<?php
$sec_id = $_POST['section_id'][0];
$section_id = $_POST['section_id'];
$invoice_token = $_POST['invoice_token'];
$prop_token = $_POST['prop_token'];
$section_id = $_POST['section_id'];
$item_name = $_POST['item_name'];
$standard = $_POST['standard'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$discount_type = $_POST['discount_type'];
$discount_value = $_POST['discount_value'];
$item_notes = $_POST['notes'];
$total = $_POST['total'];
$count = count($section_id);
$date = date("Y-m-d");

$delete = "delete from invoice_items where section_id = '$sec_id'";
if(mysqli_query($con,$delete))
{
for($i = 0; $i<$count; $i++)  
{
    //echo $i . "-".$item_name[$i]."</br>";
   $cmd = "insert into invoice_items(item_name,standard,quantity,price,discount_type,discount_value,item_notes,properity_token,invoice_token,section_id,total,date_added) values(
    '$item_name[$i]','$standard[$i]','$quantity[$i]','$price[$i]','$discount_type[$i]','$discount_value[$i]','$item_notes[$i]','$prop_token[$i]','$invoice_token[$i]','$section_id[$i]',
    '$total[$i]','$date')";
    $query = mysqli_query($con,$cmd);
    }
    }
    else
    {
    echo "delete failed";
    }
    header("Location:./../invoice.php?id=".$prop_token[0]);
    ?>
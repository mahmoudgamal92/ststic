<?php
include '../config/dbconnect.php';
?>
<?php
if(isset($_POST['invoice_address']))
{
$prop_token = $_POST['properity_token'];
$invoice_token = $_POST['invoice_token'];
$invoice_address = $_POST['invoice_address'];
$invoice_title = $_POST['invoice_title'];
$invoice_date = $_POST['invoice_date'];

$cmd = "update invoice set invoice_title = '$invoice_title', invoice_address = '$invoice_address',date_added='$invoice_date' where invoice_token = '$invoice_token'";
if(mysqli_query($con,$cmd))
{
    header("Location:./../invoice.php?id=".$prop_token);
}
else
{
echo "failed";
}
}

else{

    $supervision_ratio = $_POST['supervision_ratio'];
    $prop_token = $_POST['properity_token'];
    $invoice_token = $_POST['invoice_token'];

    $cmd = "update invoice set supervision_ratio = '$supervision_ratio' where invoice_token = '$invoice_token'";
if(mysqli_query($con,$cmd))
{
    header("Location:./../invoice.php?id=".$prop_token);
}
else
{
echo "failed";
}
}
?>
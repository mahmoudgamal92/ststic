<?php
include '../config/dbconnect.php';
?>
<?php
function create_token($byte_num){
$bytes = random_bytes($byte_num);
return bin2hex($bytes);
}
  if (isset($_POST['submit'])) {
    $properity_token = uniqid();
    $invoice_token = uniqid();
    
    $name = htmlentities(mysqli_real_escape_string($con,$_POST['name']));
    $address = htmlentities(mysqli_real_escape_string($con,$_POST['address']));
    $street = htmlentities(mysqli_real_escape_string($con,$_POST['street']));
    $flat_num = htmlentities(mysqli_real_escape_string($con,$_POST['flat_num']));
    $location = htmlentities(mysqli_real_escape_string($con,$_POST['location']));
    $floar_num = htmlentities(mysqli_real_escape_string($con,$_POST['floar_num']));
    $notes = htmlentities(mysqli_real_escape_string($con,$_POST['notes']));

$cmd = "insert into properities (token,name,address,street,flat_num,location,floar_num,notes) values ('$properity_token','$name','$address','$street','$flat_num','$location','$floar_num','$notes')";


$cmd2 = "insert into invoice (properity_token,invoice_token) values ('$properity_token','$invoice_token')";

if (mysqli_query($con,$cmd) && mysqli_query($con,$cmd2)) 
{
  header("Location:./../propreties.php?inserted=true");
}
else 
{
  echo mysqli_error($con);
}
  }
?>
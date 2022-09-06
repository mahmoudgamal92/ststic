<?php
include '../config/dbconnect.php';
?>
<?php
if (isset($_POST['submit'])) {
  $name =htmlentities(mysqli_real_escape_string($con,$_POST['name']));
  $address =htmlentities(mysqli_real_escape_string($con,$_POST['address']));
  $date =htmlentities(mysqli_real_escape_string($con,$_POST['date']));
  $imageName = $_FILES['thumbnail']['name'];
  $imageTmpName = $_FILES['thumbnail']['tmp_name'];
  $date = date("Y-m-d");

  $imageExtansion = pathinfo($imageName,PATHINFO_EXTENSION);
  $newName = uniqid().".".$imageExtansion;
  $cmd = "insert into employees (name,address,image,date_registered) values('$name','$address','$newName','$date')";

    $query = mysqli_query($con,$cmd);
    if ($query) {
      move_uploaded_file($imageTmpName,"./../uploads/$newName");
      header('location: ./../employees.php');
      }
    else {
     echo mysqli_error($con);
    }
}
    ?>
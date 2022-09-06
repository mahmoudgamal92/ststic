
<?php
include './../config/dbconnect.php';
?>
<?php
if (isset($_POST['submit'])) {
  
  if($_FILES['thumbnail']['size'] !== 0) {
  $emp_id = $_POST['emp_id'];
  $name =htmlentities(mysqli_real_escape_string($con,$_POST['name']));
  $address =htmlentities(mysqli_real_escape_string($con,$_POST['address']));
  $date =htmlentities(mysqli_real_escape_string($con,$_POST['date']));
  $imageName = $_FILES['thumbnail']['name'];
  $imageTmpName = $_FILES['thumbnail']['tmp_name'];
  $date = date("Y-m-d");

  $imageExtansion = pathinfo($imageName,PATHINFO_EXTENSION);
  $newName = uniqid().".".$imageExtansion;
  $cmd = "update employees set name = '$name',address = '$address',image = '$newName',date_registered = '$date' where emp_id = '$emp_id'";

    $query = mysqli_query($con,$cmd);
    if ($query) {
      move_uploaded_file($imageTmpName,"./../uploads/$newName");
      header('location: ./../edit/employee.php?emp_id='.$emp_id.'&update=true');
      }
    else {
     echo mysqli_error($con);
    }
}
else
{
  $emp_id = $_POST['emp_id'];
  $name =htmlentities(mysqli_real_escape_string($con,$_POST['name']));
  $address =htmlentities(mysqli_real_escape_string($con,$_POST['address']));
  $date =htmlentities(mysqli_real_escape_string($con,$_POST['date']));
  $date = date("Y-m-d");

  $cmd = "update employees set name = '$name',address = '$address',date_registered = '$date' where emp_id = '$emp_id'";

    $query = mysqli_query($con,$cmd);
    if ($query) {
      header('location: ./../edit/employee.php?emp_id='.$emp_id.'&update=true');
      }
    else {
     echo mysqli_error($con);
    }
}


}

?>

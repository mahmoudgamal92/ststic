
<?php
include './../config/dbconnect.php';
?>
<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $title =htmlentities(mysqli_real_escape_string($con,$_POST['title']));
  $price =htmlentities(mysqli_real_escape_string($con,$_POST['price']));
  $description =htmlentities(mysqli_real_escape_string($con,$_POST['description']));

  $cmd = "update items set title = '$title',description = '$description',price = '$price' where id = '$id'";

    $query = mysqli_query($con,$cmd);
    if ($query) {
      header('location: ./../edit/specified.php?id='.$id);
      }
    else {
     echo mysqli_error($con);
    }
}
?>

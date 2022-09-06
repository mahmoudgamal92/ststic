<?php
include '../config/dbconnect.php';
?>
<?php
  if (isset($_POST['submit'])) {

  $item = htmlentities(mysqli_real_escape_string($con,$_POST['item']));
  $price = htmlentities(mysqli_real_escape_string($con,$_POST['price']));
  $description = htmlentities(mysqli_real_escape_string($con,$_POST['description']));

  $cmd = "insert into items (title,description,price) values ('$item','$description','$price')";

    if (mysqli_query($con,$cmd)) 
      {
        header("Location:./../specified.php?inserted=true");
      }
      else 
    {
        echo mysqli_error($con);
    }
  }
?>
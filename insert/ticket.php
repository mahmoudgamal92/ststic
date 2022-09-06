<?php
session_start();
error_reporting(0);
include '../config/dbconnect.php';
?>
<?php
$id= "0";
if (isset($_POST['submit'])) {
  $date          = htmlentities(mysqli_real_escape_string($con,$_POST['date_time']));
  $duration      = htmlentities(mysqli_real_escape_string($con,$_POST['duration']));
  $open_by            = htmlentities(mysqli_real_escape_string($con,$_POST['by']));
 // $service_name = isset($_POST['service_name']) ? $_POST['service_name'] : '';
  $emp1       = htmlentities(mysqli_real_escape_string($con,$_POST['employee']));
  $emp2      = htmlentities(mysqli_real_escape_string($con,$_POST['employee2']));
  $emp3      = htmlentities(mysqli_real_escape_string($con,$_POST['employee3']));
  $cost          = htmlentities(mysqli_real_escape_string($con,$_POST['cost']));
  $status        = htmlentities(mysqli_real_escape_string($con,$_POST['status']));
  $notes          = htmlentities(mysqli_real_escape_string($con,$_POST['note']));
  $date_added =  date("Y-m-d");

// $_SESSION['service'] = [];
// foreach($_POST['service_name'] as $ser){
//   $_SESSION['service'][] = $ser.",";
// }
// $service = implode(" ",$_SESSION['service']);

    $cmd = "insert into tickets (properity_id,date_open,duration,open_by,service_type,emp1,emp2,emp3,cost,status,notes,date_added) values('$id','$date','$duration','$open_by','test','$emp1','$emp2','$emp2','$cost','$status','$notes','$date_added')";
        if (mysqli_query($con,$cmd)) 
          {
            header("Location:./../tickets.php?inserted=true");
          }
        else {
            echo mysqli_error($con);
        }
  }
?>

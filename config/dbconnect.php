<?php

    $hostname     = "lt5.eu.cpanel.hostens.cloud";
    $username     = "staticco1_static";
    $password     = "5YiYC7%TT-ZE";
    $databasename = "staticco1_bms";

    $con = new mysqli($hostname, $username, $password, $databasename) or die ("connection erorr".mysqli_error($con));
    $con->query('SET NAMES UTF8');
    $con->query('SET CHARACTER SET UTF8');
    if ($con->connect_error) {
        die("Unable to Connect database: " . $con->connect_error);
    }

function get_value($title)
{
    $con = new mysqli("localhost", "root", "", "real_estate") or die ("connection erorr".mysqli_error($con));
    $con->query('SET NAMES UTF8');
    $con->query('SET CHARACTER SET UTF8');

  $cmd = "select * from settings where title = '$title'";
  $result = mysqli_query($con,$cmd);
  $row = mysqli_fetch_array($result);
  return $row['param'];
}
?>
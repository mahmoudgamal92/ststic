<?php  
include './config/dbconnect.php';
$table_name = $_GET['table_name'];
$sql = "select * from $table_name";  
$setRec = mysqli_query($con, $sql);

$setData = '';  

  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= utf8_encode($value);  
    }  
    $setData .= trim($rowData) . "\n";  
}  

header("Content-type: application/octet-stream;encoding='utf-8'");  
header("Content-Disposition: attachment; filename=$table_name.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  echo $setData . "\n";  
 ?> 
 
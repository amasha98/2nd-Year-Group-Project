<?php
include "db_config.php";
$id = $_GET["id"];
$sql="DELETE FROM `stock` WHERE `stock`.`id` = '".$id."'";
if(mysqli_query($con,$sql))
{
  echo "Success";
}
else
{
  echo "Failed";
}
mysqli_close($con);
header('Location:index.php');
?>

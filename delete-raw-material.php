<?php
include "db_config.php";
$id = $_GET["id"];
$sql="DELETE FROM `raw_material` WHERE `raw_material`.`id` = '".$id."'";
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

<?php
include "connection.php";
$id = $_GET["id"];
$sql="DELETE FROM `users` WHERE `users`.`id` = '".$id."'";
if(mysqli_query($con,$sql))
{
  echo "Success";
}
else
{
  echo "Failed";
}
mysqli_close($con);
header('Location:Manage_Users.php');
?>

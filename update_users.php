<!DOCTYPE html>
<?php
if (isset($_GET["update"])) {
  include "connection.php";
  $id=$_GET["id"];
  $fname=$_GET["fname"];
  $lname=$_GET["lname"];
  $email=$_GET["email"];
  $sql="UPDATE `users` SET  `fname` = '".$fname."', `lname` = '".$lname."', `email` = '".$email."' WHERE `users`.`id` = '".$id."';";
  if(mysqli_query($con,$sql))
  {
    echo "Success";
  }
  else
  {
    echo "Failed";
  }

 header('Location:Manage_Users.php');
}
 ?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Update Users</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
  body{
    font-family: 'Roboto', sans-serif;
  }

  table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    border-collapse: collapse;
  }

  th{
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }

  td{
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }

  .h5{
    font-size: 1.25em;
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.2;
	text-align: center;
	color:#DC143C;
  }

  input {
    display: block;
    width: 50%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }

  .btn {
    color: #212529;
    background-color: #ffc107;
    border-color: #ffc107;
  }

  .container {
    width: 50%;
    margin-left: auto;
    margin-right: auto;
  }
  </style>
</head>
<body>
  <div class="container">
    <p class="h5">UPDATE USERS</p>
    <table>
      <?php include "connection.php";
      $id = $_GET["id"];
      $sql ="SELECT * FROM `users` WHERE `id`='$id'";
      $result = mysqli_query($con,$sql);
      if(mysqli_num_rows($result)> 0)
      {
        $row = mysqli_fetch_assoc($result);
        ?>
        <tbody>
          <form action="update_users.php" method="get">
            
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
              
            
            <tr>
              <td>First Name</td>
              <td>
                <input type="text" name="fname" value="<?php echo $row["fname"] ?>">
              </td>
            </tr>
            <tr>
              <td>Last Name</td>
              <td>
                <input type="text" name="lname" value="<?php echo $row["lname"] ?>">
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>
                <input type="text" name="email" value="<?php echo $row["email"] ?>">
              </td>
            </tr>
            
            <tr>
              <td>
                </td>
              <td>
                <input type="submit" class="btn" name="update">
              </td>
            </tr>
          </form>
        </tbody>
        <?php
      }
        ?>
    </table>
  </div>
</body>
</html>

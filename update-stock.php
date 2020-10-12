<!DOCTYPE html>
<?php
if (isset($_GET["update"])) {
  include "db_config.php";
  $id=$_GET["id"];
  $product=$_GET["product"];
  $sub_category=$_GET["sub_category"];
  $price=$_GET["price"];
  $qty_left=$_GET["qty_left"];
  $qty_sold=$_GET["qty_sold"];
  $sql="UPDATE `stock` SET  `product` = '".$product."', `sub_category` = '".$sub_category."', `price` = '".$price."', `qty_left` = '".$qty_left."', `qty_sold` = '".$qty_sold."' WHERE `stock`.`id` = '".$id."';";
  if(mysqli_query($con,$sql))
  {
    echo "Success";
  }
  else
  {
    echo "Failed";
  }

  header('Location:index.php');
}
 ?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Update Product</title>
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
    <p class="h5">Update Product</p>
    <table>
      <?php include "db_config.php";
      $id = $_GET["id"];
      $sql ="SELECT * FROM `stock` WHERE `id`='$id'";
      $result = mysqli_query($con,$sql);
      if(mysqli_num_rows($result)> 0)
      {
        $row = mysqli_fetch_assoc($result);
        ?>
        <tbody>
          <form action="update-stock.php" method="get">
            <tr>
              <td>Product</td>
              <td>
                <input type="text" name="product" value="<?php echo $row["product"] ?>">
              </td>
            </tr>
            <tr>
              <td>Sub Category</td>
              <td>
                <input type="text" name="sub_category" value="<?php echo $row["sub_category"] ?>">
              </td>
            </tr>
            <tr>
              <td>Price</td>
              <td>
                <input type="number" name="price" value="<?php echo $row["price"] ?>">
              </td>
            </tr>
            <tr>
              <td>Qty Left</td>
              <td>
                <input type="number" name="qty_left" value="<?php echo $row["qty_left"] ?>">
              </td>
            </tr>
            <tr>
              <td>Qty Sold</td>
              <td>
                <input type="number" name="qty_sold" value="<?php echo $row["qty_sold"] ?>">
              </td>
            </tr>
            <tr>
              <td>
                <input type="hidden" name="id" value=<?php echo $row["id"]?>"">
              </td>
              <td>
                <input type="submit" class="btn" name="update"/>
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

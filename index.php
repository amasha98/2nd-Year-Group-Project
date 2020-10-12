<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Manage Product Stocks</title>
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
    text-align: center;
  }

  .h5{
    font-size: 1.25em;
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.2;
  }

  a{
    text-decoration: none;
  }

  .buttons{
    display: flex;
  }

  input {
    display: block;
    height: calc(1.5em + .75rem + 2px);
    margin: .375rem .75rem;
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

  #raw_material{
    display: none;
  }
  </style>
  <script>
  function show_btn1() {
    var s = document.getElementById("stock");
    var r = document.getElementById("raw_material");
    if (s.style.display === "none") {
      s.style.display = "block";
      r.style.display = "none";
    } else {
      s.style.display = "none";
      r.style.display = "none";
    }
  }

  function show_btn2() {
    var r = document.getElementById("raw_material");
    var s = document.getElementById("stock");
    if (r.style.display === "none") {
      r.style.display = "block";
      s.style.display = "none";
    } else {
      r.style.display = "none";
      s.style.display = "none";
    }
  }
</script>
</head>
<body>
  <div class="buttons">
    <div class="button">
      <input type="button" onclick="show_btn1()" class="btn" id="btn1" value="Stock" >
    </div>
    <div class="button">
      <input type="button" onclick="show_btn2()" class="btn" id="btn2" value="Raw Material" >
    </div>
  </div>
  <div id="stock">
    <p class="h5">Products Stock</p>
    <table>
      <thead>
        <tr>
          <th>Product</th>
          <th>Sub Category</th>
          <th>Price</th>
          <th>Qty Left</th>
          <th>Qty Sold</th>
          <th>Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "db_config.php";
        $sql ="SELECT * FROM `stock`";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)> 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
            <tr>
              <td><?php echo $row["product"] ?></td>
              <td><?php echo $row["sub_category"] ?></td>
              <td><?php echo $row["price"] ?></td>
              <td><?php echo $row["qty_left"] ?></td>
              <td><?php echo $row["qty_sold"] ?></td>
              <td>
                <a href="update-stock.php?id=<?php echo $row["id"] ?>">🖊️</a>
                <a href="delete-stock.php?id=<?php echo $row["id"] ?>">🗑️</a>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <div id="raw_material">
    <p class="h5">Raw Material</p>
    <table>
      <thead>
        <tr>
          <th>Supplier Id</th>
          <th>Details</th>
          <th>Price</th>
          <th>Qty Left</th>
          <th>Qty Sold</th>
          <th>Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "db_config.php";
        $sql ="SELECT * FROM `raw_material`";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)> 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
            <tr>
              <td><?php echo $row["supplier_id"] ?></td>
              <td><?php echo $row["details"] ?></td>
              <td><?php echo $row["purchase_price"] ?></td>
              <td><?php echo $row["qty_left"] ?></td>
              <td><?php echo $row["qty_used"] ?></td>
              <td>
                <a href="update-raw-material.php?id=<?php echo $row["id"] ?>">🖊️</a>
                <a href="delete-raw-material.php?id=<?php echo $row["id"] ?>">🗑️</a>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

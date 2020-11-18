<html>
    <head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="users.css">
	
		<title>Manage Stocks</title>
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
	    <header>
		    <div class="left">
			    <h3>Milli<span>Unique</span></h3>
			</div>
			<div>
			    <a href="" class="notification"><i class="fa fa-bell"></i></a>
			</div>
			<div class="right">
			    <a href="" class="logout">Logout</a>
			</div>
		</header>
		<div class="sidenav">
		    <center>
			    <img src="admin.jpg" class="admin">
				<h4>Admin</h4>
			</center>
			<a href=""><i class="fa fa-desktop"></i><span>Dashboard</span></a>
			<a href=""><i class="fa fa-shopping-bag"></i><span>Orders</span></a>
			<a href=""><i class="fa fa-user"></i><span>Manage Users</span></a>
			<a href=""><i class="fa fa-list"></i><span>Manage Stocks</span></a>
			<a href=""><i class="fa fa-bar-chart"></i><span>Analytics</span></a>
			<a href=""><i class="fa fa-wrench"></i><span>Customize Requests</span></a>
			<a href=""><i class="fa fa-comments"></i><span>Chat</span></a>
			<a href=""><i class="fa fa-envelope-open"></i><span>Inquiries</span></a>
			<a href=""><i class="fa fa-book"></i><span>Reports</span></a>
		</div>
		<div class="content">
		
		<table>
			<caption> Stocks Management</caption>
			              <th>Product</th>
						  <th>Sub Category</th>
						  <th>Price</th>
		                  <th>Unit Price </th>
                          <th>Qty Left</th>
						  <th>Qty Sold</th>
						  <th>Operations</th>
				
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
						<td><?php echo $row["unit_Price"] ?></td>
						<td><?php echo $row["qty_left"] ?></td>
						<td><?php echo $row["qty_sold"] ?></td>
						<td>
							
							<a href="delete-stock.php?id=<?php echo $row["id"]?>"><button>Delete</button></a>
							<a href="update-stock.php?id=<?php echo $row["id"]?>"><button>Update</button></a>
						</td>
					</tr>
					<?php
			}
			}
				?>
					
					
				</tbody>
				<tfoot colspan="5">
					<button>⏬ Show more </button>
				</tfoot>	
			</table>
			
			
						<table>
			<caption>Raw Materials</caption>
				<thead>
					<th>Supplier Id</th>
					<th>Details</th>
					<th>Price</th>
					<th>Qty Left</th>
					<th>Qty Sold</th>
					<th>Operations</th>
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
								
								<a href="delete-raw-material.php?id=<?php echo $row["id"] ?>"><button>Delete</button></a>
								<a href="update-raw-material.php?id=<?php echo $row["id"] ?>"><button>Update </button></a>
							</td>
						</tr>
					<?php
				}
			}
			?>
				</tbody>	
				<tfoot colspan="5">
								<button>⏬ Show more </button>
				</tfoot>
			</table>
		</div>
	</body>
</html>
<html>
    <head>
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="users.css">
	
		<title>Manage Users</title>
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
			<caption>User Administration</caption>
			         <th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
                    <th>Email</th>
					<th>Operation</th>
				
				<tbody>
				 <?php
					include "connection.php";
					$sql ="SELECT * FROM `users`";
					$result = mysqli_query($con,$sql);
					if(mysqli_num_rows($result)> 0)
							{
								while($row = mysqli_fetch_assoc($result))
							{
				?>
					<tr>
						<td><?php echo $row["id"] ?></td>
						<td><?php echo $row["fname"] ?></td>
						<td><?php echo $row["lname"] ?></td>
						<td><?php echo $row["email"] ?></td>

						<td>
							
							<a href="delete_users.php?id=<?php echo $row["id"]?>"><button>Delete</button></a>
							<a href="update_users.php?id=<?php echo $row["id"]?>"><button>Update</button></a>
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
			
			
					
				</tfoot>
			</table>
		</div>
	</body>
</html>
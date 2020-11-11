<?php
	$recipient_name = $_POST['recipient_name'];
	$recipient_phone = $_POST['recipient_number'];
	$delivery_address = $_POST['delivery_address'];
	$delivery_city = $_POST['delivery_city'];
	$location = $_POST['location'];
	$delivery_date = $_POST['delivery_date'];

	// Database connection
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "milliunique";
	$conn = new mysqli('$host','$dbusername','$dbpassword','$dbname');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO delivery_info (recipient_name, recipient_phone, delivery_address, delivery_city, delivery_type, delivery_date) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sissss", $recipient_name, $recipient_phone, $delivery_address, $delivery_city, $location, $delivery_date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Order Successfully Placed";
		$stmt->close();
		$conn->close();
	}
?>
	
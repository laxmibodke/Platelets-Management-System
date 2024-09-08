<?php

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	// $gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	 $type = $_POST['type'];

	// Database connection

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "test";

// $conn = new mysqli($servername, $username, $password, $database);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into donor(firstName, lastName, email, password,type) values(?, ?, ?, ?,?)");
		$stmt->bind_param("sssss", $firstName, $lastName, $email, $password,$type);
		$execval = $stmt->execute();
		// echo $execval;
		// echo "Registration successfully...";
		if($_SERVER['REQUEST_METHOD']=="POST") {
			header("Location:login.html");
		}
		
		$stmt->close();
		$conn->close();
	}
?>
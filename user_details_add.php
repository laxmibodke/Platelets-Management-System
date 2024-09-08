<?php

session_start();

$User_id =$_SESSION['user_id'];
$Phone_no = $_POST['number'];
$Gender = $_POST['gender'];
$Blood_Group = $_POST['bloodgroup'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	
    else {
		$stmt = $conn->prepare("insert into user_details(User_id,Phone_no,Gender,Blood_Group) values(?, ?, ?,?)");
		$stmt->bind_param("iiss",$User_id,$Phone_no,$Gender,$Blood_Group);
		$execval = $stmt->execute();

// if($execval)
// {
// echo "Success";

// }
// else
// {
//     echo "Error: " . $stmt->error;

// }
        
		//  echo $execval;
		// echo "Registration successfully...";
		if($_SERVER['REQUEST_METHOD']=="POST") {
             header('Location:donor.html');
           
        }
		
		$stmt->close();
		$conn->close();
    }
?>
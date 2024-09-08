<?php

session_start();

	
	$email = $_POST['email'];
    print_r($email);
	// $password = $_POST['password'];
    // print_r($password);
    
    
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

//  $user = $conn->real_escape_string($_POST['email']);
    
   $pass = $conn->real_escape_string($_POST['password']);
   print_r($pass);

    // $query = "SELECT `email` AND `password` FROM `donor` WHERE `email` = '$email' AND `password` = '$password'";
    $stmt = $conn->prepare("SELECT * FROM donor WHERE email = ? and password = ?");
$stmt->bind_param("ss", $email, $pass);
$stmt->execute();
$result = $stmt->get_result();


    // $result = $conn->query($query);
    if($result->num_rows > 0) {

       $user_data = $result->fetch_assoc();
       $_SESSION['user_id'] = $user_data['id'];
        $type = $user_data['type'];
        if($type === 'donor')
        header('Location:donor.html');
        else 
        header('Location:donor.html');
    
     //   header('Location:donor.html')
       die();
    }
    else  header('Location:index.html');
?>
	
 
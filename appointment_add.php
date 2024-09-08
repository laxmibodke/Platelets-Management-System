<?php


session_start();

$User_id =$_SESSION['user_id'];
$Hospital_name = $_POST['Hospital'];  
$Date = $_POST['ap_date'];  

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
        $stmt = $conn->prepare("INSERT INTO appoinment_details (user_id, Hospital_name, Date) VALUES (?, ?, STR_TO_DATE(?, '%Y-%m-%d'))");
		$stmt->bind_param("iss", $User_id,$Hospital_name,$Date);
		$execval = $stmt->execute();

        // if($execval)
        // {
        // echo "Success";
        
        // }
        // else
        // {
        //     echo "Error: " . $stmt->error;
        
        // }
		if($_SERVER['REQUEST_METHOD']=="POST") {
            $user_data = $execval->fetch_assoc();
            $_SESSION['appointmentId'] = $user_data['appointment_id'];
            header('Location:donor.html');
            //  header('Location:show_appoinment.html');
           
        }
		
		$stmt->close();
		$conn->close();
    }
?>
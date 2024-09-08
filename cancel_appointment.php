<?php

// connection 
session_start();

//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "test";

// // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection
    $conn = new mysqli("localhost", "root", "", "test");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get appointment ID from POST data
    $appointmentId = $_POST["appointmentId"];

    // Perform the cancellation logic (update database, send notifications, etc.)
    // Example: Update the appointment status to canceled
    $sql = "delete from appoinment_details WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appointmentId);

    if ($stmt->execute()) {
        //  echo "Appointment canceled successfully!";
        //  header('Location:donor.html');
    } 
    // else {
    //     echo "Error: " . $stmt->error;
    // }

    $stmt->close();
    $conn->close();
}
?>

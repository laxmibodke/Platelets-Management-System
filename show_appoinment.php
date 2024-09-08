<?php
   session_start();
   $User_id =$_SESSION['user_id'];
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

//    $ap_id = $_POST['appointmentId'];

    // SQL query to fetch data from the database
    $sql = "SELECT * FROM appoinment_details where `user_id`= '$User_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data in a table
        echo "<table border='1'>
                <tr>
                    <th>Appointment_id</th>
                    <th>Hospital_name</th>
                    <th scope='col'>Date</th>
                    <th scope='col'>Cancel</th>
          <th scope='col'>Update</th>
                </tr>";

        while($row = $result->fetch_assoc()) {

        //     echo "<tr>
        //             <td >" . $row["Appointment_id"] . "</td>
        //             <td>" . $row["Hospital_name"] . "</td>
        //             <td>" . $row["Date"] . "</td>
        //             <td><button >cancel</button></td>
        //   <td><button>update</button></td>
                  
        //         </tr>";

       
               echo "<tr>
                    <td id='ap_id' >" . $row["Appointment_id"] . "</td>
                    <td>" . $row["Hospital_name"] . "</td>
                    <td>" . $row["Date"] . "</td>
                   
                    <td><button onclick='openModal()'>cancel</button></td>
                    <td><button onclick='update_appointment()'>update</button></td>
                    
                   
                </tr>";
        }

        // echo "</table>";
    } else {
        // echo "<table border='1'>
        // <tr>
        //     <th>Appointment_id</th>
        //     <th>Hospital_name</th>
        //     <th>Date</th>
        // </tr>";;
    }

    // Close the connection
    $conn->close();
    ?>
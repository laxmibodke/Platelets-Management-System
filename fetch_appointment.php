<?php
   session_start();
   $User_id =$_SESSION['user_id'];
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "test";



   if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Assuming you have a database connection
    $conn = new mysqli("localhost", "root", "", "test");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get appointment ID from POST data
    $appointment_Id = $_SESSION["appointmentId"];


    // SQL query to fetch data from the database
    $sql = "SELECT * FROM appoinment_details WHERE Appointment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appointment_Id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data in a table
        $row = $result->fetch_assoc();

        // echo json_encode(array("hospital_name" => $row["hospital_name"]));
        // echo json_encode(array("date" => $row["Date"]));

        echo `
        
        <div class="panel-body" id="appointment">
            <form target="_blank" action="appointment_add.php" method="post">

              <div class="form-group">
                <label for="noDefaultSelection">Choose a hospital:</label>
                <select class="form-control" id="hospital" name="Hospital">
                  
                  <option value="City_hospital">"{$row[hospital_name]}"</option>
                  
                </select>
              </div>

              <div class="form-group">
                <label for="dob">Date:</label>
                <input
                  class="form-control"
                  type="date"
                  id="ap_date"
                  name="ap_date"
                  required
                />
              </div>

              <input
                value="Book"
                type="submit"
                class="btn btn-primary center"
              />
            </form>
          </div>`;


    } else {
        
    }
}
    // Close the connection
    $conn->close();
    ?>
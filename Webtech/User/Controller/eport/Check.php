<?php
// session_start();
// Include the database connection
require_once('../../Model/Database/connection.php');


$data = $_REQUEST['final'] ?? null;


if ($data) {
  
    $finaldata = json_decode($data, true);

    $name = $finaldata['name'] ?? null;
    $email = $finaldata['email'] ?? null;
    $report = $finaldata['report'] ?? null;

    var_dump($name.$email.$report);
  
    if (!empty($name) && !empty($email) && !empty($report)) {
      
        $con = getConnection();
       
        $sql = "INSERT INTO report (user_name, email, report) VALUES ('$name', '$email', '$report')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "successfull";
        } else {
            echo "Failed to submit report.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "No data received.";
}
?>

<?php
session_start();

require_once('../../../Model/PersonalData/updataname.php');

$id = $_SESSION['userid'];

// Get the data from the request
$json = $_REQUEST['mydata'];
$data = json_decode($json, true);

// Extract the new name from the data
$newname = $data['newname'];

// Call the function to update the name
$result = updatename($newname, $id);

if ($result) {
    $response = ['action' => 'successfull', 'id' => $id];
} else {
    $response = ['action' => 'error', 'id' => $id];
}

// Return the response as JSON
echo json_encode($response);
?>

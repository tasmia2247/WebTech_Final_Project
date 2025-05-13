<?php
session_start();

if (empty($_SESSION['userid'])) {
    // If the user is not logged in, return a JSON error response
    $response = ['action' => 'error', 'message' => 'User not logged in'];
    echo json_encode($response);
    exit;
} else {
    require_once('../../../Model/PersonalData/userdata.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the JSON data sent from the client
        $json = $_REQUEST['mydata'];
        $data = json_decode($json, true);

        $id = $_SESSION['userid'];
        $livein = !empty($data['livein']) ? $data['livein'] : '';
        $university = !empty($data['university']) ? $data['university'] : '';
        $college = !empty($data['college']) ? $data['college'] : '';
        $hometown = !empty($data['hometown']) ? $data['hometown'] : '';

        // Call the update function
        $updateSuccess = updateUserData($id, $livein, $university, $college, $hometown);

        // Return JSON response based on the result
        if ($updateSuccess) {
            $response = ['action' => 'successfull', 'id' => $id];
        } else {
            $response = ['action' => 'error', 'message' => 'Error updating data'];
        }
        
        echo json_encode($response);
    } else {
        // If the request method is not POST, return an error
        $response = ['action' => 'error', 'message' => 'Invalid request method'];
        echo json_encode($response);
    }
}
?>

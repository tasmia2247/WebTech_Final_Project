<?php
session_start();

require_once('../../../Model/PersonalData/password.php');



$id = $_SESSION['userid'];


$json = $_REQUEST['mydata'];
$data = json_decode($json, true);


$old_password = $data['old_password'];
$new_password = $data['new_password'];


$result = updatepassword($old_password, $new_password);

if ($result) {
    $response = ['action' => 'successfull', 'id' => $id];
} else {
    $response = ['action' => 'error', 'id' => $id];
}

echo json_encode($response);

<?php
session_start();
require_once('../../Model/Autentication/loginRegistration.php');


    
    $json = $_REQUEST['mydata'];  
    $data = json_decode($json, true);  

    if ($data) {
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $dob = $data['date'];

        $response = array();

        $checks = countEmails($email);
        if ($checks > 0) {
            $response['action'] = 'error';
            $response['message'] = 'Please change the email, it is already registered.';
        } else {
            if ($username === "" || $password === "" || $email === "" || $dob === "") {
                $response['action'] = 'error';
                $response['message'] = 'Null data found!';
            } else {
                $status = addUser($username, $password, $email, $dob);
                if ($status) {
                    $response['action'] = 'successfull';
                    $response['message'] = 'Registration successful';
                } else {
                    $response['action'] = 'error';
                    $response['message'] = 'There was an issue during registration. Please try again.';
                }
            }
        }

        
        echo json_encode($response);
    } else {
        echo json_encode(['action' => 'error', 'message' => 'Invalid JSON data.']);
    }
 
?>

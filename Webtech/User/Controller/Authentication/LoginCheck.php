<?php
session_start();
require_once('../../Model/Autentication/loginRegistration.php');


if (isset($_POST['submit'])) {
    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);

    if (empty($email) || empty($password)) {
        echo "Null data found!";
    } else {
       

        $userId = login($email, $password);
        if ($userId) {
            session_regenerate_id(true);
            $_SESSION['userid'] = $userId;
            header('location: ../../View/Welcome/welcome.php?id=' . $userId);
            exit;
        } else {
           echo "error";
          
        }
    }
} else {
    header('location: ../../View/Authentication/login.html');
    exit;
}

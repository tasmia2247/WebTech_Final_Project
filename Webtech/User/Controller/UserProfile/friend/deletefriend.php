<?php

require_once('../../../Model/sql.php');

if (isset($_REQUEST['id'])) {

    $id = $_REQUEST['id'];

    $result = deletefriend($id);

    if ($result) {
     
        header("Location: ../../../View/UserProfile/userprofile.php"); 
        exit; 
    } else {
        
        header("Location: ../../../View/UserProfile/userprofile.php"); 
        exit;
    }
} else {
    
    header("Location: ../../../View/UserProfile/userprofile.php"); 
    exit;
}

?>
<?php
session_start();


require_once('../../../Model/PersonalData/deleteacc.php');


if (isset($_REQUEST['action']) && $_REQUEST['action'] === "delete") {

    $id = $_SESSION['userid'];


    $result = deleteAccount($id);

    if ($result) {
        session_destroy(); 
        echo "successfull";
    } else {
        
        echo "error";
    }

}?>
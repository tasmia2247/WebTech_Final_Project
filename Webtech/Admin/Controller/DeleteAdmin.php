<?php
session_start();
include('../Model/adminListModel.php');

if(isset($_SESSION['username'])){

    $Del_username = $_SESSION['username'];
    $delete = deleteAdmin($Del_username);

    if($delete){
        header('location: ../view/login.html');
    }
    else{
        echo "Error : Admin could not delete.";
    }

}
else{
    echo "Error : User not find";
}




?>
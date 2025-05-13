<?php
session_start();
include('../Model/adminListModel.php');
if(isset($_REQUEST['mydata'])){
    $json = $_REQUEST['mydata'];
    $user = json_decode($json);

    $username =  $user ->username;
    $password =  $user ->password;
   
    if (empty($username) || empty($password)) {
        echo "Null data found!";
    }
    else {
          $status =  login($username,$password);
        
          if($status == true){
            $_SESSION['username'] = $username;
            echo "LOGIN SUCCESFUL";
            exit();
             
          }
          else{
             echo "Wrong Password,Try again";
             exit();
          }

}
}
else {
    echo "Try Again Please.....";
    exit();
}



?>
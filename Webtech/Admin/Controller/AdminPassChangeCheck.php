<?php
session_start();
include('../Model/adminListModel.php');


if (isset($_SESSION['username'])) {
if(isset($_REQUEST['mydata'])){

    $passwords = json_decode($_REQUEST['mydata']);

    $username = $_SESSION['username'];
    $oldpassword = $passwords->oldpassword;
    $newpassword = $passwords->newpassword;
   
    
    if (empty($oldpassword) || empty($newpassword)) {
        echo "Null data found!";
    }
    else
    {  
        $password = getPassword($username);
        
       if($password == $oldpassword){
            updatePassword($username,$newpassword);
            echo "Password Change Succesfully";
          }
          else{
            echo "Old Password is not correct, Please type correct Old Pasword";
           }
    
       }

}
else {
    echo "Try Again Please";
}
}
else {
    echo "Username not found";
}



?>
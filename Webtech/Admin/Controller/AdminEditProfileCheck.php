<?php
include('../Model/adminListModel.php');
session_start();
if(isset($_SESSION['username'])){
  if(isset($_REQUEST['mydata'])){
    
    $username = $_SESSION['username'];
    $Admin = json_decode($_REQUEST['mydata']);
    
    $email  =  $Admin->email;
    $fullname = $Admin->fullname;
    $dob= $Admin->dob;
    $mobileno = $Admin->mobileno;
    $gender = $Admin->gender;

    $emailcheck = getUserbyemail($email);
    $mobilecheck = getUserbymobile($mobileno);
   

    if( $username == null ||$email  ==  null || $fullname == null || $dob == null ||$mobileno == null ||
    $gender == null){
        echo "Null Value Found";
    }
  else if($emailcheck == true){
         echo "This Email already taken";
  }
  else if($mobilecheck == true){
        echo 'This Mobile no already taken';
  }
    else {
        $status = updateUserbyUsername($username,$fullname,$email,$mobileno,$gender,$dob);
        if($status != null){
           echo "Admin Info Updated Succesfully";
        }else{
           echo "Admin Info Update Failed,Try agian";
        }
    }
  }
  else{
    echo "ERROR : No submit";
  }
}
else{
    echo "Please Login First";
    header('location: ../view/login.html');
    exit();
}
?>
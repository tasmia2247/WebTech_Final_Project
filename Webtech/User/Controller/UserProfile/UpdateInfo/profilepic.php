<?php
  session_start();
if (empty($_SESSION['userid'])) {
    header('Location: ../../../View/Authentication/login.html');
    exit;  
} else {
 
    require_once('../../../Model/PersonalData/profilepic.php');
  
 
    if (!empty($_FILES['image']['name'])) {
        $id=$_SESSION['userid'];
        $targetDir = "../../../upload/"; // Path for storing the uploaded file
        $targetFile = $targetDir . basename($_FILES['image']['name']);
    
        // Check if the upload was successful
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $filePath = "upload/" . basename($_FILES['image']['name']); // Save the relative path
            if (updateProfile($filePath, $id)) {
                header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
            } else {
                header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
            }
        }
    
        exit;
    }
    








}
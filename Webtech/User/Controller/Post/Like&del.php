<?php
session_start();

require_once('../../Model/sql.php');
$id = $_SESSION['userid'];


if (isset($_REQUEST['action'])) {

    $userId = $_SESSION['userid'];

    $postid = $_REQUEST['post_id'];

    $action = $_REQUEST['action'];
 
    $post_Details = getPersonalPost($postid);

    if ( $_SESSION['page']=="UserProfile") {
        
        if ($action == 'like') {
            $result = postLike($postid);
            if ($result) {
                header("Location:../../View/UserProfile/userprofile.php?id=$userId");
            } else {
                header("Location:../../View/UserProfile/userprofile.php?id=$userId");
            }
        }
        
        else if ($action == 'postdelete') {

            $result = postdelete($postid);
            if ($result) {
                header("Location:../../View/UserProfile/userprofile.php?id=$userId");
            }
        }
    }


    else if( $_SESSION['page']=="Welcome"){
        if ($action == 'like') {
            $result = postLike($postid);
            if ($result) {
                header("Location:../../View/Welcome/welcome.php?id=$userId");
            } else {
                header("Location:../../View/Welcome/welcome.php?id=$userId");
            }
        } 
      
        }


    
    else if( $_SESSION['page'] = "political"){
        if ($action == 'like') {
            $result = postLike($postid);
            if ($result) {
                header("Location:../../View/Newspaper/Political/political.php?id=$userId");
            } else {
                header("Location:../../View/Newspaper/Political/political.php?id=$userId");
            }
        } 
    
    }
}





   





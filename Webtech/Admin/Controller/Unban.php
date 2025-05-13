<?php
include('../Model/bannedlistModel.php');
if(isset($_REQUEST['id'])){
 
    
    $Delete =  Unban($_REQUEST['id']);
    header('location: ../view/BannedAccount.php');
}
else {
    echo "ERROR : Could not catch ID";
}

?>
<?php
include("../../Model/complainlistModel.php");


if(isset($_REQUEST['id'])){
    $Id = $_REQUEST['id'];
    

    $BanAccount = GetComplain($Id);
    if($BanAccount != null){
    $accid = $Id;
    $accountname = $BanAccount['accountname'];
    $reason = $BanAccount['complaint'];
    $bannedtime = "7th January 2025" ;
     
    addBanAcc($accid,$accountname,$reason,$bannedtime);
    header('location: ../../view/complainBox.php');
    
    }
    else{
        echo "Error";
    }

   
}

else{
    
    echo "ERROR : Could not catch id";
}

?>
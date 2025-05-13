<?php
include('../Model/PremiumAccountModel.php');

if(isset($_REQUEST['mydata'])){
      $json = $_REQUEST['mydata'];
      $PremiumAcc = json_decode($json);

      if($PremiumAcc == null){
        echo "Failed to decode";
      }
      
      $username = 'test';
      $AccountName = $PremiumAcc->premiumName ;
      $Url = $PremiumAcc->websiteURL;
      $websiteName = $PremiumAcc->websiteName;
      $type = $PremiumAcc->type;
      $Enddate = $PremiumAcc->subscribeEnd;

if(empty($username) || empty($AccountName) || empty($Url) || empty($websiteName) || empty($type) || empty($Enddate)){
    echo "Null Data Found";

}

else{
    $status = AddPremium($username,$AccountName,$Url,$websiteName,$type,$Enddate);

    if($status =! null){
        echo "Premium Account added successfully";
    }
    else{
       echo "Failed to add";
    }
}

}

else{
    "Please Submit Premium Account Form first";
}









?>
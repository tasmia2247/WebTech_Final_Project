<?php
include("../../Model/PremiumAccountModel.php");


if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];

    deletebyPremiumaccount($name);
    header("location:../../view/PremiumAccount.php");
   
}

else{
    
    echo "ERROR : Could not catch accoutname";
}

?>
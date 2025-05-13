<?php
include("../../Model/PremiumAccountModel.php");


if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
    $status = false;
    changeStatus($name,$status);
    header("location:../../view/PremiumAccount.php");
   
}

else{
    
    echo "ERROR : Could not catch accoutname";
}

?>
<?php
include("../../Model/PremiumAccountModel.php");


if(isset($_REQUEST['name'])){
    $name = $_REQUEST['name'];
    $status = true;
    changeStatus($name,$status);
    header("location:../../view/PremiumAccount.php");
   
}

else{
    
    echo "ERROR : Could not catch accoutname";
}

?>
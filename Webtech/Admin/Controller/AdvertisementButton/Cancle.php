<?php
include("../../Model/AdvertisementListModel.php");


if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    DeleteAd($id);
    header("location:../../view/AdvertisementManage.php");
   
}

else{
    
    echo "ERROR : id";
}

?>
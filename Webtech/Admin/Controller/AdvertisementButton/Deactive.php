<?php
include("../../Model/AdvertisementListModel.php");


if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $status = 'Pending';
    updateAddList($id,$status);
    header("location:../../view/AdvertisementManage.php");
   
}

else{
    
    echo "ERROR : id";
}

?>
<?php
include("../../Model/AdvertisementListModel.php");


if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $status = 'Active';
    updateAddList($id,$status);
    header("location:../../view/AdvertisementManage.php");
   
}

else{
    
    echo "ERROR : Could not catch id";
}

?>
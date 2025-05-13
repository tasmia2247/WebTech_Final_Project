<?php
include("../../Model/complainlistModel.php");


if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $result=reportde($id);
    if($result){
        header('location: ../../view/complainBox.php');
    }
else{
    header('location: ../../view/complainBox.php');
}
}

?>
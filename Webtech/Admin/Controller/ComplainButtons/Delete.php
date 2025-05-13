<?php
require_once("../../Model/complainlistModel.php");


if(isset($_REQUEST['id'])){
    
    

    $id=$_REQUEST['id'];
    var_dump($id);
    $action=$_REQUEST['action'];
    
    
    
    $result=postdelete($id);
   if($result){
    header('location: ../../view/complainBox.php');
   }
   
   else{
    return false;
   }
    
    




}

?>
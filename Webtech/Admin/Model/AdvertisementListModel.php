<?php
     
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        return $con;
    }

    function getAllAdvertisement(){
        $con = getConnection(); 
        $sql = "select * from adlist";
        $result = mysqli_query($con, $sql);
        $Advetisements = [];
    
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $Advertisements[] = $row;
            }
        }
        mysqli_close($con);
        return $Advertisements;
    }

    function Addadvertisement($adid,$accountname,$productname,$date,$image,$status,$payment){
        $con = getConnection(); 
        $sql = "insert into adlist VALUES('{$adid}','{$accountname}','{$productname}','{$date}','{$image}','{$status}','{$payment}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }

    function updateAddList($id,$status){
        $con = getConnection();
        $sql = "UPDATE adlist SET status= '{$status}' WHERE adid = '{$id}'";
        $result = mysqli_query($con, $sql);

        return $result;
    }

    function getAd($id){
        $con = getConnection();
        $sql =  "SELECT * from adlist WHERE adid = '{$id}' ";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null; 
        }
    }

    function DeleteAd($id){
        $con = getConnection();
        $sql =  "DELETE from adlist WHERE adid = '{$id}'";

        return mysqli_query($con,$sql);
    }
?>
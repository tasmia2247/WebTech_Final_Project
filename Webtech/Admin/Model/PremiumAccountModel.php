<?php
     
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        return $con;
    }

    function getAllPremiumAccounts(){
        $con = getConnection(); 
        $sql = "select * from premiumaccountrequest";
        $result = mysqli_query($con, $sql);
        $accounts = [];
    
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $accounts[] = $row;
            }
        }
        mysqli_close($con);
        return $accounts;
    }

    function deleteAccounts($username){
        $con = getConnection();
        $sql = "DELETE from premiumaccountrequest where username = '{$username}'";

        return mysqli_query($con,$sql);
    }
    function deletebyPremiumaccount($username){
        $con = getConnection();
        $sql = "DELETE from premiumaccountrequest where Paccountname = '{$username}'";

        return mysqli_query($con,$sql);
    }

    function AddPremium($username,$accountname,$url,$websitename,$type,$enddate){
        $con = getConnection(); 
        $sql = "insert into premiumaccountrequest VALUES('{$username}' ,'{$accountname}','{$url}','{$websitename}','{$type}','{$enddate}',DATEDIFF(CURDATE(), '{$enddate}') , 'false')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }

    }

    function getPremiumAccount($accountname){
        $con = getConnection();
        $sql =  "SELECT * from premiumaccountrequest WHERE Paccountname = '{$accountname}' ";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null; 
        }
    }
    function changeStatus($name , $status){
        $con = getConnection();
        $sql =  "UPDATE premiumaccountrequest SET Active = '{$status}' WHERE Paccountname = '{$name}'";


        return mysqli_query($con, $sql);
    }

    


?>
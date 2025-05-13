<?php
     
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        return $con;
    }

    function getAllbanAccount(){
        $con = getConnection(); 
        $sql = "select * from bannedlist";
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


    function AddBanAcc($accid,$accountname,$reason,$bannedtime){
        $con = getConnection(); 
        $sql = "insert into bannedlist VALUES('{$accid}' ,'{$accountname}','{$reason}','{$bannedtime}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }

    }

    function Unban($accid){
        $con = getConnection(); 
        $sql = "DELETE from bannedlist where accountid = '{$accid}'";

        return mysqli_query($con, $sql);
    }
?>
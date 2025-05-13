<?php
     
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        return $con;
    }

    function getAllPosts(){
        $con = getConnection(); 
        $sql = "select * from boastpost";
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


    function AddBoastPost($userid,$postid,$postdetails,$posttype,$status,$username){
        $con = getConnection(); 
        $sql = "insert into boastpost VALUES('{$postid}' ,'{$userid}','{$postdetails}','{$posttype}','{$status}','{$username}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }

    function ChangeStatus($postid,$status){
        $con = getConnection();
        $sql =  "UPDATE boastpost SET Status = '{$status}' WHERE postid = '{$postid}'";
        return mysqli_query($con, $sql);
    }



    function DeleteBoast($postid){
        $con = getConnection(); 
        $sql = "DELETE from boastpost where postid = '{$postid}'";

        return mysqli_query($con, $sql);
    }
?>
<?php
     
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        return $con;
    }

    function logincheck($username, $password){
        $con = getConnection();
        $sql = "select * from adminlist where username='{$username}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $count =  mysqli_num_rows($result);

        if($count == 1){
            return true;
        }else{
            return false;
        }
    }

    function addUser($username, $password, $email , $fullname , $dob , $mobileno , $id , $gender){
        $con = getConnection();
        $sql = "insert into adminlist VALUES( '{$id}' ,'{$username}', '{$password}', '{$email}' ,'{$dob}', '{$gender}','{$mobileno}' ,'{$fullname}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }



    function getUser($username) {
        $con = getConnection();
        $sql = "SELECT * FROM adminlist WHERE username = '{$username}'";
        $result = mysqli_query($con, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null; 
        }
    }
    
    function getUserbyID($id) {
        $con = getConnection();
        $sql = "SELECT * FROM adminlist WHERE ID = '{$id}'";
        $result = mysqli_query($con, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null; 
        }
    }

    function getAllAdmin(){
        $con = getConnection(); 
        $sql = "select * from adminlist";
        $result = mysqli_query($con, $sql);
        $users = [];
    
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }
        mysqli_close($con);
        return $users;
    }

        
    function updateUserbyUsername($username,$fullname,$email,$phone,$gender,$dob){
        $con = getConnection();
        $sql = "UPDATE adminlist SET  email= '{$email}', fullname ='{$fullname}', mobileno ='{$phone}', gender = '{$gender}',dob='{$dob}' WHERE username = '{$username}'";
        $result = mysqli_query($con, $sql);

        return $result;
    }

    
    function updateUser($id,$username,$email,$password){
        $con = getConnection();
        $sql = "UPDATE adminlist SET username= '{$username}', email= '{$email}', password='{$password}' WHERE id = '{$id}'";
        $result = mysqli_query($con, $sql);

        return $result;
    }

    function deleteAdmin($username){
        $con = getConnection();
        $sql = "DELETE from adminlist where username = '{$username}'";

        return mysqli_query($con,$sql);
    }

   function getPassword($username){
    $con = getConnection();
    $sql = "SELECT password from adminlist Where username = '{$username}' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row["password"];
   }

   function updatePassword($username,$newpass){
    $con = getConnection();
    $sql = "UPDATE adminlist SET password='{$newpass}' WHERE username = '{$username}'";
        $result = mysqli_query($con, $sql);

        return $result;
   }

   function getUserbyemail($email){
    $con = getConnection();
    $sql = "SELECT * FROM adminlist WHERE email = '{$email}'";
    $result = mysqli_query($con, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null; 
    }

   }
   function getUserbymobile($mobileno){
        $con = getConnection();
        $sql = "SELECT * FROM adminlist WHERE mobileno = '{$mobileno}'";
        $result = mysqli_query($con, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null; 
        }
    }
?>
<?php
     
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        return $con;
    }

    function getAllPost(){
        $con = getConnection(); 
        $sql = "SELECT * FROM deletedpost";
        $result = mysqli_query($con, $sql);
        $posts = [];
    
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts[] = $row;
            }
        }
        mysqli_close($con);
        return $posts;
    }

    function Addpost($postid,$accountname,$deletedtime,$posttime,$postdetails){
        $con = getConnection(); 
        $sql = "insert into deletedpost VALUES( '{$postid}' ,'{$accountname}','{$deletedtime}','{$posttime}','{$postdetails}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }

    }
?>
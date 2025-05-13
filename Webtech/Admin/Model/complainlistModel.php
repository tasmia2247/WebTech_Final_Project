<?php
     
    function getConnection(){
        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        return $con;
    }

    function GetComplain($id){
        $con = getConnection();
        $sql = "SELECT * FROM complainbox WHERE accountid = '{$id}'";
        $result = mysqli_query($con, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null; 
        }


    }


    $action=$_REQUEST['action'];


    

    function getAllcomplan(){
        $con = getConnection();
        $sql = "SELECT * FROM report_post";
        
        $result = mysqli_query($con, $sql);
      
        $complains = [];
    
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $complains[] = $row;
            }
        }
     
        mysqli_close($con);
        
        return $complains;
    }




    function postdelete($postid)
{

    $con = getConnection();

        $sql = " DELETE FROM postComments WHERE post_id=$postid";
       $a= mysqli_query($con, $sql);

        $sql = " DELETE FROM postLikes WHERE post_id=$postid";
       $b= mysqli_query($con, $sql);

       $sql = " DELETE FROM report_post WHERE post_id=$postid";
       $c= mysqli_query($con, $sql);




    $result = getpost($postid);
    $one = $result[0];
    $two = $result[1];
    $three = $result[2];
    $four = $result[3];
    $five = $result[4];
   // var_dump($one, $two, $three, $four, $five);
    
    $sql = "INSERT INTO deletedpost (post_id, user_id, postContent, postType, Type) 
        VALUES ('$one', '$two', '$three', '$four', '$five')";
      //  var_dump($sql);
      

    $queryResult = mysqli_query($con, $sql);
    if ($queryResult) {
        $sql = " DELETE FROM posts WHERE post_id=$postid";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    
    }


    mysqli_close($con);
}



function reportde($id){
    

    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    
$sql="DELETE FROM report_post WHERE post_id = $id";

 $result=mysqli_query($con,$sql);


if($result){
    return true;
}

else{
    return false;
}

}




    function Addcomplain($complaint,$accountname,$postdetails,$complain,$postid){
        $con = getConnection(); 
        $sql = "insert into complainbox VALUES('{$complaint}' ,'{$accountname}','{$postdetails}','{$complain}','{$postid}')";        
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }

    }
?>
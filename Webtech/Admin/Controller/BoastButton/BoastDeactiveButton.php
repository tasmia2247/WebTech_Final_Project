<?php
include("../../Model/BoastPostModel.php");


if(isset($_REQUEST['id'])){
    $postid = $_REQUEST['id'];
    $status = 'Deactive';
    ChangeStatus($postid,$status);
    header("location:../../view/BoastPosts.php");
   
}

else{
    echo "ERROR : Could not catch id";
}

?>
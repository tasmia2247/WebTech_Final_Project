<?php


require_once('Database/connection.php');
session_start();


function savePost($userId, $postContent, $postType, $type)
{
    $con = getConnection();

    $sql = "INSERT INTO posts (user_id, postContent, postType,type) VALUES ('$userId', '$postContent', '$postType','$type')";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        error_log("SQL execution failed: " . mysqli_error($con));
    }

    mysqli_close($con);

    return $result;
}





function getPosts()
{
    $con = getConnection();
    $id = $_SESSION['userid'];

    $sql = "SELECT friendid FROM friendlist WHERE userid = $id";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        mysqli_close($con);
        return false;
    }

    $friendIds = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $friendIds[] = $row['friendid'];
    }

    $friendCount = count($friendIds);

    if ($friendCount == 0) {
        mysqli_close($con);
        return [];
    }

    $posts = [];

    for ($i = 0; $i < $friendCount; $i++) {
        $friendId = $friendIds[$i];

        $sql = "SELECT * FROM posts WHERE user_id = $friendId";
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts[] = $row;
            }
        }
    }

    mysqli_close($con);

    return $posts;
}



function getPersonalPost()
{
    $con = getConnection();
    $userId = $_SESSION['userid'];
    $sql = "SELECT * FROM posts where user_id=$userId";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $posts = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    } else {
        return false;
    }
    mysqli_close($con);
    return $posts;
}






function userdata($id)
{
    $con = getConnection();
    $sql = "SELECT * FROM userdata WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}


function updateProfile($img, $id)
{
    $con = getConnection();
    $sql = "UPDATE userdata SET profilepic = '$img' WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $affectedRows = mysqli_affected_rows($con);
        mysqli_close($con);
        return $affectedRows > 0;
    } else {
        mysqli_close($con);
        return false;
    }
}

function updatename($name, $id)
{

    $con = getConnection();

    $sql = "UPDATE userdata SET name = '$name' WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {

        if (mysqli_affected_rows($con) > 0) {
            mysqli_close($con);
            return true;
        } else {
            mysqli_close($con);
            return "No changes made or record not found.";
        }
    } else {

        $error = mysqli_error($con);
        mysqli_close($con);
        return "Error: " . $error;
    }
}


function updatepassword($old_password, $new_password)
{
    session_start();
    $id = $_SESSION['userid'];
    $con = getConnection();
    $id = mysqli_real_escape_string($con, $id);


    $sql = "SELECT password FROM userdata WHERE id = '$id' AND password = '$old_password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        $sql_update = "UPDATE userdata SET password = '$new_password' WHERE id = '$id'";
        $result_update = mysqli_query($con, $sql_update);

        if (mysqli_affected_rows($con) > 0) {
            mysqli_close($con);
            return true;
        } else {
            mysqli_close($con);
            return false;
        }
    } else {
        mysqli_close($con);
        return false;
    }
}



function deleteAccount()
{
    session_start();
    $id = $_SESSION['userid'];
    $con = getConnection();
    $id = mysqli_real_escape_string($con, $id);

    $sql = "DELETE FROM userdata WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_affected_rows($con) > 0) {
        mysqli_close($con);
        session_destroy();
        return true;
    } else {
        mysqli_close($con);
        return false;
    }
}




function updateUserData($id, $livein, $university, $college, $hometown)
{
    $id = $_SESSION['userid'];
    $con = getConnection();

    $sql = "UPDATE userdata 
    SET livein = '$livein', university = '$university', college = '$college', hometown = '$hometown' 
    WHERE id = $id";

    $result = mysqli_query($con, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function postComment($postid, $comment)
{
    session_start();
    $id = $_SESSION['userid'];
    $con = getConnection();


    $sql = "INSERT INTO postComments (user_id, comment, post_id) VALUES ($id, '$comment', $postid)";

    $result = mysqli_query($con, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}


//get comments of the posts
function comment($post_id)
{
    $con = getConnection();
    $Post_id = $post_id;
    $sql = "SELECT comment, comment_id FROM postComments WHERE post_id = $Post_id";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $comments = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $comments[] = $row;
        }
        return $comments;
    } else {
        return false;
    }
}

function postLike($postId)
{
    session_start();
    $con = getConnection();

    $userId = $_SESSION['userid'];


    $checkSql = "SELECT * FROM postlikes WHERE post_id = '$postId' AND user_id = '$userId'";
    $checkResult = mysqli_query($con, $checkSql);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {

        return true;
    }

    $insertSql = "INSERT INTO postlikes(user_id, post_id) VALUES ('$userId', '$postId')";
    $insertResult = mysqli_query($con, $insertSql);

    if ($insertResult) {
        return true;
    } else {

        echo "Error: " . mysqli_error($con);
        return false;
    }

    mysqli_close($con);
}



function countLikes($postId)
{
    $con = getConnection();


    $sql = "SELECT * FROM postlikes WHERE post_id = '$postId'";

    $result = mysqli_query($con, $sql);

    if ($result) {

        $likeCount = mysqli_num_rows($result);
        return $likeCount;
    } else {

        echo "Error: " . mysqli_error($con);
        return 0;
    }

    mysqli_close($con);
}




function postdelete($postid)
{

    $con = getConnection();

    $sql = " DELETE FROM postComments WHERE post_id=$postid";
    $a = mysqli_query($con, $sql);

    $sql = " DELETE FROM postLikes WHERE post_id=$postid";
    $b = mysqli_query($con, $sql);



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


function getpost($id)
{
    $con = getConnection();
    $sql = "SELECT * from posts WHERE post_id=$id";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_row($result);

    return $row;
}


function deleteComment($commentId)
{
    // Check if the session user ID is being used properly
    $con = getConnection();
    $sql = "DELETE FROM postComments WHERE comment_id = $commentId";

    // Ensure there are no SQL errors
    $result = mysqli_query($con, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }

    mysqli_close($con);
}




function report($postid, $data)
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    

    $user_id = $_SESSION['userid'];

    $sql = "SELECT * FROM posts WHERE post_id =$postid ";
    $result = mysqli_query($con, $sql);
    $row = [];

    if ($row = mysqli_fetch_assoc($result)) {

        $post_content = $row['postContent'];
        $post_type = $row['postType'];



        $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
        $sql = "INSERT INTO report_post (post_id, user_id, post_content, post_type, details) 
        VALUES ($postid, $user_id, '{$post_content}', '{$post_type}', '{$data}')";
        $result = mysqli_query($con, $sql);

        


        if ($result) {
            mysqli_close($con);
            return true;
        } else {
            mysqli_close($con);
            return false;
        }
    } else {
        mysqli_close($con);
        return false;
    }
}


function getNewsPosts()
{
    $con = getConnection();
    $id = $_SESSION['userid'];

    $sql = "SELECT id FROM userdata WHERE id_status ='political'";

    $result = mysqli_query($con, $sql);


    $newsid = [];
    while ($row = mysqli_fetch_assoc($result)) {



        $newsid[] = $row['id'];
    }

    $posts = [];

    foreach ($newsid as $newsId) {
        $sql = "SELECT * FROM posts WHERE user_id = 635561";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row;
        }
    }
    return $posts;
    mysqli_close($con);
}


function getAllUser()
{
    $con = getConnection();
    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($con, $sql);
    $rows = [];

    while ($row = mysqli_fetch_row($result)) {
        $rows[] = $row; // Append each row to the $rows array
    }

    return $rows;
}

function deletefriend($friendId)
{
    $con = getConnection(); // Assuming you have a function 'getConnection()' to establish the database connection

    // Use parameterized query to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM friendlist WHERE friendid = ?");
    $stmt->bind_param("i", $friendId); // 'i' specifies that $friendId is an integer

    if ($stmt->execute()) {
        $stmt->close();
        $con->close();
        return true;
    } else {
        $stmt->close();
        $con->close();
        return false;
    }
}

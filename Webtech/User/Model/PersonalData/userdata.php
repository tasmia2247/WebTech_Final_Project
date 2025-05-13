<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    return $con;
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


?>
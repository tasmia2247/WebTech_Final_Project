<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    return $con;
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



?>
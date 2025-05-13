<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    return $con;
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
?>
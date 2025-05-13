<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    return $con;
}

function updatepassword($old_password, $new_password)
{
    session_start();
    $id = $_SESSION['userid'];
    $con = getConnection();

    // $id = mysqli_real_escape_string($con, $id);


    $sql = "SELECT password FROM userdata WHERE id = '$id' AND password = '$old_password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        $sql_update = "UPDATE userdata SET password = '$new_password' WHERE id = '$id'";
        $result_update = mysqli_query($con, $sql_update);

        if ($result_update) {
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


?>
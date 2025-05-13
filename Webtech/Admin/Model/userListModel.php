<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $con;
}

function getAlluser(){
    $con = getConnection(); 
    $sql = "select * from userdata";
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
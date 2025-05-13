<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    return $con;
}

function updatename($name, $id)
{

    $con = getConnection();

    $sql = "UPDATE userdata SET name = '$name' WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {

        if ($result) {
            mysqli_close($con);
            return true;
        } else {
            mysqli_close($con);
            return "No changes made or record not found.";
        }
    } 
}


?>
<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
    return $con;
}

?>
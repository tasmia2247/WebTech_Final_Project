<?php 

session_start();
session_unset();
session_destroy();


setcookie('flag', '', time() - 3600, '/');
header('Location: ../view/login.html');
exit();
?>

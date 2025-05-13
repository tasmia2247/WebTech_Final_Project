<?php
require_once('../../../Model/sql.php'); 

$result = getPosts();

$data=json_encode($result);

echo $data;

?>

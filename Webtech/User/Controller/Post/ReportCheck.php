<?php
session_start();
require_once('../../Model/sql.php');

$id = $_SESSION['userid'];
$postid = $_REQUEST['post_id'];
$value = $_REQUEST['report'];
$value2 = $_REQUEST['textreport'];

if (!empty($value) && empty($value2)) {
  $check = report($postid, $value);
} else if (empty($value) && !empty($value2)) {
  $check = report($postid, $value2);
}


if ($check) {
  header("Location: ../../view/Welcome/welcome.php?id={$id}");
} else {
  return false;
}

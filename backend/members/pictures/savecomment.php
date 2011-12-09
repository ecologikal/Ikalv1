<?php
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
$picid = $_POST['picid'];
$message = $_POST['message'];
$userid = $_SESSION['user_id'];

members_add_picture_comment($userid, $picid, $message);
?>
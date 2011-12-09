<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$userid = $_POST['user_id'];
	
	members_delete_friend($userid);
	echo "Friend Deleted";
?>
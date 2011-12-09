<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$type = $_POST['type'];
	$userid = $_SESSION['user_id'];
	$comment = $_POST['comment'];

	if ($type == 'trip_comment'){
		$tripid = $_POST['tripid'];
		$stopid = $_POST['stopid'];
		members_add_trip_comment($userid, $tripid, $stopid, $comment);
	}
?>
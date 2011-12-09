<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$type = $_POST['type'];
	$itemid = $_POST['itemid'];
	$status = $_POST['status'];
	$userid = $_SESSION['user_id'];
	
	if ($type == 'trip'){
		members_update_trip_status($userid, $itemid, $status);
	}
?>
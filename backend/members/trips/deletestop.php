<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$tripid = $_POST['tripid'];
	$stopid = $_POST['stopid'];
	
	members_delete_trip_stop($tripid, $stopid);

?>
<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$tripid = $_POST['tripid'];
	
	members_delete_trip($tripid);

?>
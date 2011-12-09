<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$title 		   = $_POST['title'];
	$tripid			= $_POST['tripid'];
	$description   = $_POST['description'];
	$datefrom 	   = $_POST['datefrom'];
	$days 	   		= $_POST['days']; 
	$address 	   = $_POST['address'];
	$latitude 	   = $_POST['latitude'];
	$longitude 	   = $_POST['longitude'];
	$userid 	   = $_SESSION['user_id'];
	members_add_trip_stop($userid, $tripid, $title, $description, $datefrom, $days, $address, $latitude, $longitude);
?>
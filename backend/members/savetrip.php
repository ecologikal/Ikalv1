<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$title 		   = $_POST['title'];
	$description   = $_POST['description'];
	$datefrom 	   = $_POST['datefrom'];
	$days 	   		= $_POST['days']; 
	$skills 	   = $_POST['skills']; 
	$friends 	   = $_POST['friends'];
	$address 	   = $_POST['address'];
	$latitude 	   = $_POST['latitude'];
	$longitude 	   = $_POST['longitude'];
	$userid 	   = $_SESSION['user_id'];
	
	$friends = explode(',',$friends );
	//Deletes the first element of the array
	array_shift($friends);
	// Deletes the last element of the array
	array_pop($friends);
	
	$skills = explode(',',$skills );
	//Deletes the first element of the array
	array_shift($skills);
	// Deletes the last element of the array
	array_pop($skills);
	
	members_add_trip($userid, $title, $description, $datefrom, $days, $skills, $friends, $address, $latitude, $longitude);
	
	//Add the first stop
	$tripid = members_get_trip_id($userid, $title, $description);
	
	members_add_trip_stop($userid, $tripid, $title, $description, $datefrom, $days, $address, $latitude, $longitude);

?>
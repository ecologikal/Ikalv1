<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$type = $_GET['type'];
	
	if ($type == 'people'){
		$friends = $_POST['friends'];
		$friends = explode(',',$friends );
		//Deletes the first element of the array (,)
		array_shift($friends);
		// Deletes the last element of the array (,)
		array_pop($friends);
		
		$picid = $_POST['picid'];
		
		members_add_picture_tags($friends, $picid);
	}

?>
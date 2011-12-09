<?php
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$friends = $_POST['friends'];
	$type = $_POST['type'];
	$itemid = $_POST['itemid'];
	
	$friends = explode(',',$friends );
	//Deletes the first element of the array
	array_shift($friends);
	// Deletes the last element of the array
	array_pop($friends);
	
	members_invite_friends('trip', $itemid, $friends);

?>
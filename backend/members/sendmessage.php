<?php
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$friends = $_POST['friends'];
	$message = $_POST['message'];
	$userfrom = $_SESSION['user_id'];
	
	$friends = explode(',',$friends );
	//Deletes the first element of the array
	array_shift($friends);
	// Deletes the last element of the array
	array_pop($friends);
	
	foreach ($friends as $i=> $value){
		$to = $friends[$i];
		//members_add_language($userid,$langid);
		members_send_message($userfrom, $to, $message);
		members_send_notification($userfrom, $to, 'has sent you a message', 'message');
	}

?>
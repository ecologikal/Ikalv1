<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
   	$userfrom = $_POST['user_from'];
   	$userto = $_POST['user_to'];
	
	members_add_friend($userfrom, $userto);
	members_update_notification_status($userfrom, $userto, 'friendship', 'read');
?>
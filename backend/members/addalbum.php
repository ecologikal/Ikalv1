<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$userfrom 		   = $_SESSION['user_id'];
	$albumname			= $_POST['albumname'];
	$albumdesc   = $_POST['albumdesc'];
	
	members_add_album($userfrom, $albumname, $albumdesc);
	echo $albumid = members_get_album_id($userfrom, $albumname);
?>
<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	echo $imgdesc = $_POST['description'];
	echo $imgname = $_POST['name'];
	echo $userid = $_SESSION['user_id'];
	echo $albumname = $_POST['albumname'];
         
	echo $albumid = members_get_album_id($userid, $albumname);
	members_add_picture_description($userid, $imgname, $imgdesc, $albumid);
?>
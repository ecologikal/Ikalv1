<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$skid = $_POST['skillid'];
	$skdesc = $_POST['desc'];
	$sklevel = $_POST['level'];
	$userid = $_SESSION['user_id'];
	
	members_add_skill($userid, $skid, $sklevel, $skdesc);
	echo $petal = members_get_skill_petal($skid);
?>
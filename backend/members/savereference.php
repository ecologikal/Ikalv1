<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	 $userto = $_POST['userto'];
	 $userfrom = $_SESSION['user_id'];
	 $skid = $_POST['skillid'];
	 $refdesc = $_POST['desc'];
	echo $reflevel = $_POST['grade'];
	
	members_add_reference($userto, $userfrom, $skid, $refdesc, $reflevel);
?>
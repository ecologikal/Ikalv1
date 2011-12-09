<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	if(!isset($_SESSION['locationupdated'])){
		echo "updating location";
		members_update_geolocation($lat,$lng);
		$_SESSION['locationupdated'] = true;
	}else{
		if($_SESSION['locationupdated'] == true){
			echo "location already updated";
		}
	}
?>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$sql = "SELECT text FROM countries";
	$countries ="";
 	$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	
	while($row = mysql_fetch_row($rst)) {
		$countries = $countries.$row[0].";";
	}
	echo $countries;
?>
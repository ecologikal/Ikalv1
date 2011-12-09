<?php
$sql="SELECT latitude,longitude,title,description,type_id FROM maps WHERE id_centro = 3";  //Replace id_centro field with the correct variable once centers can be added
$result=mysql_query($sql, $ecologikal);
$rows = 0; //rows counter
$markers = array();
while ($row=mysql_fetch_array($result)){
	//QUERY TO GET THE TYPE NAME
	$sql = "SELECT type_en, icon FROM map_types WHERE id= $row[4]";
	$result2=mysql_query($sql, $ecologikal);
	$type = mysql_fetch_array($result2);
	$typename = $type[0];
	$typeicon = $type[1];
//	echo "<script>alert('".$type[1]."')</script>";
	$markers[$rows] = array(
			'latitude'=>$row[0],
			'longitude'=>$row[1],
			'title'=>$row[2],
			'description'=>$row[3],
			'type_id'=>$row[4],
			'typename'=>$typename,
			'icon'=>$typeicon
	);
	$rows++;
}
?>
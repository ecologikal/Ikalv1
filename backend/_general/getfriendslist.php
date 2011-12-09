<?php
header("Content-type: application/json");
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
$input = $_GET["q"];
$userid = $_SESSION['user_id'];
$data = array();
mysql_select_db($database_ecologikal, $ecologikal);
// query your DataBase here looking for a match to $input
$sql = "SELECT user_id, usuario, nombre, apellido FROM (SELECT user_id, usuario, nombre, apellido FROM member_bonds JOIN miembros ON member_bonds.user_to = miembros.user_id WHERE user_from = $userid) AS result WHERE nombre like '%$input%' OR apellido LIKE '%$input%'";
$rst = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_assoc($rst)) {
	$json = array();
	$json['id'] = $row['user_id'];
	$json['pic']= members_get_profile_thumb($json['id']);
	$json['nombre'] = $row['nombre']." ".$row['apellido']; 
	$data[] = $json;
}
echo json_encode($data);
?>
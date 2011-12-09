<?php
header("Content-type: application/json");
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
$input = $_GET["q"];
$data = array();
// query your DataBase here looking for a match to $input
$sql = "SELECT * FROM list_languages WHERE language LIKE '%$input%'";
mysql_select_db($database_ecologikal, $ecologikal);
$rst = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_assoc($rst)) {
$json = array();
$json['value'] = $row['language'];
$json['level'] = $row['level'];
$json['id'] = $row['id'];
$data[] = $json;
}

echo json_encode($data);
?>
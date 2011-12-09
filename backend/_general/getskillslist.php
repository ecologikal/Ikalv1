<?php
header("Content-type: application/json");
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
$input = $_GET["q"];
$data = array();
// query your DataBase here looking for a match to $input
$sql = "SELECT * FROM skills WHERE skill LIKE '%$input%'";
mysql_select_db($database_ecologikal, $ecologikal);
$rst = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_assoc($rst)) {
$json = array();
$json['value'] = $row['skill'];
$json['cat'] = $row['skill_category_id'];
$json['catname'] = get_petal_name($json['cat']);
$json['id'] = $row['skill_id'];
$data[] = $json;
}

echo json_encode($data);
?>
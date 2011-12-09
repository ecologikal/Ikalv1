<?php include_once($_SERVER['DOCUMENT_ROOT']."/ecologikal/include/inc.php");?>
<?php include_once($GEN_PATH_SERVIDOR."/include/check_sesion.php");?>
<?php require_once($GEN_PATH_SERVIDOR.'/connections/ecologikal.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/funciones.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/members/funciones.php'); ?>
<?php

$user_id=isset($_POST['user_id']) ? $_POST['user_id'] : $GEN_USER_ID;
$command=isset($_POST['command']) ? $_POST['command'] : "";
$hash=isset($_POST['hash']) ? $_POST['hash'] : "";
$description=isset($_POST['description']) ? $_POST['description'] : "";

function delete_picture($hash){
	global $database_ecologikal, $ecologikal, $GEN_USER_ID, $GEN_PATH_MEMBERS_PICTURES;
	$sql=sprintf("Delete from members_pictures  where hash=%s and  user_id=$GEN_USER_ID ",
		GetSQLValueString($hash,'text'));
	$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	$image_path=$GEN_PATH_MEMBERS_PICTURES.members_get_info("hash",$GEN_USER_ID)."/".$hash.".jpg";
	$image_path_th=$GEN_PATH_MEMBERS_PICTURES.members_get_info("hash",$GEN_USER_ID)."/thumbnails/".$hash.".jpg";
	if(file_exists($image_path))unlink($image_path);
	if(file_exists($image_path_th))unlink($image_path_th);
	if(mysql_affected_rows($ecologikal))return "REMOVED";	
}

if($command=="delete_picture" && !$hash==""){
	echo delete_picture($hash);
}
if($command=="insert_picture" && !$hash==""){
	echo member_insert_picture($hash,$description);
}

if($command=="description_picture" && $description &&  !$hash==""){
	
	$sql=sprintf("Update members_pictures  Set description=%s where hash=%s and  user_id=$GEN_USER_ID ",
		GetSQLValueString($description,'text'),
		GetSQLValueString($hash,'text'));
	$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	if(mysql_affected_rows($ecologikal))echo "DESCRIPTION-OK";	
}
?>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/ecologikal/include/inc.php");?>
<?php include_once($GEN_PATH_SERVIDOR."/include/check_sesion.php");?>
<?php require_once($GEN_PATH_SERVIDOR.'/connections/ecologikal.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/funciones.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/centros/functions.php'); ?>
<?php

$sc_id=isset($_GET['sc_id']) ? $_GET['sc_id'] : $GEN_USER_ID;
$command=isset($_GET['command']) ? $_GET['command'] : "";

if(isset($_POST['user_id']))$user_id=$_POST['user_id'];
if(isset($_POST['command']))$command=$_POST['command'];
if(!$GEN_USER_ID){echo "not logged";exit;}

if( $command == "get_pictures" && $GEN_USER_ID ){
		$center_image_galery_path= $GEN_PATH_CENTERS_PICTURES.centers_get_info("hash",$sc_id)."/";
		$center_image_galery_url= $GEN_URL_CENTERS_PICTURES.centers_get_info("hash",$sc_id)."/";

		$sql="Select * From sc_pictures Where sc_picture_id=1";
		$rst = mysql_query($sql, $ecologikal);
		if(mysql_num_rows($rst)){
			while($row=mysql_fetch_assoc($rst)){
				$image_path=$center_image_galery_path.$row['hash'].".jpg";
				$image_url=$center_image_galery_url.$row['hash'].".jpg";
				echo ($image_url);
				$image_path_th=$center_image_galery_path.$row['hash'].".jpg";
				$image_url_th=$center_image_galery_url.$row['hash'].".jpg";
				if(file_exists($image_path) && file_exists($image_path_th)){
					echo "<div id=\"picture\"><img src=\"".$image_url_th."\"><span>".$row['description']."</span></div>";
				}
			}
		}
}
?>

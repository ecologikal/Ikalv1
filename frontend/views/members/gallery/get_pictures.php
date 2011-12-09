<?php include_once($_SERVER['DOCUMENT_ROOT']."/ecologikal/include/inc.php");?>
<?php include_once($GEN_PATH_SERVIDOR."/include/check_sesion.php");?>
<?php require_once($GEN_PATH_SERVIDOR.'/connections/ecologikal.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/funciones.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/members/funciones.php'); ?>
<?php

$user_id=isset($_GET['user_id']) ? $_GET['user_id'] : $GEN_USER_ID;
$command=isset($_GET['command']) ? $_GET['command'] : "";

if(isset($_POST['user_id']))$user_id=$_POST['user_id'];
if(isset($_POST['command']))$command=$_POST['command'];

if(!$GEN_USER_ID){echo "not logged";exit;}

if( $GEN_USER_ID ){
		$user_image_galery_path= $GEN_PATH_MEMBERS_PICTURES.members_get_info("hash",$user_id)."/";
		$user_image_galery_url= $GEN_URL_MEMBERS_PICTURES.members_get_info("hash",$user_id)."/";

		$sql="Select * From members_pictures Where user_id=$user_id";
		$rst = mysql_query($sql, $ecologikal);
		if(mysql_num_rows($rst)){
			while($row=mysql_fetch_assoc($rst)){
				$image_path=$user_image_galery_path.$row['hash'].".jpg";
				$image_url=$user_image_galery_url.$row['hash'].".jpg";

				$image_path_th=$user_image_galery_path."thumbnails/".$row['hash'].".jpg";
				$image_url_th=$user_image_galery_url."thumbnails/".$row['hash'].".jpg";
				if(file_exists($image_path) && file_exists($image_path_th)){
					echo "<div id=\"picture\"><img src=\"".$image_url_th."\"><span>".$row['description']."</span></div>";
				}
			}
		}
}
?>
<?php if($GEN_USER_ID && $GEN_USER_ID==$user_id){?>
<div id="loadpics" onclick="javascript:;load_html('#content','<?php echo $GEN_URL_SERVIDOR;?>/include/members/image_uploader/index.php')" href="javascript:;">Cargar Imagenes</div>
<?php } ?>
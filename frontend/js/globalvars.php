
<script>
	VIEWS_URL = '<?php echo _VIEWS_URL_ ?>';
	CSS_URL = '<?php echo _CSS_URL_ ?>';
	JS_URL = '<?php echo _JS_URL_ ?>';
	BACKEND_URL = '<?php echo _BACKEND_URL_ ?>';
	PLUGINS_URL = '<?php echo _PLUGINS_URL_ ?>';
	
	<?php if(is_logged_in()){
		$user_dir=members_get_info("hash",$_SESSION['user_id']);
		$picurl = _MEMBER_PICS_URL_.$user_dir."/profile/profile.jpg";
		$picthumb = _MEMBER_PICS_URL_.$user_dir."/profile/profile_th.jpg"; ?>
		USER_ID = '<?php echo $_SESSION["user_id"] ?>';
		USER_PIC = '<?php echo $picurl;?>';
		USER_PIC_THUMB = '<?php echo $picthumb;?>';
		USER_NAME = '<?php echo members_get_info("nombre",$_SESSION["user_id"])?>';
	<?php }?>
</script>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
$userto = $_GET['user_id'];
$usertoname = members_get_info('nombre', $userto) .  " " . members_get_info('apellido', $userto);
?>
<script>
	selectedData = {items:[{id: '<?php echo $userto ?>', nombre: '<?php echo $usertoname ?>'}]};
</script>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('messages');} ?>
<?php if (function_exists('load_js_scripts')){ load_css_files('messages');} ?>
<script src="<?php echo _JS_URL_ ?>members/messages.js"></script>
<div id="iframe" class="messageiframe">
	<input type="text" id="users">
	<textarea id="sendmessage"></textarea>
	<button class="green sendmessage">Send Message</button>
</div>
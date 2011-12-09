<?php
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
   $type = $_GET['type']; // Message, Trip, SC, Project, Event, etc.
   $itemid = $_GET['itemid']; //
   $userfrom = $_SESSION['user_id'];
?>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('addfriends');} ?>
<?php if (function_exists('load_js_scripts')){ load_css_files('addfriends');} ?>
<script src="<?php echo _JS_URL_ ?>members/invitefriends.js"></script>
<div id="iframe" class="messageiframe">
	<input type="text" id="users">
	<input type="hidden" name="itemid" value="<?php echo $itemid ?>" id="itemid">
	<button class="green invitefriends">Invite Friends</button>
</div>
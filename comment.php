<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>
<?php if (function_exists('load_js_scripts')){ $view = 0; load_js_scripts($view);} ?>
<link rel="stylesheet" type="text/css" href="<?php echo _CSS_URL_;?>comment.css" />

<?php $userid = $_GET['userid']; $commentid = $_GET['commentid'];?>
<script>
$(document).ready(function(e){
		
		$('textarea.comment').focus();

});
</script>
<textarea class="comment"></textarea>
<button>Post Comment</button>

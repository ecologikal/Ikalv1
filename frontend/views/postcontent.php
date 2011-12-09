<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>
<?php if (function_exists('load_js_scripts')){ $view = 0; load_js_scripts($view);} ?>
<link rel="stylesheet" type="text/css" href="<?php echo _CSS_URL_;?>post.css" />

<?php $username = $_GET['username'];?>
<script>
$(document).ready(function(e){
		
		$('textarea.comment').focus();

});
</script>
<comment>
	<textarea class="comment"></textarea>
	<select>
		<option>Status Update</option>
		<option>Article</option>
	</select>
	<?php for($x=1;$x<=count($petal_name);$x++){?>
	<input type="checkbox" class="petal" value=""><div class="text"><?php echo $petal_name[$x]?></div></input>
	<?php }?>
	<button>Post Comment</button>
</comment>

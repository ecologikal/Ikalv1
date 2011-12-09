<?php
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('pictureuploader');} ?>
<?php if (function_exists('load_js_scripts')){ load_css_files('pictureuploader');} ?>
<script>
	$(document).ready(function(e){
		$('button.addalbum').click(function(e){
			$(this).after('<div class="albuminfo"><input type="text" id="albumname"><textarea id="albumdesc"></textarea><button class="green savealbum">Save Album</button></div>');
			$('#albumname').watermark('Type album name').focus();
			$('#albumdesc').watermark('Type album description');
			$('button.savealbum').click(function(e){
				e.preventDefault();
				albumname = $('#albumname').val();
				albumdesc = $('#albumdesc').val();
				queryurl = BACKEND_URL + 'members/addalbum.php';
				$.post(queryurl, { albumname : albumname, albumdesc : albumdesc, userfrom : <?php echo  $_SESSION['user_id'] ?>}, function(data){
					location.reload();
				});
			});
			$(this).remove();
		});
		$('button.selectalbum').click(function(e){
			album = $('select#album option:selected').text();
			location.href = 'pictureuploader.php?type=member&albumname='+album;
		});
	});
	</script>
	<label>Select Album</label>
	<?php $albums = members_get_albums($_SESSION['user_id']);?>
	<select id="album">
		<?php
		if($albums){
			foreach ($albums as $key => $value) {
				$albumname = $albums[$key]['name']?>
				<option><?php echo $albumname ?></option>
		<?php 	} // End foreach
		}else{// End if ?>
			<option>No Albums Yet </option>
		<?php } ?>
	</select>
	<button class="green selectalbum">Select Album</button>
	<button class="green addalbum">Add Album</button>
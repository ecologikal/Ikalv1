<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	$scname = $_GET['scname'];
	include_once(_BACKEND_PATH_."sustcenters/vibedata.php")	?>
	<?php if (function_exists('load_js_scripts')){ load_js_scripts('maingame');} ?>
	<?php if (function_exists('load_js_scripts')){ load_css_files('maingame');} ?>
	<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
	
	
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>sustcenter.css" type="text/css" />
<div id="iframe">
	<div id="reviews">
		<table>

			<tr class="loc">
				<td class="attr"><div class="tiptip icon places" title="Location"></div></td>
				<td class="barcontainer">
					<div class="tiptip value" title="<?php echo $rand = rand(30,100);?>% Location"><?php echo $rand; ?>%</div>
				</td>				
			</tr>
			<tr class="facilities">
				<td class="attr"><div class="tiptip icon facilities" title="Facilities"></div></td>
				<td class="barcontainer">
					<div class="tiptip value" title="<?php echo $rand = rand(30,100);?>% Facilities"><?php echo $rand; ?>%</div>
				</td>				
			</tr>
			<tr class="fun">
				<td class="attr"><div class="tiptip icon fun" title="Fun"></div></td>
				<td class="barcontainer">
					<div class="tiptip value" title="<?php echo $rand = rand(30,100);?>% Fun"><?php echo $rand; ?>%</div>
				</td>				
			</tr>
			<tr class="cleanliness">
				<td class="attr"><div class="tiptip icon cleanliness" title="Cleanliness"></div></td>
				<td class="barcontainer">
					<div class="tiptip value" title="<?php echo $rand = rand(30,100);?>% Cleanliness"><?php echo $rand; ?>%</div>
				</td>				
			</tr>
			<tr class="friendliness">
				<td class="attr"><div class="tiptip icon friendliness" title="Friendliness"></div></td>
				<td class="barcontainer">
					<div class="tiptip value" title="<?php echo $rand = rand(30,100);?>% Friendliness"><?php echo $rand; ?>%</div>
				</td>				
			</tr>
			<tr class="overall">
				<td class="tiptip attr" title="Average Score">AV</td>
				<td class="barcontainer">
					<div class="tiptip value" title="<?php echo $rand = rand(30,100);?>% Average"><?php echo $rand; ?>%</div>
				</td>				
			</tr>
		</table>
	</div>
	<div id="commentsection" class="reviews">
		
		<?php for($x=0; $x < rand(0,50); $x++){?>
		<div class="comment">
			<div class="grade" class="value">
				<div ><?php echo rand(20,100); ?>%</div>
			</div>
			
			<a href="#"><memberavatar><img src="<?php $randcomments = rand(0,$size); echo $profiles[$randcomments]['ProfilePic']; ?>"></memberavatar> <?php echo $profiles[$randcomments]['Name'] ?></a> said:
			<p><?php echo $comments[rand(0,$sizecomm)]['Text']?></p>
			
		</div>
		<?php }?>
	</div><!--Comment Section-->
</div><!--Iframe-->
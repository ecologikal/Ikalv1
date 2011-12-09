<script src="<?=_JS_URL_?>members/sidebar_left.js" type="text/javascript" charset="utf-8"></script>
<leftbar>
	
	<div id="mainmenu">
		<div id="profile_btn" class="icon pointer tiptip" title="My Profile" onClick="location.href='<?php echo _VIEWS_URL_ . "members/member_profile.php"?>'"></div>
		<div id="members" class="icon pointer tiptip" title="Members" onClick="location.href='<?php echo _ROOT_URL_."membersdir.php" ?>'"></div>
	<!--<div id="flower_btn" class="icon pointer tiptip" title="My Skills" onClick="load_html('content', '<?php echo $array_goto["flower"][1].$array_goto["flower"][2];?>')"></div> 
		<div id="stream_btn" class="icon pointer tiptip" title="My Stream" onClick="load_html('content', '<?php echo $array_goto["stream"][1].$array_goto["stream"][2];?>')"></div>
		<div id="gallery_btn" class="icon pointer tiptip" title="My Pictures" onClick="load_html('content', '<?php echo $array_goto["gallery"][1].$array_goto["gallery"][2];?>?no_page='+current_gallery_page+'&user_id=<?php echo $user_id;?>')"></div>-->
		<div id="game_btn" class="icon pointer tiptip" title="The Game" onClick="location.href='<?php echo _ROOT_URL_."maingame.php" ?>'"></div>
		<div id="travels_btn" class="icon pointer tiptip" title="My Trips" onClick="location.href='<?php echo _VIEWS_URL_."members/traveldiary.php" ?>'"></div>
		<div id="projects_btn" class="icon pointer tiptip" title="My Projecs"></div>
		<div id="events_btn" class="icon pointer tiptip" title="My Events"></div>
	</div>
	
</leftbar>
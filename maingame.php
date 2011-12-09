<?php 	$view = 'maingame';
		include("header.php");
?>			
<?php include(_BACKEND_PATH_."game/getgamedata.php"); ?>
<leftbar>
			<div id="mainmenu">

				<div id="profile_btn" class="icon pointer tiptip" title="My Profile"onClick="location.href='<?php echo _VIEWS_URL_ ?>members/member_profile.php'"></div>
				<div id="flower_btn" class="icon pointer tiptip" title="My Skills" onClick="location.href='<?php echo _VIEWS_URL_ ?>members/member_profile.php?goto=flower'"></div>
				<div id="stream_btn" class="icon pointer tiptip" title="My Stream" onClick="location.href='<?php echo _VIEWS_URL_ ?>members/member_profile.php?goto=stream'"></div>
				<div id="gallery_btn" class="icon pointer tiptip" title="My Pictures" onClick="location.href='<?php echo _VIEWS_URL_ ?>members/member_profile.php?goto=gallery'"></div>
				<div id="game_btn" class="icon pointer tiptip" title="The Game"></div>
				<div id="travels_btn" class="icon pointer tiptip" title="My Trips"></div>
				<div id="projects_btn" class="icon pointer tiptip" title="My Projecs"></div>
				<div id="events_btn" class="icon pointer tiptip" title="My Events"></div>
			</div>
		</leftbar>
<game>
<content class="fullwidth">
	<?php include(_VIEWS_PATH_."_game/_filters.php"); ?>
	<div id="container">
		<!--Displays content depending the array of elements-->
		<?php
		for($y=0;$y<$noelements;$y++){
			$randpetal = rand(0,6);
			$randpetalclass = $petals[$randpetal]['Class'];
			$randtype = rand(0,8);   
			$randtypeclass = $typeofcontent[$randtype]['Class']; ?>
	
			<?php
			if($randtypeclass == 'member'){ ?>
				<?php include(_VIEWS_PATH_."_game/member.php"); ?>
			<?php } //END IF MEMBER 
			if($randtypeclass == 'sustcenter'){ ?>
				<?php include(_VIEWS_PATH_."_game/sustcenter.php"); ?>
			<?php } //END IF SUSTCENT 
			if($randtypeclass == 'comment'){ ?>
				<?php include(_VIEWS_PATH_."_game/comment.php"); ?>
			<?php } //END IF COMMENT 
			if($randtypeclass == 'article'){ ?>
				<?php include(_VIEWS_PATH_."_game/article.php"); ?>
			<?php } //END IF ARTICLE 
			if($randtypeclass == 'event'){ ?>
				<?php include(_VIEWS_PATH_."_game/event.php"); ?>
			<?php } //END IF EVENT 
			if($randtypeclass == 'project'){ ?>
				<?php include(_VIEWS_PATH_."_game/project.php"); ?>
			<?php } //END IF PROJECT 
			if($randtypeclass == 'workshop'){ ?>
				<?php include(_VIEWS_PATH_."_game/workshop.php"); ?>
			<?php } //END IF WORKSHOP 
			if($randtypeclass == 'volunteering'){ ?>
				<?php include(_VIEWS_PATH_."_game/volunteering.php"); ?>
			<?php } //END IF VOLUNTEERING ?>
		<?php } //END FOR CICLE FOR ELEMENT DISPLAY?>
	</div><!--container-->
<?php include("footer.php"); ?>
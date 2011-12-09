
<h3>My Gallery 
	<?php 
		if($myprofile != false){?>
		<button class="green addalbum iconspan"><span class="ui-icon ui-icon-plus"></span>Add Album</button>
	<?php } // End if is my profile?>
</h3>
<div class="albumscontainer">
	<?php 
	$albums = members_get_albums($userid);
	if($albums){
		foreach ($albums as $key => $value) {
			$albumid = $albums[$key]['id'];
			$albumname = $albums[$key]['name'];
			$albumdesc = $albums[$key]['description'];
			$albumtime = $albums[$key]['time'];
		 ?>
		<div class="album">
			<input type="hidden" name="albumid" value="<?php echo $albumid ?>" id="albumid">
				<div class="name">
					<h4><span class="delete icon deletealbum"></span>
					<?php echo $albumname?>
					<span class="nopics">
						<span class="ui-icon ui-icon-image"></span>
						<?php echo members_count_album_pictures($albumid); ?> pictures
					</span>
					<timeago><abbr class="timeago" title="<?php echo $albumtime ?>"></abbr></timeago>
					
				</h4>
			<?php if($myprofile){?>
				<button class="green addpicstoalbum tiptip" title="Add Pictures" ><span class="ui-icon ui-icon-plus"></span></button>
				<a class="iframe addpicstoalbum" href="<?php echo _VIEWS_URL_?>members/pictureuploader.php?type=member&albumname=<?php echo $albumname ?>"></a>
				<button class="green managepictures tiptip" title="Manage Pictures" ><span class="ui-icon ui-icon-image"></span></button>
				<a class="iframe managepictures" href="<?php echo _VIEWS_URL_?>members/picturedetails.php?type=member&albumname=<?php echo $albumname ?>"></a>

			<?php }?></div>
			
			<div class="description"><?php echo $albumdesc ?></div>
			<div class="albumpics">
				<?php $albumpics = members_get_album_pictures($userid, $albumname);
 	  		$albumthumbs = members_get_album_picture_thumbs($userid, $albumname);
			if($albumthumbs && $albumpics){
				$count = count($albumpics);
				if ($count > 10){
					$count = 10;
				}
				for($key = 0; $key < $count ; $key++) { 
					$picid = $albumthumbs[$key]['id'];?>
					<div class="picthumb">
						<a href="<?php echo _VIEWS_URL_ ?>members/pictures/singlepicture.php?type=member&user_id=<?php echo $userid ?>&picid=<?php echo $picid?>" class='iframe pic'><img src="<?php echo $albumthumbs[$key]['url']?>"></a>
					</div>
						<?php			
				}//end foreach
			}else{	
				echo "No pictures Yet";
			}?>
		</div>
	</div>

<?php }
}else{ ?>
No pictures Yet
<?php	}//end if?>
</div>
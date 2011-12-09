<div class="element <?php  echo $randtypeclass .' '. $randpetalclass; ?> ">
	<div class="icon <?php echo $typeofcontent[$randtype]['Icon']; ?>"></div>

	<div id="memberpic"><img src="<?php $rand = rand(0,$size); echo $profiles[$rand]['ProfilePic'] ?>"></div>
	<div id="titlecontainer">
		<div id="reactionpoints">
			<div class="dharma tiptip" title="Give me some Dharma"></div>
			<div class="karma tiptip" title="Bad Karma"></div>
		</div><div class="profilename"><?php echo $profiles[$rand]['Name'];?></div></div>
	<div id="content">
	

	</div><!-- Content -->
	<div id="box">
		<div class="boxcontent">
			<div class="rp"><span class="val tiptip" title="Dharma Balance"><?php echo rand(1000,2000); ?></span><span class="thumb"></span></div>
			<div class="date"><span class="timestamp hidden"><?php echo $date = rand(1262055681,1318605196); ?></span> <?php echo date("M d Y", $date);?></div>
			<span class="membername"><a href="#"><?php echo $profiles[$rand]['Name'] ?></a></span>
			<span class="type web"></span>
			<div id="commentbutton" onclick="triggerClick($(this));" class="<?php echo $petals[$randpetal]['Color']; ?>_bg"><a href="<?php echo _ROOT_URL_ ?>comment.php?userid=0&commentid=0"class="comment iframe">Comment</a></div>
			<span class="nocomments"><?php echo $x; ?> comments</span>
		</div>
	</div><!-- box-->
</div> <!-- element-->
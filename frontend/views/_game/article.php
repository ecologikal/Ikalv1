<div class="element <?php  echo $randtypeclass .' '. $randpetalclass; ?> ">
	<div class="icon <?php echo $typeofcontent[$randtype]['Icon']; ?>"></div>

	<div id="memberpic"><img src="<?php $rand = rand(0,$size); echo $profiles[$rand]['ProfilePic'] ?>"></div>
	<div id="titlecontainer">
		<div id="reactionpoints">
			<div class="dharma tiptip" title="Give me some Dharma"></div>
			<div class="karma tiptip" title="Bad Karma"></div>
		</div>
		"Net Zero Homes - A Journey Toward Energy Self-Sufficiency <a href="http://goo.gl/2SvM9" target="_blank">http://goo.gl/2SvM9</a>"</div>
	<div id="content">
		<div id="link">
			<span class="linkimage">
				<a class="video" href="http://www.youtube.com/watch?v=ElprHYTcZEw?fs=1&amp;autoplay=1" title="Net Zero Homes - A Journey Toward Energy Self-Sufficiency"><img src="http://i2.ytimg.com/vi/ElprHYTcZEw/default.jpg" ></a>
			</span>
			<p class="linkdescription">
				Green Building spoke with builders, architects, remodeling contractors and homeowners about their efforts towards energy self-sufficiency and building zero energy homes.
			</p>
		</div><!-- Link -->
		<div id="commentsection">
			<?php for($x=0; $x < rand(0,50); $x++){?>
			<div class="comment">
				<a href="#"><memberavatar><img src="<?php $randcomments = rand(0,$size); echo $profiles[$randcomments]['ProfilePic']; ?>"></memberavatar> <?php echo $profiles[$randcomments]['Name'] ?></a> said:
				<p><?php echo $comments[rand(0,$sizecomm)]['Text']?></p>
				<div id="reactionpoints">
					<div class="dharma tiptip" title="Give me some Dharma"></div>
					<div class="karma tiptip" title="Bad Karma"></div>
				</div>
			</div>
			<?php }?>
		</div><!--Comment Section-->

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
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	include_once(_BACKEND_PATH_."sustcenters/workshopdata.php");
	$scname = $_GET['scname'];	?>
	<?php if (function_exists('load_js_scripts')){ load_js_scripts('maingame');} ?>
	<?php if (function_exists('load_js_scripts')){ load_css_files('maingame');} ?>
	<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>sustcenter.css" type="text/css" />
<div id="iframe">
	<workshops>
		<?php for($x=0;$x<=$workshopsize;$x++){
			//GET PETAL NAME AND ICON
			for($z=0;$z<7;$z++){
				if($petals[$z]['Class'] == $workshops[$x]['Class']){
					$petalname = $petals[$z]['Name']; 
					$petalicon = $petals[$z]['Icon'];
					$petalcolor = $petals[$z]['Color'];
				}
			}
			?>
		<workshop>
			<div class="titlebar">
				<div class="name"><div class="triangle triangleright"></div><?php echo $workshops[$x]['Name'];?>			</div>
				<div class="dates">
					<span class="timestamp hidden"><?php echo $date = rand(1262055681,1318605196); ?></span>From: <?php echo date("M d Y", $date);?>
					<span class="timestamp hidden"><?php echo $date = rand(1262055681,1318605196); ?></span>To: <?php echo date("M d Y", $date);?>

				</div>
				<button class="book"><div class="icon bookingicon"></div><a href="<?php echo _VIEWS_URL_?>sustcenters/booking/workshopbooking.php?scname=<?php echo $scname ?>&name=<?php echo $workshops[$x]['Name']; ?>&priceMXP=<?php echo $workshops[$x]['PriceMXP'];?>&datefrom=<?php echo $workshops[$x]['DateBeg']?>&dateto=<?php echo $workshops[$x]['DateEnd']?>&guests=1" class="">Book Now</a></button>
				<div class="price"><div class="icon price"><?php echo $workshops[$x]['PriceMXP'];?></div></div>
				<div class="tiptip icon <?php echo $petalicon?>" title="<?php echo $petalname?>"></div>
				
			</div>
			
			<div class="basicinfo">
				<div class="picture">
					<a href="<?php echo _IMAGES_URL_."scpics/workshops/".$x.".jpg"; ?>" class="fancylink iframe"><img src="<?php echo _IMAGES_URL_."scpics/workshops/".$x.".jpg"; ?>"></a>
				</div>
				<div class="dharmasection">
					<div id="reactionpoints">
					<div class="dharma tiptip" title="Give this Workshop some Dharma"></div>
					<div class="karma tiptip" title="Give Bad Karma to this Workshop"></div>
					</div>
					<div class="tiptip rp <?php echo $petalcolor?>_bg" title="Dharma Balance"><span class="val">1342</span><span class="thumb"></span></div>
				</div>
				<div class="invited">
					<p>Confirmed:<a href="<?php echo _VIEWS_URL_ ?>sustcenters/_attendees.php?scname=<?php echo $scname; ?>&workshop=<?php echo $workshops[$x]['Name']; ?>" class="attendees iframe"> <?php echo rand(0,400)?></a></p>
					<p>Have not Answered:<a href="#"> <?php echo rand(0,1400)?></a></p>
					<p>Not Comming:<a href="#"> <?php echo rand(0,1400)?></a></p>
					<p>Comments:<a href="#"> <?php echo $nocomments = rand(1,20);?></a></p>
				</div>
				
				
			</div>
			
			
			
			<div class="place">			</div>
			<div class="description"><?php echo $workshops[$x]['Description'];?></div>
			<div class="price">			</div>
			
			<div id="commentsection">
				<?php for($y=0; $y < $nocomments; $y++){?>
				<div class="comment">
					<div class="rp"><span class="val tiptip" title="Dharma Balance">+<?php echo rand(1000,2000); ?></span><span class="thumb"></span></div>

					<a href="#"><memberavatar><img src="<?php $randcomments = rand(0,$size); echo $profiles[$randcomments]['ProfilePic']; ?>"></memberavatar> <?php echo $profiles[$randcomments]['Name'] ?></a> said:
					<p><?php echo $comments[rand(0,$sizecomm)]['Text']?></p>
					<div id="reactionpoints">

						<div class="dharma tiptip" title="Give me some Dharma"></div>
						<div class="karma tiptip" title="Bad Karma"></div>
					</div>
				</div>
				<?php }?>
				
			</div><!--Comment Section-->
			<div id="reactionsection">
				
				<button onclick="$('a.comment').trigger('click');" class="comment <?php echo $petalcolor?>_bg green">Comment</button><a href="http://localhost:8888comment.php?userid=<?php echo $_SESSION['user_id']; ?>&amp;commentid=<?php echo $workshops[$x]['Name']; ?>" class="comment iframe"></a>
				
			</div>
		</workshop>
		<?php }?>
	</workshops>	
</div>
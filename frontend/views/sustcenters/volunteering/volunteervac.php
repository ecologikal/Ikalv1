<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	
	$scname = $_GET['scname'];
	include_once(_BACKEND_PATH_."sustcenters/volunteervacdata.php");	?>
	<?php if (function_exists('load_js_scripts')){ load_js_scripts('maingame');} ?>
	<?php if (function_exists('load_js_scripts')){ load_css_files('maingame');} ?>
	
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>sustcenter.css" type="text/css" />
	<script src="<?php echo _PLUGINS_URL_?>maskedinput.js" type="text/javascript"></script>
	<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
	
<div id="iframe">
	<volunteervac>
		<?php for($x=0;$x<=$volunteervacize;$x++){
			//GET PETAL NAME AND ICON
			for($z=0;$z<7;$z++){
				if($petals[$z]['Class'] == $volunteervac[$x]['Class']){
					$petalname = $petals[$z]['Name']; 
					$petalicon = $petals[$z]['Icon'];
					$petalcolor = $petals[$z]['Color'];
				}
			}
			?>
		<workshop>
			<div class="titlebar">
				<div class="name"><div class="triangle triangleright"></div><?php echo $volunteervac[$x]['Name']; $novacancies = $volunteervac[$x]['NoVacancies']; ?>			</div>
				<div class="dates">
					<span class="timestamp hidden"><?php echo $datefrom = rand(1262055681,1318605196); ?></span>From: <?php echo $datefrom = date("M d Y", $datefrom);?>
					<span class="timestamp hidden"><?php echo $dateto = rand(1262055681,1318605196); ?></span>To: <?php echo $dateto = date("M d Y", $dateto);?>

				</div>
				<?php if ($novacancies >0){?>
					<button class="apply" onclick="location.href='volunteervacapply.php?scname=<?php echo $scname?>&vacid=<?php echo $volunteervac[$x]['Id'] ?>&vacancyname=<?php echo $volunteervac[$x]['Name']?>&datefrom=<?php echo $datefrom?>&dateto=<?php echo $dateto?>'"><div class="icon bookingicon"></div><a>APPLY NOW</a></button>
				<?php }?>
				<div class="tiptip icon <?php echo $petalicon?>" title="<?php echo $petalname?>"></div>
				
			</div>
			
			<div class="basicinfo">
				<div class="picture">
					<a href="<?php echo $volunteervac[$x]['Picture']; ?>" class="fancylink iframe"><img src="<?php echo $volunteervac[$x]['Picture']; ?>"></a>
				</div>
				<div class="dharmasection">
					<div id="reactionpoints">
					<div class="dharma tiptip" title="Give this Vacancy some Dharma"></div>
					<div class="karma tiptip" title="Give Bad Karma to this Vacancy"></div>
					</div>
					<div class="tiptip rp <?php echo $petalcolor?>_bg" title="Dharma Balance"><span class="val">1342</span><span class="thumb"></span></div>
				</div>
				<div class="invited">
					<h3 class="novacancies"><?php 
						
						if($novacancies == 0){
							echo "Vacancy Closed";
						}else{
							if ($novacancies ==1){
								echo $novacancies . " Spot Left";
							}else{
								echo $novacancies . " Spots Left";
							}
						}?>
					</h3>
					<h3 class="tiptip" title="Volunteers that are going to help">New Volunteers:<a href="<?php echo _VIEWS_URL_ ?>sustcenters/_attendees.php?scname=<?php echo $scname; ?>&vacancyname=<?php echo $volunteervac[$x]['Name']; ?>" class="attendees iframe"> <?php echo $randvolunteers = rand(0,8);?></a></h3>
					<div class="memberavatars">
						<?php 
						
						if ($randvolunteers ==0){?>
							<a href='#' onclick='$("a.apply").trigger("click");'>Be the first</a>
						<?php }else{
						for($y=0;$y<$randvolunteers;$y++){?>
							<memberavatar><img src="<?php echo $profiles[$y]['ProfilePic'];?>"></memberavatar>
						<?php }
						}?>
					</div><br>
					<h3 class="tiptip" title="All the volunteers that have helped">All Volunteers:<a href="<?php echo _VIEWS_URL_ ?>sustcenters/_attendees.php?scname=<?php echo $scname; ?>&vacancyname=<?php echo $volunteervac[$x]['Name']; ?>" class="attendees iframe"> <?php echo $randvolunteers = rand(0,8);?></a></h3>
					<div class="memberavatars">
						<?php 
						
						if ($randvolunteers ==0){
							echo "This is a New Vacancy";
						}else{
						for($y=0;$y<$randvolunteers;$y++){?>
							<memberavatar><img src="<?php echo $profiles[$y]['ProfilePic'];?>"></memberavatar>
						<?php }
						}?>
					</div><br>
					<h3>Comments:<a href="#"> <?php echo $nocomments = rand(1,20);?></a></h3>
				</div>
				
				
			</div>
			<div class="description">
				<h3>Description</h3><?php echo $volunteervac[$x]['Description'];?><br/>
				<h3>Tasks and Responsabilities</h3><?php echo $volunteervac[$x]['Tasks'];?><br/>
				<h3>Skills needed</h3>
				<?php foreach($volunteervac[$x]['Skills'] as $i => $value){?>
					<div class="skill">
						<?php echo $volunteervac[$x]['Skills'][$i]?>
					</div>
				<?php }?>
				<h3>Recompenses</h3>
				<?php foreach($volunteervac[$x]['Payment'] as $i => $value){?>
					<div class="skill">
						<?php echo $volunteervac[$x]['Payment'][$i]?>
					</div>
				<?php }?>
			</div>
			
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
				
				<button onclick="$('a.comment').trigger('click');" class="green comment <?php echo $petalcolor?>_bg">Comment</button><a href="http://localhost:8888comment.php?userid=<?php echo $_SESSION['user_id']; ?>&amp;commentid=<?php echo $workshops[$x]['Name']; ?>" class="comment iframe"></a>
				
			</div>
		</workshop>
		<?php }?>
	</volunteervac>	
</div>
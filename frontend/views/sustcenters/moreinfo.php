<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	include_once(_BACKEND_PATH_."sustcenters/moreinfodata.php");
	$scname = $_GET['scname'];
	// GET SCS DETAILS	
	for($x=0;$x<$scsize;$x++){
		if($scs[$x]['Name']== $scname){
			$description = $scs[$x]['Description'];
			$country = $scs [$x]['Country'];
			$state = $scs[$x]['State'];
		}
	}
	
	?>
	<?php if (function_exists('load_js_scripts')){ load_js_scripts('maingame');} ?>
	<?php if (function_exists('load_js_scripts')){ load_css_files('maingame');} ?>
	<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
	
	
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>sustcenter.css" type="text/css" />

<div id="iframe">
	<div class="rightbar">
		<div id="people">
			<div class="admins">
				<h3><div class="icon admin"></div>Admins</h3>
				<div class="avatars">
				<?php for($x=0;$x < rand(1,4);$x++){?>
					<a href="#" target="_top"><memberavatar class="tiptip" title="<?php $randx = rand(0,$profilesize); echo $profiles[$randx]['Name'] ?>"><img src="<?php echo $profiles[$randx]['ProfilePic']?>"></memberavatar></a>
				<?php }?>
				</div>
			</div>
			<div class="inhabitants">
				<h3><div class="icon inhabitants"></div>Inhabitants</h3>
				<div class="avatars">
				<?php for($x=0;$x < rand(1,15);$x++){?>
					<a href="#" target="_top"><memberavatar class="tiptip" title="<?php $randx = rand(0,$profilesize); echo $profiles[$randx]['Name'] ?>"><img src="<?php echo $profiles[$randx]['ProfilePic']?>"></memberavatar></a>
				<?php }?>
				</div>
			</div>
			<div class="Ecotravelers">
				<h3><div class="icon ecotraveler"></div>Ecotravelers</h3>
				<div class="avatars">
				<?php for($x=0;$x < rand(1,15);$x++){?>
					<a href="#" target="_top"><memberavatar class="tiptip" title="<?php $randx = rand(0,$profilesize); echo $profiles[$randx]['Name'] ?>"><img src="<?php echo $profiles[$randx]['ProfilePic']?>"></memberavatar></a>
				<?php }?>
				</div>
			</div>
			<div class="Volunteers">
				<h3><div class="icon volunteer"></div>Volunteers</h3>
				<div class="avatars">
				<?php for($x=0;$x < rand(1,15);$x++){?>
					<a href="#" target="_top"><memberavatar class="tiptip" title="<?php $randx = rand(0,$profilesize); echo $profiles[$randx]['Name'] ?>"><img src="<?php echo $profiles[$randx]['ProfilePic']?>"></memberavatar></a>
				<?php }?>
				</div>
			</div>
			<div class="visitors">
				<h3><div class="icon visitor"></div>All time Visitors</h3>
				<div class="avatars">
				<?php for($x=0;$x < rand(1,15);$x++){?>
					<a href="#" target="_top"><memberavatar class="tiptip" title="<?php $randx = rand(0,$profilesize); echo $profiles[$randx]['Name'] ?>"><img src="<?php echo $profiles[$randx]['ProfilePic']?>"></memberavatar></a>
				<?php }?>
				</div>
			</div>
			<div class="followers">
				<h3><div class="icon follower"></div>Followers</h3>
				<div class="avatars">
				<?php for($x=0;$x < rand(1,15);$x++){?>
					<a href="#" target="_top"><memberavatar class="tiptip" title="<?php $randx = rand(0,$profilesize); echo $profiles[$randx]['Name'] ?>"><img src="<?php echo $profiles[$randx]['ProfilePic']?>"></memberavatar></a>
				<?php }?>
				</div>
			</div>
		</div>
	</div><!--Rightbar-->
	<div class="rightcontent">
		<div class="block">
			<div class="description">
				<p><?php echo $description; ?></p>
			</div>
			<div id="basicinfo">
				<div class="location" onclick="$('a.map').trigger('click');"><div class="tiptip icon places" title="Click to see the map"></div><span class="state"><?php echo $country?></span>, <span class="country"><?php echo $state;?></span></div>
					<a href="<?php echo _VIEWS_URL_?>sustcenters/map.php?scname=<?php echo $scname ?>&country=<?php echo $country?>&state=<?php echo $state ?>" class="map fancylink iframe"></a>
				<div class="bioregion"><div class="tiptip icon bioregion" title="Bioregion"></div><?php echo $bioregions[rand(0,$bioregionsize)]['Name']; ?></div>
				<div class="altitude"><div class="tiptip icon altitude" title="Altitude (Above Sea Level)"></div><?php echo rand(0,3000)?> m ASL</div>
				<div class="weather"><div class="tiptip icon weather" title="Weather"></div><?php echo rand(0,60)?>ºC</div>
			</div>
			
		</div>
		<div class="block">
			
			<div id="facilities">
				<h3><div class="icon facilities"></div>Facilities</h3>
				<ul>
					<?php for($x=0;$x<rand(0,$facilitiesize);$x++){?>
						<li><?php echo $facilities[rand(0,$facilitiesize)]?></li>
					<?php }?>
				<ul>
			</div>
			<div id="activities">
				<h3><div class="icon activities"></div>Activities</h3>
				<ul>
					<?php for($x=0;$x<rand(0,$activitiesize);$x++){?>
						<li><?php echo $activities[rand(0,$activitiesize)]?></li>
					<?php }?>
				<ul>
			</div>
			<div id="ageorientation">
				<h3><div class="icon age"></div>Age Orientation</h3>
				<div class="tiptip icon teenagers"			title="Teenagers(16+)"></div>
				<div class="tiptip icon youth"				title="Youth(18+)"></div>
				<div class="tiptip icon youngadults"		title="Young Adults(22+)"></div>
				<div class="tiptip icon adults"				title="Adults(26+)"></div>
				<div class="tiptip icon matureadults"		title="Mature Adults(40+)"></div>
				<div class="tiptip icon elders"				title="Elders(52+)"></div>
				<div class="tiptip icon couples"			title="Couples"></div>
				<div class="tiptip icon families"			title="Families"></div>
				<div class="tiptip icon familieswithpets"	title="Families with Dogs"></div>
			</div>
		</div><!--Block-->
		<div class="block">
			<div id="spirituality">
				<h3><div class="icon spirituality"></div>Spirituality</h3>
				<ul>
					<?php for($x=0;$x<rand(0,$spiritualitysize);$x++){?>
						<li><?php echo $spirituality[rand(0,$spiritualitysize)]?></li>
					<?php }?>
				<ul>
			</div>
			<div id="diet">
				<h3><div class="icon diet"></div>Diet</h3>
				<ul>
					<?php for($x=0;$x<rand(0,$dietsize);$x++){?>
						<li><?php echo $diet[rand(0,$dietsize)]?></li>
					<?php }?>
				<ul>
			</div>
		
			<div id="rules">
				<h3><div class="icon rules"></div>Special Rules</h3>
				<ul>
					<?php for($x=0; $x<$rulesize;$x++){?>
					<li><?php echo $rules[$x]?></li>
					<?php } ?>
				</ul>
			</div>
		</div><!--Block-->
	</div><!--Rightcontent-->
	
	
</div>
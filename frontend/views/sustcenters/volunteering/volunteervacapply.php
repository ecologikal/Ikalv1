<?php 	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
		$vacancyname = $_GET['vacancyname'];
		$scname = $_GET['scname'];
		$vacid = $_GET['vacid'];
		$datefrom = $_GET['datefrom'];
		$dateto = $_GET['dateto'];
		
		$view = 'volunteervacapply';
		include_once(_BACKEND_PATH_."sustcenters/bookingdata.php");
		
		if (function_exists('load_js_scripts')){ load_js_scripts($view);}
		if (function_exists('load_js_scripts')){ load_css_files('booking');} ?>
		
		<script src="<?php echo _PLUGINS_URL_?>maskedinput.js" type="text/javascript"></script>
		<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
		<link rel="stylesheet" href="<?php echo _CSS_URL_;?>sustcenter.css" type="text/css" />
<div id="iframe">
	<application>
		<h1>Volunteering Application</h1>
		<div class="leftcol">
			<div class="vacancy"><h2><span class="number">1</span>Vacancy Details</h2>
				<div class="vacancyname"><?php echo $vacancyname?> in <?php echo $scname?> </div>
				<div class="dates">from <?php echo $datefrom?> to <?php echo $dateto?></div>
			</div>
			<div class="basicdetails">
				<h2><span class="number">2</span>Your Details</h2>
				<?php if (is_logged_in()){?>
				<memberavatar><?php
				$user_dir=members_get_info("hash",$_SESSION['user_id']);
				if(file_exists(_MEMBER_PICS_PATH_.$user_dir."/profile_th.jpg")){?>
					<img src="<?php echo _MEMBER_PICS_URL_.$user_dir."/profile_th.jpg";?>">
				<?php }else{?>
					<img src="<?=_IMAGES_URL_?>avatar.png";?>
			
				<?php }?>
				</memberavatar>
				<div class="fields">
					
						<div class="name"><?php echo members_get_info("nombre",$_SESSION['user_id'])?> <?php echo members_get_info("apellido",$_SESSION['user_id'])?> </div>
						<div class="email"><a href="#" class="tiptip" title="Click to change email"><?php echo members_get_info("email",$_SESSION['user_id'])?></a></div>
						<input id="phone" type="text" title="Enter your phone"><br/>
						Do you have any health conditions? <select class="health"><option>Select</option><option>Yes</option><option>No</option></select>
				</div>
				<?php }else{?>
					<div class="registration">
						You need to be <a href="#">logged in </a>or create an account in order to apply to this vacancy
						<input type="text" title="Name">
						<input type="text" title="Last Name">
						<input type="text" title="username">
						<input type="password" title="password" >
						<button class="green">Join Now</button>
					</div>
					
				<?php } ?>
			</div>
		</div>
		<div class="rightcol">
			<div class="form">
				To increase your chances of getting selected, please provide real and useful information.
				<h2><span class="number">3</span>Previous Volunteering Experience</h2>
				<textarea title="Please write a detailed description of previous volunteering experiences"></textarea>
				<h2><span class="number" >4</span>Reasons for application</h2>
				<textarea title="Here you will share what drives you to apply for this vacancy"></textarea>
				<h2><span class="number">5</span>Expectations</h2>
				<textarea title="What do you expect from this experience?"></textarea>
				<div class="checkboxes">
					<input type="checkbox" name="terms_of_service" value="" id="terms_of_service"><label for="terms_of_service">I Agree to the <a href="#">Terms of service</a></label>
				</div>
				<button class="green">Send Application</button>
			</div>
		</div>
	</application>
</div>
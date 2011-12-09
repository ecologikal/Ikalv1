<?php
 	$view = 'member'; // This is for determining which scripts and css are going to be loaded
	include("../../../header.php");
	
	$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);
	// If a parameter is passed with the user_id then it displays the profile for the user_id passed, if not it means that should display loggedin user profile
	if (isset($_GET['user_id'])){
		$userid = $_GET['user_id'];
		if ($userid == $_SESSION['user_id']){
			$myprofile = true;
		}else{
			$myprofile = false; // flag to not display editable features
		}
	}else{
		$myprofile = true; // flag to allow editable features
		$userid = $_SESSION['user_id'];
	}
	// Check for edit mode ?edit=1 to edit
	if(isset($_GET['edit'])){
		$edit = $_GET['edit'];
	}else{
		$edit =0;
	}
?>
<script>
	USER_ID_VIEWING = '<?php echo $userid ?>';
	
</script>
<div id="flower"></div>
	<div id="wrapper">
		<?php include ("sidebar_left.php") ?>
		<content>
			<a href="<?php echo _PLUGINS_URL_ ?>jquery.upload.crop/upload_crop.php?command=upload" class="iframe profilepic"></a>
			<div id="profileheader" <?php if($myprofile){ ?>onclick="$(this).parent().find('a.profilepic').trigger('click');"<?php } ?> >
				<div id="buttons">
					<?php if(!$myprofile){?>
						<a href="<?php echo _VIEWS_URL_ ?>members/sendmessage.php?user_id=<?php echo $userid ?>" class="iframe sendmessage"></a>
						<button class="green sendmessage" onclick="$('a.sendmessage').trigger('click')">Send Message</button>
						
					<?php }?>
				<?php $requestsent = members_check_request($_SESSION['user_id'], $userid, 'friendship');
					if($requestsent && !members_is_friend($userid)){ ?>
						<span class="requested">Friendship Requested</span>
				<?php	} ?>
				<?php if(members_is_friend($userid)){ ?>
						<button class="green">Delete Friend</button>
				<?php }?>	
				<?php	if(!$myprofile && !$requestsent && !members_is_friend($userid)){?>
					<div id="makebond">
						<button class="green makebond iconspan"><span class="ui-icon ui-icon-plus"></span>Make Bond</button>
						<div id="bondtype">
							<ul>
								<li id="addfriend">as Friend</li>
								<li id="follow">as Follower</li>
							</ul>
						</div>
						
					</div>
			<?php		}	//endif
				?>
				</div>
				<div id="profileimage" <?php if($myprofile){?>class="tiptip" title="Click to Change your Profile Pic "<?php }?> >
					<?php members_display_profile_pic($userid);?>
				</div>
				<div id="reactionpoints">
					<span id="kinvalue" class="tiptip" title="Your alternative currency"><span class="icon kin"></span><?php echo members_get_kins($userid)?> kins</span>
				</div>
			</div>
			
			<div id="profilecontent" class="main">
				
				
				<fields <?php if ($edit == 1){ echo "class='editmode'"; } ?>>
					<h3><name><?php if($myprofile){
							if($edit!=1){?>
								<button class="green iconspan edit" onclick="location.href='?edit=1'"><span class="ui-icon ui-icon-unlocked"></span>Edit</button>

					<?php 	}
					} ?><span <?php if($myprofile && $edit==1){echo "class='firstname tiptip' title='Click to Edit First Name'";}?>><?php echo members_get_info("nombre",$userid)?></span> 
						  <span	<?php if($myprofile && $edit==1){echo "class='lastname tiptip' title='Click to Edit First Name'";}?>><?php echo members_get_info("apellido",$userid)?></span>
					</name></h3>
					<div <?php if($myprofile && $edit==1){echo "class='aboutme tiptip' title='Click to Edit First Name'";}?> id="about"><?php echo members_get_info('aboutme',$userid)?></div>
					
					<div id = "email"		 ><div class="icon"></div><span <?php if($myprofile && $edit==1){echo "class='editable email tiptip' title='Click to Edit Email'";}?>><?php echo members_get_info("email",$userid)?></span></div>
					<div id = "telephone"	 ><div class="icon"></div><span <?php if($myprofile && $edit==1){echo "class='editable phone tiptip' title='(Country Code) + Telephone'";}?>><?php echo members_get_info("phone",$userid)?></span></div>
					<div id = "sex"			 ><div class="icon"></div><span <?php if($myprofile && $edit==1){echo "class='editable genderselect tiptip' title='Click to Edit Gender'";}?>><?php echo members_get_info("gender",$userid)?>	</span></div>
					<div id = "dob"			 ><div class="icon"></div><span <?php if($myprofile && $edit==1){echo "class='editable dobselect tiptip' title='Click to Edit Date of Birth'";}?>><?php echo members_get_info("dob",$userid)?></span></div>
					<div id = "country"	 ><div class="icon flag"><?php display_country_flag(members_get_info("country",$userid));?></div><span <?php if($myprofile && $edit==1){echo "class='editable country tiptip' title='Click to Edit Country'";}?>><?php echo members_get_info("country",$userid)?></span></div>
					
					<?php  $languages = members_get_languages($userid); ?>
					<script>
						var selectedData = {items: [
							<?php for($i=0; $i< count($languages); $i++){  
								echo '{id: "'.$languages[$i]['Id'].'", value:"'.$languages[$i]['Language'].'"},';
							} // end for ?>
						]};
					</script>

						<?php if (count($languages)!= 0 && $edit!=1){?>						
							<div id = "languages">
								<div class="icon"></div>
								<?php 
									if($edit != 1){
										for($i=0; $i< count($languages); $i++){?>                                                                        
											<div id ="langadd"><?php echo $languages[$i]['Language']?> , <?php echo $languages[$i]['Level']?></div>
									
										<?php } // end for 
							  		} //end if edit != 1?>
							</div>
							<?php  }//end != 0 if ?>
							
							
							
							
					<?php  if($myprofile && $edit==1){ ?>
							<div id = "languages"	 >
								<div class="icon"></div>
								<input id="language" type="text" name="language"/>
								<button class="green add iconspan update"><span class="ui-icon ui-icon-locked"></span>Update Profile</button>
							</div>
						  <?php }//end if ?>
				</fields>
				<div id="mylocation">
					<h3>My Location</h3>
					<div id="locationmap"></div>
				</div>
				<div id="bonds">
					
					<?php $members = members_get_friends($userid); ?>
					<h3>Bonds <span class="friendcount">(<?php echo count($members);?>)</span><span class="viewall"><a href="#">View all</a></span></h3>
					
				<?php	if ($members == null && $myprofile){
						echo "You have no Friends <a href='"._ROOT_URL_."membersdir.php'>Start Making Bonds</a>";
					}else{?>
					<friends>
							<?php foreach ($members as $key => $value) { ?>
								<a href="<?php members_display_profile_url($members[$key]['user_id']) ?>" ><memberavatar class="tiptip" title="<?php echo $members[$key]['name'].' '.$members[$key]['lastname']; ?>"><?php members_display_profile_thumb($members[$key]['user_id']); ?></memberavatar></a>
							<?php }	// end For?>
					</friends>
					<?php } //End if?>	
				</div>
			</div><!--Profile Content-->
			<div id="profilecontent" class="gallery">
				<?php  include_once("gallery/albums_profile.php") ?>
			</div>
			<?php include_once("trips/mytrips.php"); ?>
			
			  <?php //if($goto)include($array_goto[$goto][0].$array_goto[$goto][2]);?>
        </content>
		<div class="rightbar">
 			<?php include("sidebar_right.php"); ?>
		</div>
 	</div><!--Wrapper-->

	<script>
		function success(position) {


		  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

		coords = String(latlng).replace(')','').replace('(','');
		coords = coords.split(',');
		lat = coords[0];
		lng = coords[1];



		<?php if($myprofile){ // Only update geolocation if its my profile?>
			$.post(BACKEND_URL+ 'members/updategeoloc.php',{lat: lat, lng: lng}, function(data){

			});
		<?php }?>

		}

		function error(msg) {
		 	alert('failed finding your geolocation');
		}

		if (navigator.geolocation) {
		  navigator.geolocation.getCurrentPosition(success, error);
		} else {
		  error('not supported');
		}
	</script>
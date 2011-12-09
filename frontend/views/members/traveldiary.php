<?php
 	$view = 'traveldiary'; // This is for determining which scripts and css are going to be loaded
	include("../../../header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php"); 
	$tripid = null;
	if (isset($_GET['user_id'])){
		$userid = $_GET['user_id'];
		$myprofile = false;
	}else{
		$userid = $_SESSION['user_id'];
		$myprofile = true;
	} // This determines the user id of the page being displayed
		
	if(isset($_GET['notifid']) || isset($_GET['tripid'])){
		$trip = null;
		// Checks if the get parameter is allowed to display the trip
		if (isset($_GET['notifid'])){ 
			$notifid = $_GET['notifid'];
			$tripid = members_get_trip_from_notification($notifid);
			members_update_notification_status_by_id($notifid, 'read');
		}else{
			if (isset($_GET['tripid'])){ 
				$tripid = $_GET['tripid'];
		//		if (!members_is_my_trip($tripid)){
		//			$tripid = null;
		//		}
			}
		}
		if ($tripid){
			$trip = members_get_trip($tripid);
		}
		if ($trip){
			$id = $trip['id'];
			$address = $trip['address'] ;
			$title = $trip['title'];
			$description = $trip['description'];
			$datefrom = $trip['datefrom'];
			$days = $trip['days'];
			$id = $trip['latitude'];
			$id = $trip['longitude'];
		}//ENDIF trip 
	}// End if ISSET?>
		
	
<content>
	<h1><?php echo members_get_info('nombre', $userid)?>'s Travel Diary </h1>
	<button class="green back iconspan" onclick="location.href='?user_id=<?php echo $userid?>'"><span class="ui-icon ui-icon-arrowthick-1-w"></span>Back to trips</button>
	<?php 
	// Displays only one trip Display This only if the variable _GET['tripid'] is set
		if($tripid){
		  $trip = members_get_trip($tripid);
			$tripid = $trip['id'];
			$address = $trip['address'];
			$title = $trip['title'];
			$datefrom = $trip['datefrom'];
			$days = $trip['days'];
			$description = $trip['description'];
			$latitude = $trip['latitude'];
			$longitude = $trip['longitude']; ?>
			<input type="hidden" name="tripid" value="<?php echo $tripid ?>" id="tripid">
			<h2><?php echo $title?>
			<?php if (members_is_invited_to_trip($_SESSION['user_id'], $tripid)){
					if (!members_is_confirmed_to_trip($_SESSION['user_id'], $tripid)){?>
						<button class="green acceptinvite">Join Trip</div>
						<button class="green leavetrip">Reject</div>
					<?php }else{ ?>
						<button class="green leavetrip">Leave Trip</button>
					<?php }?> 
			<?php }?>
			<?php if (members_is_my_trip($tripid)){?>
					<a href="<?php echo _VIEWS_URL_?>members/invitefriends.php?itemid=<?php echo $tripid ?>&type=trip" class="iframe invitefriends"></a>
					<button class="green invitefriends" onclick = "$('a.invitefriends').trigger('click')">Invite Members</button>
			<?php } ?></h2>
			<div class="datefrom"><?php echo $datefrom ?></div>
			<div class="address"><?php echo $address ?></div>
			<div class="description"><?php echo $description ?></div>
			<div id="friendsbar">
				<h4>Invited</h4>
				<?php $friends = members_get_trip_friends($tripid);
					if($friends){
						foreach ($friends as $key => $value) { 
							if ($friends[$key]['status']== null){
								$name = $friends[$key]['name'];
								$profileurl = $friends[$key]['profileurl'];
								$thumb = $friends[$key]['thumb'];
								?>
							<memberavatar class="tiptip" title="<?php echo $name?>" onclick="location.href='<?php echo $profileurl?>'"><?php echo $thumb?></memberavatar>
					<?php	}// end if status
					}// Enf foreach ?>
				<h4>Confirmed</h4>
				<?php	foreach ($friends as $key => $value) { 
							if ($friends[$key]['status'] == 'confirmed'){
								$name = $friends[$key]['name'];
								$profileurl = $friends[$key]['profileurl'];
								$thumb = $friends[$key]['thumb'];
								?>
								<memberavatar class="tiptip" title="<?php echo $name?>" onclick="location.href='<?php echo $profileurl?>'"><?php echo $thumb?></memberavatar>
				<?php		}// End if status
						}// Enf foreach
					} // End if?>
			</div>
			<div id="skills">
				<?php $skills = members_get_trip_skills($tripid);
					if($skills){
						foreach ($skills as $key => $value) { 
							$skillname 	= $skills[$key]['name'];
							$skillid 	= $skills[$key]['id'];
							$skillpetal = $skills[$key]['petal'];
							$petalname 	= $skills[$key]['petalname'];
							$petalclass = $skills[$key]['petalclass'];
							?>            
							<div class="tiptip skill <?php echo $petalclass ?>" title = "<?php echo $petalname ?>"><?php echo $skillname?></div>
				<?php	}// Enf foreach
					} // End if?>
			</div>
			<div id="map"></div>
			<script>
				lat = <?php echo $latitude; ?>;
				lng = <?php echo $longitude; ?>;
				latlng = new google.maps.LatLng(lat,lng);
				$('#map').gmap3({action: 'init',
					options:{
						center: latlng,
						zoom:7,
						mapTypeId: google.maps.MapTypeId.TERRAIN,
						mapTypeControlOptions: {
							style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
						},
						streetViewControl: true,
						scaleControl : true,
						panControl: true,
						draggable: true,
					},
					
				},
					{ action: 'addMarkers',
					markers:[
					<?php $tripstops = members_get_trip_stops($tripid);
					if($tripstops){
						foreach ($tripstops as $key => $value){
						$latitude = $tripstops[$key]['latitude'];
						$longitude = $tripstops[$key]['longitude'];
						$title = $tripstops[$key]['title'];
						$id = $tripstops[$key]['id'];
						$description = $tripstops[$key]['description']; ?>
						{lat:<?php echo $latitude ?>, lng:<?php echo $longitude ?>, data:'<strong><?php echo $title ?></strong><div class="description"><?php echo $description ?></div>'},
				<?php	} //end foreach
					} //Endif?>
					],marker:{
						options:{
							draggable: false,
							icon: 	'<?php echo _IMAGES_URL_?>trips/mytrip.png',
							animation: google.maps.Animation.DROP,
						},
						events:{
							mouseover: function(marker, event, data){
								var map = $(this).gmap3('get'),
								infowindow = $(this).gmap3({action:'get', name:'infowindow'});
								if (infowindow){
									infowindow.open(map, marker);
									infowindow.setContent(data);
								} else {
									$(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: data}});
								}
							},
						}
						}
						}
					);
				
				
			</script>
			<?php if(members_is_my_trip($tripid) || members_is_confirmed_to_trip($_SESSION['user_id'],$tripid)){?>
			
				<button class="green addstop">Add Stop</button>
			<?php } // End if is my trip or confirmed to trip?>
			<div id="stops">
				<?php $tripstops = members_get_trip_stops($tripid);
				if($tripstops){
					foreach ($tripstops as $key => $value){
						$latitude = $tripstops[$key]['latitude'];
						$longitude = $tripstops[$key]['longitude'];
					$title = $tripstops[$key]['title'];
					$description = $tripstops[$key]['description'];
					$id = $tripstops[$key]['id'];
					$address = $tripstops[$key]['address'];
					$datefrom = $tripstops[$key]['datefrom'];
					$days = $tripstops[$key]['days'];
					$userfrom = $tripstops[$key]['user_id'];
					
					$dateto = date('d M Y', strtotime($datefrom."+".$days." days"));
					$datefrom = date('d M Y', strtotime($datefrom));?>
					<div class="tripstop" id="stop_<?php echo $id ?>" geo-lat="<?php echo $latitude ?>" geo-long="<?php echo $longitude; ?>">
						<div class="title"><h3><span class="number"><?php echo $key+1?></span><?php echo $title ?><?php if(members_is_my_stop($id)){?><span class="icon delete deletestop"></span> <?php }?></h3></div>
						<div class="stopcontent">
							<memberavatar class="tiptip" title="<?php echo members_get_info('nombre',$userfrom). " ". members_get_info('apellido',$userfrom);?>"><?php members_display_profile_thumb($userfrom)?></memberavatar>
							
							<input type="hidden" name="stopid" value="<?php echo $id ?>" id="stopid">
							<div class="address"><?php echo $address?></div>
							<div class="dates"><?php echo $datefrom?> to <?php echo $dateto?></div>
							<div class="description"><?php echo $description ?></div>
						
							<div class="comments">
								<button class="green commentstop">Comment</button>
								<div class="commentlist">
								<?php $comments = members_get_trip_comments($tripid, $id);
									if($comments){
									foreach ($comments as $key => $value) {
										$userid = $comments[$key]['user_id'];
										$comment = $comments[$key]['comment'];
										$time = $comments[$key]['time']; ?>
							
								<div class="comment">
									<timeago><abbr class="timeago" title="<?php echo $time ?>"></abbr></timeago>
									<memberavatar><?php members_display_profile_thumb($userid)?></memberavatar>
									<div class="textcomment"><?php echo $comment?></div>
								</div>
							
								<?php }// end foreach
								}//end if?>
								</div>
							</div>
							<?php if(members_is_my_trip($tripid) || members_is_confirmed_to_trip($_SESSION['user_id'],$tripid)){?>
								<button class="green addpics" onclick="$(this).parent().find('a.addpics').trigger('click');">Add Pictures</button>
								<a class="iframe addpics" href="<?php echo _VIEWS_URL_?>members/pictureuploader.php?type=trip&tripid=<?php echo $tripid?>&stopid=<?php echo $id?>"></a>
							<?php } // End if is my trip or confirmed to trip?>
							<div class="pics">
								<?php
								//path to directory to scan
								$folder = _PICS_PATH_."trips/trip_".$tripid."/stop_".$id."/";
								$folderurl = _PICS_URL_."trips/trip_".$tripid."/stop_".$id."/";
								if(is_dir($folder)){
									$dh = opendir($folder);
									$images = array();
									while (($file = readdir($dh)) !== false) {
									        $images[] = $file;
									}
									array_shift($images);
									array_shift($images);
									array_pop($images);
									foreach ($images as $key => $value) {?>
										<a href="<?php echo $folderurl.$images[$key] ?>" class="iframe picstop" rel="stop<?php echo $id?>"><img src="<?php echo $folderurl."thumbs/".$images[$key];?>"></a>
								<?php }
									closedir($dh);
								}else{
									echo "no pics yet";
								}

								?>
							</div>
						</div><!--Stop Content-->
					</div>
				<?php }//end foreach
				}else{//END IF?>
					<h2>No stops Registered, Click add stop button</h2>
				<?php }//End else?>
			</div>
			
<?php	}else{ // Display the list of trips
			$trips = members_get_trips($userid);
			if ($trips != null){
			foreach ($trips as $key => $value) {
				$tripid = $trips[$key]['id'];
				$address = $trips[$key]['address'];
				$title = $trips[$key]['title'];
				$datefrom = $trips[$key]['datefrom'];
				$days = $trips[$key]['days'];
				$description = $trips[$key]['description'];
				$latitude = $trips[$key]['latitude'];
				$longitude = $trips[$key]['longitude'];
				
				$dateto = date('d M Y', strtotime($datefrom."+".$days." days"));
				$datefrom = date('d M Y', strtotime($datefrom));
				?>
				<div class="tripitem" onclick="location.href='?tripid=<?php echo $tripid?>&user_id=<?php echo $userid?>'">
					
					<span class="icon delete deletetrip"></span>
					<div class="dates"><?php echo $datefrom?> to <?php echo $dateto?></div>
					<div id="littlemap" class="trip_<?php echo $tripid ?>"></div>
					<div class="tripinfo">
						<div class="tripstops"><span class="number"><?php echo count(members_get_trip_stops($tripid)); ?></span> Stops</div>
						<input type="hidden" name="tripid" value="<?php echo $tripid ?>" id="tripid">
						<div class="title"><a href="?tripid=<?php echo $tripid?>&user_id=<?php echo $userid?>"><?php echo $title ?></a></div>
						<div id="friends">
							<?php $friends = members_get_trip_friends($tripid);
								if($friends){
									foreach ($friends as $key => $value) { 
										$name = $friends[$key]['name'];
										$profileurl = $friends[$key]['profileurl'];
										$thumb = $friends[$key]['thumb'];
										?>
										<memberavatar class="tiptip" title="<?php echo $name?>" onclick="location.href='<?php echo $profileurl?>'"><?php echo $thumb?></memberavatar>
							<?php	}// Enf foreach
								} // End if?>
						</div>
						<div class="address"><?php echo $address?></div>
						
						<div class="description"><?php echo $description ?></div>
						
					</div>
					
					
					<div id="skills">
						<?php $skills = members_get_trip_skills($tripid);
							if($skills){
								foreach ($skills as $key => $value) { 
									$skillname 	= $skills[$key]['name'];
									$skillid 	= $skills[$key]['id'];
									$skillpetal = $skills[$key]['petal'];
									$petalname 	= $skills[$key]['petalname'];
									$petalclass = $skills[$key]['petalclass'];
									?>            
									<div class="tiptip skill <?php echo $petalclass ?>" title = "<?php echo $petalname ?>"><?php echo $skillname?></div>
						<?php	}// Enf foreach
							} // End if?>
					</div>
					<script>
						lat = <?php echo $latitude; ?>;
						lng = <?php echo $longitude; ?>;
						latlng = new google.maps.LatLng(lat,lng);
						$('#littlemap.trip_<?php echo $tripid ?>').gmap3(
							{action: 'init',
								options:{
									center: latlng,
									zoom:4,
									mapTypeId: google.maps.MapTypeId.TERRAIN,
									mapTypeControl: false,
									mapTypeControlOptions: {
										style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
									},
									navigationControl: false,
									scrollwheel: false,
									streetViewControl: false,
									scaleControl : false,
									panControl: false,
									draggable: false,
								},
							},
							{action:'addMarker',
			                    latLng:latlng,
			                    map:{center:true},
								
								icon: 	'<?php echo _IMAGES_URL_?>trips/mytrip.png',
								marker:{
										options:{
											animation: google.maps.Animation.DROP,
											icon: 	'<?php echo _IMAGES_URL_?>trips/mytrip.png',
										}
									}
			                  }
						);
						
						
					</script>
				</div>
			
			
			<?php } // End foreach
			}else{
				echo "<div class='nonewnotifications'>There are no Trips Registered</div>";
				if ($myprofile){
					echo "<button class='green addtrip'>Add your first trip</a>";
				}
			}// End if
		}// END if tripid set?>
</content>
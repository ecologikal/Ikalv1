<script>
<?php 
//If the Session Variable of location has not been updated ask for new geolocation
if(!isset($_SESSION['locationupdated'])){ ?>
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
		location.reload();
	}
	function error(msg) {
	 	alert('error');
	}
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(success, error);
	} else {
	  error('not supported');
	}
<?php } //END IF SESSION locationupdated ?>	
</script>
<script>
	// My Trips
$(document).ready(function(e){
<?php $geoloc = members_get_geolocation($userid);
	if($geoloc['lat'] != 0 && $geoloc['lng'] != 0){ ?>
		geocoder1 = null;
		geocoder1 = new google.maps.Geocoder();
		lat = <?php echo $geoloc['lat']; ?>;
		lng = <?php echo $geoloc['lng']; ?>;
		var latlng1 = new google.maps.LatLng(lat, lng);
		
			geocoder1.geocode({'latLng': latlng1}, function(results, status) {
		      if (status == google.maps.GeocoderStatus.OK) {
		        if (results[1]) {
		          $('#mylocation').append("<div class='address'>"+results[2].formatted_address+"</div>");
		        } else {
		          alert("No results found");
		        }
		      } else {
		        alert("Geocoder failed due to: " + status);
		      }
			});
			$('#locationmap').gmap3({
				action: 'addMarker',
				latLng: latlng1,
				map:{
					center: latlng1,
					zoom: 14
				},
				marker:{
					options:{
						draggable: false
					}
				}
			});
		<?php }else{ ?>
			
			$('#locationmap').append("No Location Stored");
		<?php }?>
		
		$('#map').gmap3({ 
			action:'init',
			options:{
				center:[46.578498,2.457275],
				zoom: 2
				
			}
		},
			{ action: 'addMarkers',
			markers:[
			<?php $trips = members_get_trips($userid);
			if($trips){
				foreach ($trips as $key => $value) {
				$latitude = $trips[$key]['latitude'];
				$longitude = $trips[$key]['longitude'];
				$title = $trips[$key]['title'];
				$description = $trips[$key]['description']; ?>
				{lat:<?php echo $latitude ?>, lng:<?php echo $longitude ?>, data:'<strong><a href="traveldiary.php?user_id=<?php echo $userid?>&tripid=<?php echo $trips[$key]["id"]?>"><?php echo $title ?></a></strong><div class="description"><?php echo $description ?></div>'},
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
<?php if($myprofile){ // Allow adding new Trip only if its my profile?>
		
		$('button.addtrip').click(function(e){
			$('#map').css({
				width: '350px'
			});
			$(this).fadeOut(0);
			$(this).parent().parent().append('<input id="address" type="text">');
			$('#address').autocomplete({
			            source: function() {
			              $("#map").gmap3({
			                action:'getAddress',
			                address: $(this).val(),
			                callback:function(results){
			                  if (!results) return;
			                  $('#address').autocomplete(
			                    'display', 
			                    results,
			                    false
			                  );
			                }
			              });
			            },
			            cb:{
			              cast: function(item){
			                return item.formatted_address;
			              },
			              select: function(item) {
							$('#tripform').remove();
							markerposition = item.geometry.location;
							$('#map').parent().append('<div id="tripform"><input type="text" name="title" value="" id="triptitle" /><input type="text" name="tripdatefrom" value="" id="tripdatefrom" readonly="readonly"><input type="text" name="tripdays" value="" id="tripdays"><textarea name="tripdesc" id="tripdesc"></textarea><h4>Skills learned</h4><input type="text" name="tripskills" value="" id="tripskills"><h4>Add Friends</h4><input type="text" name="addfriends" value="" id="addfriends"><button class="green savetrip">Save Trip</button></div>');
							$('#tripdays').watermark('No. Days');
							$('#tripdatefrom').datepicker({
									dateFormat: 'd MM,yy',
									onClose: function(e){
										$('#tripdays').focus();
									}
							}).watermark('Click to Select Date');
							$('#triptitle').watermark('Trip Title').focus();
							$('#tripdesc').watermark('Describe your trip');
							
							//Filling the autosuggest skill lists
							queryurl = BACKEND_URL + '_general/getskillslist.php';
							$('#tripskills').autoSuggest(queryurl,{ 
								selectedItemProp: 'value',
								startText: "Type Skill",
								asHtmlID: 'skills',
								selectedValuesProp: 'id',
								searchObjProps: "value",
								minChars: 2,
								matchCase: false,
								//Adds country code to the list
								formatList: function(data,elem){
									var cat = data.cat, skill = data.value, catname = data.catname;
									var new_elem = elem.html("<span class='iconsmall petal p"+cat+" tiptip' title='"+catname+"'></span>"+ skill);
									return new_elem;
								}
							}).watermark('Type Skill');
							queryurl = BACKEND_URL + '_general/getfriendslist.php';
							$('#addfriends').autoSuggest(queryurl,{ 
								selectedItemProp: 'nombre',
								selectedValuesProp: 'id',
								asHtmlID: 'friends',
								searchObjProps: "nombre",
								startText: "Type Friend Name",
								minChars: 1,
								matchCase: false,
								//Adds country code to the list
								formatList: function(data,elem){
									var pic = data.pic, name = data.nombre;
									var new_elem = elem.html(pic +name);
									return new_elem;
								}
							}).watermark('Type Friend Name');
			                $("#map").gmap3(
			                  {action:'clear', name:'marker'},
			                  {action:'addMarker',
			                    latLng:item.geometry.location,
			                    map:
									{center:true}, 
									marker:{
									options:{
										animation: google.maps.Animation.DROP,
										icon: 	'<?php echo _IMAGES_URL_?>trips/mytrip.png',

									}
								}
			                  }
			                );
							latlng = item.geometry.location;
							latlng = String(latlng).replace(')','').replace('(','');;
							latlng = latlng.split(',');
							latitude = latlng[0];
							longitude = latlng[1];
							// POST Request to save Trip in database
							$('button.savetrip').click(function(e){
								var 	title 		= $('#triptitle').val(),
										description = $('#tripdesc').val(),
										datefrom 	= $('#tripdatefrom').val(),
										days 		= $('#tripdays').val(),
										address 	= $('#address').val(),
										skills 		= $('#as-values-skills').val(),
										friends 	= $('#as-values-friends').val();
										// FIELD VALIDATION
										if(title == '' || description == '' || datefrom == '' || days == '' || !is_int(days)){
											if (!is_int(days)){
												$('#tripdays').css({background: '#B3236C', 'border': '2px solid #924'}).val('');
											}else{
												$('#tripdays').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(title == ''){
												$('#triptitle').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#triptitle').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(description == ''){
												$('#tripdesc').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#tripdesc').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(datefrom == ''){
												$('#tripdatefrom').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#tripdatefrom').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(days == ''){
												$('#tripdays').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#tripdays').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
										}else{
									
											queryurl 	= BACKEND_URL + 'members/savetrip.php';
											$.post(queryurl,{title:title, description:description, datefrom:datefrom, days:days, skills:skills, friends: friends, address: address, latitude: latitude, longitude:longitude}, function(data){
												window.location.href= "<?php echo _VIEWS_URL_ ?>members/traveldiary.php?tripid="+data;
											});
										}
							});
			              }

			            }
			          })
			          .watermark('Type an Address').focus();
		});	
<?php } ?>
});
</script>
<div id="profilecontent" class="trips">
	<h3>Travel Diary 
		<?php if($myprofile){?>
			<button class="green addtrip">Add Trip</button>
			<button class="green viewtrips" onclick="location.href='<?php echo _VIEWS_URL_?>members/traveldiary.php?user_id=<?php echo $userid ?>'">View All Trips</button>
		<?php }else{?>
			<button class="green viewtrips" onclick="location.href='<?php echo _VIEWS_URL_?>members/traveldiary.php?user_id=<?php echo $userid ?>'">View All Trips</button>
		<?php }?>
	</h3>
	<div id="map"></div>
</div>
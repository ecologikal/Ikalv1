<?php
 	$view = 'geoloc'; // This is for determining which scripts and css are going to be loaded
	include("../../../header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php"); 
	$userid = $_SESSION['user_id']; // This determines the user id of the page being displayed?>
	<script>
	<?php 
	if(members_get_tracking_settings()==1){?>
		window.location.href= VIEWS_URL+"members/member_profile.php";
	<?php }?>
		function success(position) {
		  var s = document.querySelector('#status');

		  if (s.className == 'success') {
		    // not sure why we're hitting this twice in FF, I think it's to do with a cached result coming back    
		    return;
		  }


		  var mapcanvas = document.createElement('div');
		  mapcanvas.id = 'mapcanvas';
		  mapcanvas.style.height = '300px';
		  mapcanvas.style.width = '650px';

		  document.querySelector('#map').appendChild(mapcanvas);

		  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

		coords = String(latlng).replace(')','').replace('(','');
		coords = coords.split(',');
		lat = coords[0];
		lng = coords[1];



			$.post(BACKEND_URL+ 'members/updategeoloc.php',{lat: lat, lng: lng}, function(data){

			});
		

		  var myOptions = {
		    zoom: 5,
		    center: latlng,
			mapControls: false,
		    mapTypeControl: false,
		    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		  };
		  var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);

		  var marker = new google.maps.Marker({
		      position: latlng, 
		      map: map, 
		      title:"You are here!"
		  });
		}

		function error(msg) {
		  var s = document.querySelector('#status');
		  s.innerHTML = typeof msg == 'string' ? msg : "failed";
		  s.className = 'fail';

		  // console.log(arguments);
		}

		if (navigator.geolocation) {
		  navigator.geolocation.getCurrentPosition(success, error);
		} else {
		  error('not supported');
		}
	</script>	
	<content>
		<h1>Welcome to Ecologikal</h1>
		Ecologikal wants to know your location, this will allow you do many things such as find friends, sustainable centers and places near you!
		
		To allow this functionality just click Share Location in your browser's bar and select always share<br>
		<article>
	      <p>Finding your location: <span id="status">checking...</span></p>
	    </article>
		<div id="map"></div>
		<button class="green">Go to Your Profile</button>
	</content>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
    $tracking_settings=members_get_info("settings_tracking");
    include_once(_JS_URL_."login/logged_form.php");
?>
<div>
    <?php if($tracking_settings==0 && $GEN_USUARIO){?>
    <div id="tracking_settings" title="Tracking Setting">
        <div id="validateTips_login" class="validateTips">&nbsp;</div>
            <label for="login_form_user"><?php echo LANGUAGE_MEMBERS_TEXT_USER;?></label>
            <input type="text" name="login_form_user" id="login_form_user"  class="text ui-widget-content ui-corner-all" />
            <label for="login_form_password"><?php echo LANGUAGE_MEMBERS_TEXT_PASSWORD;?></label>
            <input type="password" name="login_form_password" id="login_form_password" class="text ui-widget-content ui-corner-all" />
            <label for="login_form_remember_session"><input name="login_form_remember_session" type="checkbox" id="login_form_remember_session" value="1" />
            No cerrar sesi&oacute;nsssss</label>
    </div>
    <?php } ?>
</div>
<script>
	function success(position) {
	
	  if (s.className == 'success') {
	    // not sure why we're hitting this twice in FF, I think it's to do with a cached result coming back    
	    return;
	  }

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
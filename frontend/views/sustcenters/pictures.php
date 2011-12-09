<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	include_once(_BACKEND_PATH_."sustcenters/servicesdata.php");
	$scname = $_GET['scname']; ?>
	<script src="<?php echo _PLUGINS_URL_ ?>jquery/jquery-1.6.1.min.js"></script>
	<script src="<?php echo _PLUGINS_URL_ ?>tn3/jquery.tn3.min.js"></script>
	<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	    $('.gallery').tn3({
	    external:[{
	        origin:"xml",
	        url:"<?php echo _PICS_URL_ ?>members/membergallery.xml"
	    }]
	    });
	});
 	</script>
	
	
	<div class="gallery"></div>
	
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	include_once(_BACKEND_PATH_."sustcenters/moreinfodata.php");
	$scname = $_GET['scname'];
	$country = $_GET['country'];
	$state = $_GET['state'];
	?>
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo _PLUGINS_URL_?>gomap/gomap.min.js"></script>
	
	
	<script type="text/javascript">
	    $(function(){
			$("#map").goMap({
					address:'<?php echo $state. ", ".$country; ?>',
					zoom: 10
			 });
			$.goMap.createMarker({  
			            address: '<?php echo $state. ", ".$country; ?>',
						icon: 	'<?php echo _IMAGES_URL_?>trips/mytrip.png'
			    });
		});	
		
	</script>
	<style>
	html,body{
	margin:0px;
	height:100%;
	}
	#map{
		width:100%;
		height:100%;
	}
	.gmap_marker{
		color:#222;
		font-size:12px;
	}
	</style>
<html>
	<body>
		<div id="map"></div>
	</body>
</html>
	
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	
	$scname = $_GET['scname'];
	$country = $_GET['country'];
	$state = $_GET['state'];
	include_once(_BACKEND_PATH_."sustcenters/placesdata.php");
	
	?>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo _PLUGINS_URL_?>gomap/gomap.min.js"></script>
	
	
	<script type="text/javascript">
	    $(function(){
			$("#map").goMap({
					address:'<?php echo $state. ", ".$country; ?>',
					zoom: 2,
					
			 });
			
			$.goMap.createMarker({  
			            address: '<?php echo $state. ", ".$country; ?>',
						icon: 	'<?php echo _IMAGES_URL_?>location.png',
						html:{
							content:'<h1><?php echo $scname ?></h1>'
						}
			});
			
			<?php for ($x=0;$x<$rows;$x++){?>
				$.goMap.createMarker({
					latitude: '<?php echo $markers[$x]["latitude"]?>',
					longitude: '<?php echo $markers[$x]["longitude"]?>',
					html:{
						content: '<h1><?php echo $markers[$x]["title"] ?></h1><p><?php echo $markers[$x]["description"] ?></p>',
					},
					icon: '<?php echo _IMAGES_URL_. $markers[$x]["icon"]?>'
				});
			<?php }//END FOR?>

		});	
		
	</script>
	<style>
	html,body{
	margin:0px;
	height:100%;
	font-family:Helvetica Neue, Helvetica, Arial;
	font-size:12px;
	}
	h1 {
	margin: 0;
	font-size: 21px;
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
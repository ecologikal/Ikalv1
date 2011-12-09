<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	include_once(_BACKEND_PATH_."sustcenters/servicesdata.php");
	$scname = $_GET['scname']; ?>
	<script src="<?php echo _PLUGINS_URL_ ?>jquery/jquery-1.6.1.min.js"></script>
	<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
	
	
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>generalstyles.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>sustcenter.css" type="text/css" />
<div id="iframe">
	<products>
		<h1>Products</h1>
		<?php for($x=0;$x<=$productsize;$x++){?>
		<product>
			<div class="name"><?php echo $products[$x]['Name']?></div>
			<div class="picture"><img src="<?php echo $products[$x]['Picture']?>"></div>
			<div class="description"><?php echo $products[$x]['Description']?></div>
			<div class="price"><div class="icon"></div><?php echo $products[$x]['PriceMXP']?></div>
			<button class="buy"><a href="<?php echo _VIEWS_URL_?>payments.php?price=<?php echo $products[$x]['PriceMXP']?>">Buy Now</a></button>
		</product>
		<?php } //END FOR PRODUCT?>
	</products>
	<services>
		<h1>Services</h1>
		<?php for($x=0;$x<=$servicesize;$x++){?>
		<service>
			<div class="name"><?php echo $services[$x]['Name']?></div>
			<div class="picture"><img src="<?php echo $services[$x]['Picture']?>"></div>
			<div class="description"><?php echo $services[$x]['Description']?></div>
			<div class="price"><div class="icon"></div><?php echo $services[$x]['PriceMXP']?></div>
			<button class="buy"><a href="<?php echo _VIEWS_URL_?>payments.php?price=<?php echo $services[$x]['PriceMXP']?>">Buy Now</a></button>
		</service>
		<?php } //END FOR PRODUCT?>
	</services>
</div><!-- Iframe -->
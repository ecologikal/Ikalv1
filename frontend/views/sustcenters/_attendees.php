<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
	include_once(_BACKEND_PATH_."sustcenters/_attendeesdata.php");
	$scname = $_GET['scname'];
	$workshop = $_GET['workshop']; ?>
	<script src="<?php echo _PLUGINS_URL_ ?>jquery/jquery-1.6.1.min.js"></script>
	<script src="<?php echo _JS_URL_ ?>sustcenters/sustcenters.js"></script>
<style>
	memberavatar img{
		width:45px;
		margin-right:10px;
	}
	members{
		margin:40px 10px 10px 10px;
		display:block;
	}
	member{
		display:block;
		width:100%;
		height:35px;
		margin-bottom:10px;
	}
	member a{
		font-size:13px;
		margin-left:10px;
		line-height:35px;
	}
	button{
		position:fixed;
		top:0;
		right:0;
	}
</style>
	
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>generalstyles.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>sustcenter.css" type="text/css" />
	<button>Book Now</button>
<members>	
	<?php for ($x=0; $x<rand(5,$profilesize);$x++){?>
	<member>
		<memberavatar><img src="<?php echo $profiles[$x]['ProfilePic'];?>"/></memberavatar>
		<div class="name"><a href="#" target="_parent"><?php echo $profiles[$x]['Name'];?></a></div>
	</member>
	<?php }?>
</members>
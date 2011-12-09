<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>
<game>
<h1>Play the Game! </h1>
<link rel="stylesheet" href="<?=_CSS_URL_?>game.css" type="text/css" media="screen" title="no title" charset="utf-8">

<?php $view = 'game'; load_js_scripts($view); 

	$profiles = array(
						array('Name' => 'Isaac Garza', 'ProfilePic' => _IMAGES_URL_.'profilepics/1.png'),
						array('Name' => 'Tiago Ruprecht', 'ProfilePic' => _IMAGES_URL_.'profilepics/2.png'),
						array('Name' => 'Sergio García', 'ProfilePic' => _IMAGES_URL_.'profilepics/3.png'),
						array('Name' => 'Pauline Schaeffer', 'ProfilePic' => _IMAGES_URL_.'profilepics/4.png'),
						array('Name' => 'Pau Cz', 'ProfilePic' => _IMAGES_URL_.'profilepics/5.png'),
						array('Name' => 'Diego Muñoz', 'ProfilePic' => _IMAGES_URL_.'profilepics/6.png'),
						array('Name' => 'Karla Rubiano', 'ProfilePic' => _IMAGES_URL_.'profilepics/7.png'),
						array('Name' => 'Emi Gonzalez', 'ProfilePic' => _IMAGES_URL_.'profilepics/8.png'),
						array('Name' => 'Diego García', 'ProfilePic' => _IMAGES_URL_.'profilepics/9.png'),
						array('Name' => 'Arliz Gutierrez', 'ProfilePic' => _IMAGES_URL_.'profilepics/10.png'),
						array('Name' => 'Jesus de Anda', 'ProfilePic' => _IMAGES_URL_.'profilepics/11.png'),
						array('Name' => 'Aline García', 'ProfilePic' => _IMAGES_URL_.'profilepics/12.png'),
						array('Name' => 'Andrea Scheel', 'ProfilePic' => _IMAGES_URL_.'profilepics/13.png'),
						array('Name' => 'Federico Halsband', 'ProfilePic' => _IMAGES_URL_.'profilepics/14.png'),
						array('Name' => 'Felix Collado', 'ProfilePic' => _IMAGES_URL_.'profilepics/15.png'),
						array('Name' => 'Carlos Mundalah', 'ProfilePic' => _IMAGES_URL_.'profilepics/16.png'),
						array('Name' => 'Gaby Ork', 'ProfilePic' => _IMAGES_URL_.'profilepics/17.png'),
						array('Name' => 'Alex Patiño', 'ProfilePic' => _IMAGES_URL_.'profilepics/18.png'),
						array('Name' => 'Vivians Glicanti', 'ProfilePic' => _IMAGES_URL_.'profilepics/19.png'),
						array('Name' => 'Xavier Padilla', 'ProfilePic' => _IMAGES_URL_.'profilepics/20.png'),
						array('Name' => 'Carlos Pérez', 'ProfilePic' => _IMAGES_URL_.'profilepics/21.png'),
						);
						
					$size = 20;
	?>


<div id="titles">
	<div class="title">Comment</div>
	<div class="title">Article</div>
	<div class="title">Event</div>
	<div class="title">Workshop</div>
	<div class="title">EcoTrip</div>
	<div class="title">Volunteer</div>
	<div class="title">Project</div>
	
</div>


<?php for($x=1;$x<7;$x++):?>

<div id="petal<?php echo $x; ?>">
	
	<div id="comment" class="square">
		<span class="bwWrapper"><img src="<?php  $random = rand(0,$size);
						echo $profiles[$random]['ProfilePic']; ?>"></span>
		<div class="squareinfo">
			<span id="points">+<?php echo rand(0,2000)?> kins</span>
			<a href="#"><?php echo $profiles[$random]['Name']; ?></a>
		</div>
	</div>
	<div id="article" class="square">
		<span class="bwWrapper"><img src="<?php  $random = rand(0,$size);
						echo $profiles[$random]['ProfilePic']; ?>"></span>
		<div class="squareinfo">
			<span id="points">+<?php echo rand(0,2000)?> kins</span>
			<a href="#"><?php echo $profiles[$random]['Name']; ?></a>
		</div>
	</div>
	<div id="event" class="square">
		<span class="bwWrapper"><img src="<?php  $random = rand(0,$size);
						echo $profiles[$random]['ProfilePic']; ?>"></span>
		<div class="squareinfo">
			<span id="points">+<?php echo rand(0,2000)?> kins</span>
			<a href="#"><?php echo $profiles[$random]['Name']; ?></a>
		</div>
	</div>
	<div id="workshop" class="square">
		<span class="bwWrapper"><img src="<?php  $random = rand(0,$size);
						echo $profiles[$random]['ProfilePic']; ?>"></span>
		<div class="squareinfo">
			<span id="points">+<?php echo rand(0,2000)?> kins</span>
			<a href="#"><?php echo $profiles[$random]['Name']; ?></a>
		</div>
	</div>
	<div id="ecotrip" class="square">
		<span class="bwWrapper"><img src="<?php  $random = rand(0,$size);
						echo $profiles[$random]['ProfilePic']; ?>"></span>
		<div class="squareinfo">
			<span id="points">+<?php echo rand(0,2000)?> kins</span>
			<a href="#"><?php echo $profiles[$random]['Name']; ?></a>
		</div>
	</div>
	<div id="volunteer" class="square">
		<span class="bwWrapper"><img src="<?php  $random = rand(0,$size);
						echo $profiles[$random]['ProfilePic']; ?>"></span>
		<div class="squareinfo">
			<span id="points">+<?php echo rand(0,2000)?> kins</span>
			<a href="#"><?php echo $profiles[$random]['Name']; ?></a>
		</div>
	</div>
	<div id="project" class="square">
		<span class="bwWrapper"><img src="<?php  $random = rand(0,$size);
						echo $profiles[$random]['ProfilePic']; ?>"></span>
		<div class="squareinfo">
			<span id="points">+<?php echo rand(0,2000)?> kins</span>
			<a href="#"><?php echo $profiles[$random]['Name']; ?></a>
		</div>
	</div>
</div>
<?php endfor;?>
</game>
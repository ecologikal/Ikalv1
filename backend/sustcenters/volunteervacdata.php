<?php

	$volunteervac = array(
					array('Id'=>1,	'Name' => 'Yoga Teacher', 		'Picture'=> _IMAGES_URL_.'scpics/volunteervac/1.jpg',	'Class'=> 'pet7',	'Place'=> $scname,	'RP'=>rand(0,3000),	'DateBeg'=>'29 Octubre 2011',	'DateEnd'=>	'29 Octubre 2011', 'HourBeg'=> '11:00',	'HourEnd'=>'15:00',		
					
					'Description'=> 'We need a skillfull Yoga Teacher that is willing to work in exchange for accommodation and food.', 		'Tasks'=>'Wash your dishes, Clean the guest house once a week, 2 hours of Yoga per day',	'Skills'=> array('Yoga teacher'),	'Payment'=> array('3 Meals', 'Accomodation','$4,500 MXN Monthly'),	'NoVacancies'=>rand(0,20)),
					
					
					array('Id'=>2,'Name' => 'English Teacher ', 		'Picture'=> _IMAGES_URL_.'scpics/volunteervac/2.jpg',	'Class'=> 'pet5',	'Place'=> $scname,	'RP'=>rand(0,3000),	'DateBeg'=>'29 Octubre 2011',	'DateEnd'=>	'29 Octubre 2011', 'HourBeg'=> '10:00',	'HourEnd'=>'16:00',		
					
					'Description'=> 'Volunteers will be placed at one of our teaching English projects, situated in impoverished housing areas. Teaching usually takes place in a small community centre or Church within the housing area. The people at these projects come from low income families and cannot afford to study English as a private institute.<br/>
					These projects focus primarily on children of all ages who come to learn English, participate in games and cultural activities. Volunteers will therefore partake in teaching English as well as providing support for all activities.
<br/>
					Please expect your teaching placement to feel disorganised, under staffed and underfunded. This is why volunteers are needed and appreciated in the projects. Volunteers will not necessarily teach in front of large classrooms or in formal classroom settings, and often teaching is done in one-on-one formats, or small groups.', 		
					'Skills'=> array('English Expert','English Teacher'),	'Tasks'=>'Wash your dishes, Clean the guest house once a week, Help with general tasks',	'Payment'=> array('3 Meals', 'Accomodation','$4,500 MXN Monthly'),	'NoVacancies'=>rand(0,20)),
					
					);
	$profiles = array(
						array('Name' => 'Isaac Garza', 			'ProfilePic' => _IMAGES_URL_.'profilepics/1.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Tiago Ruprecht', 		'ProfilePic' => _IMAGES_URL_.'profilepics/2.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Sergio García', 		'ProfilePic' => _IMAGES_URL_.'profilepics/3.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Pauline Schaeffer', 	'ProfilePic' => _IMAGES_URL_.'profilepics/4.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Pau Cz', 				'ProfilePic' => _IMAGES_URL_.'profilepics/5.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Diego Muñoz', 			'ProfilePic' => _IMAGES_URL_.'profilepics/6.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Karla Rubiano', 		'ProfilePic' => _IMAGES_URL_.'profilepics/7.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Emi Gonzalez', 		'ProfilePic' => _IMAGES_URL_.'profilepics/8.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Diego García', 		'ProfilePic' => _IMAGES_URL_.'profilepics/9.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Arliz Gutierrez', 		'ProfilePic' => _IMAGES_URL_.'profilepics/10.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Jesus de Anda', 		'ProfilePic' => _IMAGES_URL_.'profilepics/11.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Aline García', 		'ProfilePic' => _IMAGES_URL_.'profilepics/12.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Andrea Scheel', 		'ProfilePic' => _IMAGES_URL_.'profilepics/13.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Federico Halsband', 	'ProfilePic' => _IMAGES_URL_.'profilepics/14.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Felix Collado', 		'ProfilePic' => _IMAGES_URL_.'profilepics/15.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Carlos Mundalah', 		'ProfilePic' => _IMAGES_URL_.'profilepics/16.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Gaby Ork', 			'ProfilePic' => _IMAGES_URL_.'profilepics/17.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Alex Patiño', 			'ProfilePic' => _IMAGES_URL_.'profilepics/18.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Vivians Glicanti', 	'ProfilePic' => _IMAGES_URL_.'profilepics/19.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Xavier Padilla', 		'ProfilePic' => _IMAGES_URL_.'profilepics/20.png'	, 'Ecopoints' => rand(0,2000)),
						array('Name' => 'Carlos Pérez', 		'ProfilePic' => _IMAGES_URL_.'profilepics/21.png'	, 'Ecopoints' => rand(0,2000)),
					);
	$comments = array(
							array('Text' => 'Este link esta buenísimo, porfavor postea más de este tipo, creo que para alcanzar la sustentabilidad es necesario tomar en cuenta estas técnicas. Este link esta buenísimo, porfavor postea más de este tipo, creo que para alcanzar la sustentabilidad es necesario tomar en cuenta estas técnicas',								'Kharma' => rand(0,100),		'Dharma' => rand(0,500)),
							array('Text' => 'Me gustaría mucho saber más acerca de este tema porfavor',								'Kharma' => rand(0,100),		'Dharma' => rand(0,500)),
							array('Text' => 'Creo que la mejor forma de hacer un impacto es aplicando técnicas como esta',								'Kharma' => rand(0,100),		'Dharma' => rand(0,500)),
							array('Text' => 'Interesantísima aportación, yo agregaría algunas cosas pero me parece que todo esta muy completo. Saludos',								'Kharma' => rand(0,100),		'Dharma' => rand(0,500)),
						);
   			$petals= array(
   					array('Class' => 'pet1',   'Icon'=>'buildingicon', 		'Name'=>'Building',					'Color'=> 'red'),
   					array('Class' => 'pet2',   'Icon'=>'communitygovicon', 	'Name'=>'Community Governance',		'Color'=> 'orange'),
   					array('Class' => 'pet3',   'Icon'=>'financeicon', 		'Name'=>'Finance & Economics',		'Color'=> 'yellow'),
   					array('Class' => 'pet4',   'Icon'=>'landicon', 			'Name'=>'Land & Nature',			'Color'=> 'green'),
   					array('Class' => 'pet5',   'Icon'=>'cultureicon', 		'Name'=>'Culture & Education',		'Color'=> 'blue'),
   					array('Class' => 'pet6',   'Icon'=>'toolsicon', 			'Name'=>'Tools & Technology',		'Color'=> 'indigo'),
   					array('Class' => 'pet7',   'Icon'=>'healthicon', 			'Name'=>'Health & Spirituality',	'Color'=> 'purple'),
   			);
	$volunteervacize = count($volunteervac)-1;
	$profilesize =count($profiles)-1;
	$sizecomm =count($comments)-1;
	$size = count($profiles)-1;

?>
<?php
	$fee = 0.1; //10% fee comission
	$rooms = array(
					array('RoomName'=>'Fine Little Cabin',			'RoomDesc'=>'This Cabin is really beautiful and cossy, you will have a good time here',		'RoomPic'=> _IMAGES_URL_.'scpics/rooms/1.jpg',		'RoomPriceMXP'=>500,		'RoomPriceUSD'=>50,		'Occupancy'=>rand(0,1)),
					array('RoomName'=>'Female Dorm 8 Beds',			'RoomDesc'=>'Female Dorms only for girls that are traveling alone',							'RoomPic'=> _IMAGES_URL_.'scpics/rooms/2.jpg',		'RoomPriceMXP'=>200,		'RoomPriceUSD'=>20,		'Occupancy'=>rand(0,8)),
					array('RoomName'=>'Man Dorm 10 Beds',			'RoomDesc'=>'Nice Dormitory for long time travelers, really cosy',							'RoomPic'=> _IMAGES_URL_.'scpics/rooms/3.jpg',		'RoomPriceMXP'=>200,		'RoomPriceUSD'=>20,		'Occupancy'=>rand(0,10)),
					array('RoomName'=>'Beautiful Hut',				'RoomDesc'=>'This beautiful hut is placed in the middle of the forest',						'RoomPic'=> _IMAGES_URL_.'scpics/rooms/4.jpg',		'RoomPriceMXP'=>1000,	'RoomPriceUSD'=>100,	'Occupancy'=>rand(0,1)),
					array('RoomName'=>'Double Room',				'RoomDesc'=>'Perfect for couples traveling alone that like to be close into nature',		'RoomPic'=> _IMAGES_URL_.'scpics/rooms/5.jpg',		'RoomPriceMXP'=>700,		'RoomPriceUSD'=>70,		'Occupancy'=>rand(0,3)),
					array('RoomName'=>'Awesome Bed in Main Room',	'RoomDesc'=>'This spot is for people that enjoy hanging out with many travelers',			'RoomPic'=> _IMAGES_URL_.'scpics/rooms/6.jpg',		'RoomPriceMXP'=>100,		'RoomPriceUSD'=>10,		'Occupancy'=>rand(0,2))
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
	$currencies = array(
						array('Code'=>'MXN',	'Name'=>'Mexican Peso'),
						array('Code'=>'USD',	'Name'=>'US Dollar'),
	);
	

?>
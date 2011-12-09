<?php
	$bioregions = array(
					array('Name'=>'Ice'					),
					array('Name'=>'Tundre'				),
					array('Name'=>'Taiga'				),
					array('Name'=>'Temperate Forest'	),
					array('Name'=>'Tropical Rain Forest'),
					array('Name'=>'Grassland'			),
					array('Name'=>'Desert'				),
					array('Name'=>'Marine'				),
					array('Name'=>'Freshwater'			)
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
	$facilities = array('Electricity',
						'Hot Water',
						'Internet',
						'Computers',
						'24 Hour Reception',
						'Cable TV',
						'Lounge Area',
						'Guest Kitchen',
						'Library',
						'Bar',
						'Security Lockers',
						'Breakfast',
						'Air Conditioning',
						'Restaurant',
						'Pool',
						'Camping Ground',
						'Transportation Service',
						'Washing Machine',
						'Dryer Machine',
					);
					
		$activities = array(		
					'Hiking',
					'Fishing',
					'Surfing',
					'Kayaking',
					'Scuba Diving',
					'Adventure',
					'Horse Riding',
					'Boat Tour',
					'Rafting',
					'Diving',
					'Arts & Crafts',
					'Snorkelling',
					'Yoga',
					'Culinary Tour',
					'Mountain Biking',
					'Dance',
					'Tai Chi',
					'Kung Fu',
					'Qi Gong',
					'Reiki',
					'Spa',
					'Swimming',
					'Extreme sports',
					'Indigenous Contact',
					'Meditation',
					'Wild life',
					'Live Music',
					'Fire Dancing',
					'Sculpture',
					'Photography',
					'Painting',
					'Film',
					'Drums',
					'Circus',
			);	
	$spirituality = array(
					'Judaism',
					'Christianism',
					'Islamism',
					'Hinduism',
					'Buddishm',
					'Sikhism',
					'Kurdish',
					'Adrican',
					'Aztec',
					'Inca',
					'Mayan',
					'Aboriginal',
					'Confucianism',
					'Taoism',
					'Shintoism',
					'Universalism',
					'Spiritualism',
					'Atheism',
					'Paganism',
	);
	$diet = array(
					'Raw Vegan',
					'Vegan',
					'Vegetarian',
					'Dairy Vegetarian',
					'Fish Vegetarian',
					'Balanced Omnivorous',
					'Omnivorous',
					'Meat Eater',
	);
	$rules = array(
					'No tobacco Use',
					'Quiet from 10:00 p.m.',
					'Alcohol is banned'
	);
	$status =array(
					'Planning',
					'In Progress',
					'Established',
	);
	$scs = array(
				array('Name' => 'Casa Semilla',								'ProfilePic' => _IMAGES_URL_.'scpics/1.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Nuevo León'),
				array('Name' => 'Ecovilla Ananda', 							'ProfilePic' => _IMAGES_URL_.'scpics/2.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Oaxaca'),
				array('Name' => 'Huehuecoyotl', 							'ProfilePic' => _IMAGES_URL_.'scpics/3.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Huehuecoyotl is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Edo. Mexico'),
				array('Name' => 'Ecoaldea Feliz', 							'ProfilePic' => _IMAGES_URL_.'scpics/4.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Chiapas'),
				array('Name' => 'Grupedsac', 								'ProfilePic' => _IMAGES_URL_.'scpics/5.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Oaxaca'),
				array('Name' => 'Bosque de Niebla', 						'ProfilePic' => _IMAGES_URL_.'scpics/6.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Veracruz'),
				array('Name' => 'Tierra Turquesa', 							'ProfilePic' => _IMAGES_URL_.'scpics/7.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Nuevo León'),
				array('Name' => 'Badilisha Ecovillage Foundation Trust', 	'ProfilePic' => _IMAGES_URL_.'scpics/8.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Ghanna',	'State'=>'Riviera City'),
				array('Name' => 'Suderbyn Permaculture Ecovillage', 		'ProfilePic' => _IMAGES_URL_.'scpics/9.jpg'	, 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Germany',	'State'=>'Sieb-Lenden'),
				array('Name' => 'Nashira Ecoaldea', 						'ProfilePic' => _IMAGES_URL_.'scpics/10.jpg', 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Costa Rica',	'State'=>'La Paz'),
				array('Name' => 'Fondale', 									'ProfilePic' => _IMAGES_URL_.'scpics/11.jpg', 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Colombia',	'State'=>'Cartagena'),
				array('Name' => 'Eco Truly Park', 							'ProfilePic' => _IMAGES_URL_.'scpics/12.jpg', 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'United States',	'State'=>'California'),
				array('Name' => 'Bosque Village', 							'ProfilePic' => _IMAGES_URL_.'scpics/13.jpg', 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Mexico',	'State'=>'Michoacan'),
				array('Name' => 'Eco Yoga Park', 							'ProfilePic' => _IMAGES_URL_.'scpics/14.jpg', 	'Ecopoints' => rand(0,2000), 'Description'=>'Casa Semilla is a Holistic Sustaible Center Located in Monterrey, Mexico. We specialize in permaculture project development, sustainable technology research, and information technology',		'Country'=>'Argentina',	'State'=>'Buenos Aires'),
			);	
					
					
	$bioregionsize = count($bioregions)-1;
	$profilesize = count($profiles)-1;
	$facilitiesize = count($facilities)-1;
	$activitiesize = count($activities)-1;
	$spiritualitysize = count($spirituality)-1;
	$dietsize = count($diet)-1;
	$rulesize = count($rules)-1;
	$scsize =count($scs);
?>
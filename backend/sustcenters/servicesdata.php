<?php

	$products = array(
					array('Name' => 'Queso Artesanal', 		'Picture'=> _IMAGES_URL_.'scpics/products/1.jpeg', 				'Description'=> 'Este queso artesanal hecho de manera cien por ciento orgánica, la mezcla de amor y trabajo duro', 		'PriceMXP'=> "$".rand(50,1000), 		'PriceUSD' => rand(50,100)),
					array('Name' => 'Kombucha', 			'Picture'=> _IMAGES_URL_.'scpics/products/2.jpeg', 				'Description'=> 'Este queso artesanal hecho de manera cien por ciento orgánica, la mezcla de amor y trabajo duro', 		'PriceMXP'=> "$".rand(50,1000), 		'PriceUSD' => rand(50,100)),
					array('Name' => 'Buzzer', 				'Picture'=> _IMAGES_URL_.'scpics/products/3.jpeg', 				'Description'=> 'Antimosquitos 100% orgánico y efectivo, hecho a base de citronella.', 									'PriceMXP'=> "$".rand(50,1000), 		'PriceUSD' => rand(50,100)),
					array('Name' => 'Cepillo de Cerdas', 	'Picture'=> _IMAGES_URL_.'scpics/products/4.jpeg', 				'Description'=> 'Hecho a mano para todo trabajo de limpieza', 															'PriceMXP'=> "$".rand(50,1000), 		'PriceUSD' => rand(50,100)),
					array('Name' => 'Máquinas de Agua', 	'Picture'=> _IMAGES_URL_.'scpics/products/5.jpeg', 			'Description'=> 'Este queso artesanal hecho de manera cien por ciento orgánica, la mezcla de amor y trabajo duro', 		'PriceMXP'=> "$".rand(50,1000), 		'PriceUSD' => rand(50,100)),
					);
	$services = array(
					array('Name' => 'Contrucción de Muros Verdes', 		'Picture'=> _IMAGES_URL_.'scpics/services/1.png', 					'Description'=> 'Este queso artesanal hecho de manera cien por ciento orgánica, la mezcla de amor y trabajo duro', 		'PriceMXP'=> "$".rand(100,10000), 		'PriceUSD' => rand(50,1000)),
					array('Name' => 'Perm My House', 					'Picture'=> _IMAGES_URL_.'scpics/services/2.png', 				'Description'=> 'Este queso artesanal hecho de manera cien por ciento orgánica, la mezcla de amor y trabajo duro', 		'PriceMXP'=> "$".rand(100,10000), 		'PriceUSD' => rand(50,1000)),
					array('Name' => 'Desarrollo de Web Sites', 			'Picture'=> _IMAGES_URL_.'scpics/services/3.png', 	'Description'=> 'Antimosquitos 100% orgánico y efectivo, hecho a base de citronella.', 									'PriceMXP'=> "$".rand(100,10000), 		'PriceUSD' => rand(50,1000)),
					array('Name' => 'Renta de Salón de Eventos', 		'Picture'=> _IMAGES_URL_.'scpics/services/4.png', 			'Description'=> 'Hecho a mano para todo trabajo de limpieza', 															'PriceMXP'=> "$".rand(100,10000), 		'PriceUSD' => rand(50,1000)),
					array('Name' => 'Diseño Gráfico Profesional', 		'Picture'=> _IMAGES_URL_.'scpics/services/5.png', 		'Description'=> 'Este queso artesanal hecho de manera cien por ciento orgánica, la mezcla de amor y trabajo duro', 		'PriceMXP'=> "$".rand(100,10000), 		'PriceUSD' => rand(50,1000)),
					);
	
	$productsize = count($products)-1;
	$servicesize = count($products)-1;

?>
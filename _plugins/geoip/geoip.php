<?php 
// Incluimos la librería 
include("geoip.php"); 
// Abrimos el localizador indicando 
// el archivo de datos y el método 
$gi = geoip_open("GeoIPCity.dat",GEOIP_STANDARD); 
// Resolvemos la direccion IP 
$ip ="148.240.87.19";// $_SERVER['REMOTE_ADDR']; 
// Creamos el objeto 
$record = geoip_record_by_addr($gi,$ip); 
// Resolvemos y mostramos la región 
echo $record->city; 
// Cerramos el localizador 
geoip_close($gi); 
?> 
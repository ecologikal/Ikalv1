<?php
// Parse to Int function

function parseInt($string) {
//	return intval($string);
	if(preg_match('/(\d+)/', $string, $array)) {
		return $array[1];
	} else {
		return 0;
	}
}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
	$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
	$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
function getIp() {
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];        
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];
        return $_SERVER["REMOTE_ADDR"];
    }
    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');
    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');
    return getenv('REMOTE_ADDR');
}


function getGeo(){
	$ipin = getIp();
	$ch = curl_init();
	$ver = 'v1/';
	$method = "ipinfo/";
	$apikey = '100.6z68cswz5p2f8ef2yv4b';  
	$secret = 'FWgU3UVQ';  
	$timestamp = gmdate('U'); // 1200603038
	$sig = md5($apikey . $secret . $timestamp);
	$service = 'http://api.quova.com/';
	curl_setopt($ch, CURLOPT_URL, $service . $ver. $method. $ipin . '?apikey=' .
				 $apikey . '&sig='.$sig . '&format=xml');
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	$headers = curl_getinfo($ch);
	curl_close($ch);

	if ($headers['http_code'] != '200') {
		return "ERROR";
	} else {
		$xml = simplexml_load_string($data);
		$p = $xml->Location->CountryData->country; 
		$e = $xml->Location->StateData->state; 
		$c = $xml->Location->CityData->city; 
		return($xml);
	}
}
function user_tracking(){
	global $GEN_USUARIO,$GEN_USER_ID, $database_ecologikal,$ecologikal;
	if($GEN_USUARIO){
		$ip=getIp();
		$sql="SELECT a.ip FROM members_tracking a WHERE a.user_id= $GEN_USER_ID AND a.id = (SELECT MAX( id ) FROM members_tracking b WHERE b.user_id = $GEN_USER_ID )  ";
		$rst= mysql_query($sql, $ecologikal) or die(mysql_error());
		if(mysql_num_rows($rst)){
			$row=mysql_fetch_array($rst);
			if($row['ip']!=$ip){
				$geo=getGeo();
				$geo_country = $geo->Location->CountryData->country; 
				$geo_state = $geo->Location->StateData->state; 
				$geo_city = $geo->Location->CityData->city; 
				$insertSQL= sprintf("Insert Into members_tracking(user_id, date, ip, country, state, city) Values(%s, now(), %s, %s, %s, %s)",
					GetSQLValueString($GEN_USER_ID,"long"),
					GetSQLValueString($ip,"text"),
					GetSQLValueString($geo_country,"text"),
					GetSQLValueString($geo_state,"text"),
					GetSQLValueString($geo_city,"text"));
				$rst = mysql_query($insertSQL, $ecologikal) or die(mysql_error());
			}
		}else{
				$geo=getGeo();
				$geo_country = $geo->Location->CountryData->country; 
				$geo_state = $geo->Location->StateData->state; 
				$geo_city = $geo->Location->CityData->city; 
				$insertSQL= sprintf("Insert Into members_tracking(user_id, date, ip, country, state, city) Values(%s, now(), %s, %s, %s, %s)",
					GetSQLValueString($GEN_USER_ID,"long"),
					GetSQLValueString($ip,"text"),
					GetSQLValueString($geo_country,"text"),
					GetSQLValueString($geo_state,"text"),
					GetSQLValueString($geo_city,"text"));
				$rst = mysql_query($insertSQL, $ecologikal) or die(mysql_error());
		}
	}
}
function get_translation($field, $value_filter="", $lang=""){
	global $database_ecologikal,$ecologikal;
	if($lang=="")$lang=_LANG_;
	if($value_filter<>"")$value_filter=" And value=".GetSQLValueString($value_filter,'text');
	$sql="SELECT value, translation From translation Where field=".GetSQLValueString($field,'text')." $value_filter and lang='$lang' Order by translation";
	$rst= mysql_query($sql, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst)){
	 $a=array();
		while($row=mysql_fetch_array($rst)){
			$a[]=array($row[1],$row[0]);
		}
	}
	if(isset($a)){
		return $a;
	}else{
		return false;
	}
}
function get_word_translation($field, $value,$lang=""){
	global $database_ecologikal,$ecologikal;
	if($lang=="")$lang=_LANG_;
	$sql="SELECT translation From translation Where field=".GetSQLValueString($field,'text')." And value=".GetSQLValueString($value,'text')." And lang='$lang' ";
		$rst= mysql_query($sql, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst)){
			$row=mysql_fetch_array($rst);
			$a=$row[0];
	}
	if(isset($a)){
		return $a;
	}else{
		return false;
	}
}


function get_sliders($type, $lang=""){
	global $database_ecologikal,$ecologikal;
	if($lang=="")$lang=_LANG_;

	$sql="SELECT gs.value, t.translation From gen_sliders gs Inner Join translation t On  gs.value=t.value And t.field='$type'  Where gs.type='$type' And t.lang='$lang' Order By gs.value";
	$rst= mysql_query($sql, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst)){
	 $a=array();
		while($row=mysql_fetch_array($rst)){
			$a[]=array($row[0],$row[1]);
		}
	}

	if(isset($a)){
		return $a;
	}else{
		return false;
	}
}
/** Function to know if a user is logged in
	Returns true if User is logged in
	Returns False if user is not logged in **/
function is_logged_in(){
	if(isset($_SESSION['loggedin'])){
		$loggedin = $_SESSION['loggedin'];
		if ($loggedin){
			return true;
		}else{
			return false;
		}
	}
}
/** Function to load JS Scripts on Header Hook Depending
	@param: $view which determines the view that is being loaded
**/
function load_js_scripts($view){
	global $js_loaded;
/** Unused Scripts:
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	
	<script src="'._PLUGINS_URL_.'jquery/jquery-1.5.1.min.js"></script>
	<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.resizable.min.js"></script>
	<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.accordion.min.js"></script>
	
	<script src="'._PLUGINS_URL_.'jquery/ui/jquery.ui.selectmenu.js"></script>
	<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.effects.core.min.js"></script>
	<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.autocomplete.min.js"></script>
	<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.slider.min.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
	<script src="'._PLUGINS_URL_.'jquery.scrollpane/jquery.jscrollpane.min.js"></script> 
	<script src="'._PLUGINS_URL_.'jquery.mousewheel.js"></script> 
	<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.position.min.js"></script>
	<script src="'._PLUGINS_URL_.'jquery.fileupload/jquery.iframe-transport.js"></script>
**/
	if (!$js_loaded){
		include(_JS_PATH_.'globalvars.php');
		echo '<script src="'._PLUGINS_URL_.'jquery/jquery-1.6.1.min.js"></script>
			<script type="text/javascript" src="'._PLUGINS_URL_.'fancybox/jquery.fancybox-1.3.4.pack.js"></script>
			<script src="'._PLUGINS_URL_.'jquery/jquery-ui-1.8.14.custom.min.js"></script>
			<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.core.min.js"></script>
			<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.dialog.min.js"></script>
			<script src="'._JS_URL_.'main.js"></script>
			<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.draggable.min.js"></script>
			<script src="'._PLUGINS_URL_.'jquery.tipTip/jquery.tipTip.minified.js"></script>
			<script src="'._PLUGINS_URL_.'jquery/jquery.bgiframe.min.js"></script>
			<script src="'._PLUGINS_URL_.'jquery.livequery/jquery.livequery.js"></script>
			<script src="'._PLUGINS_URL_.'jquery.watermark.js"></script>
			<script src="'._PLUGINS_URL_.'jquery.timeago/jquery.timeago.js"></script>
			<script src="'._PLUGINS_URL_.'jquery.timeago/jquery.timeago.es.js"></script>';
		$js_loaded = true;
	}
	
	switch ($view){
		case 'member':
			echo '
				<script src="'._JS_URL_.'members/members.js"></script>
				<script src="'._PLUGINS_URL_.'autoSuggest/jquery.autoSuggest.js"></script>
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
				<script src="'._PLUGINS_URL_.'gmap3/gmap3.min.js"></script>
				<script src="'._PLUGINS_URL_.'gmap3/jquery-autocomplete.min.js"></script>
				<script src="'._PLUGINS_URL_.'raphael.js"></script>
				<script src="'._JS_URL_.'flower/member_flower.js"></script>
				<script src="'._VIEWS_URL_.'members/image_uploader/application.js"></script>
				<script src="'._PLUGINS_URL_.'jquery.fileupload/jquery.fileupload.js"></script>
				<script src="'._PLUGINS_URL_.'jquery.fileupload/jquery.fileupload-ui.js"></script>
				<script src="'._PLUGINS_URL_.'jEditable/jquery.jeditable.min.js"></script>
				<script src="'._PLUGINS_URL_.'maskedinput.js"></script>
				<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.widget.min.js"></script>
				<script src="'._PLUGINS_URL_.'jquery/ui/minified/jquery.ui.mouse.min.js"></script>';
			break;
		case 'messages':
			echo '<script src="'._PLUGINS_URL_.'autoSuggest/jquery.autoSuggest.js"></script>';
			break;
		case 'sustcenter':
			echo '<script src="'._PLUGINS_URL_.'raphael.js"></script>
				<script src="'._JS_URL_.'flower/sustcenter_flower.js" type="text/javascript" charset="utf-8"></script>';
			break;
		case 'game':
			echo '<script src="'._JS_URL_.'game.js" type="text/javascript" charset="utf-8"></script>
				<script src="'._PLUGINS_URL_.'jquery.isotope/jquery.isotope.min.js" type="text/javascript" charset="utf-8"></script>';
			break;	
		case 'maingame':
			echo '<script src="'._JS_URL_.'maingame.js" type="text/javascript" charset="utf-8"></script>
				<script src="'._PLUGINS_URL_.'jquery.isotope/jquery.isotope.min.js" type="text/javascript" charset="utf-8"></script>';
			break;
		case 'index':
			echo '<script src="'._JS_URL_.'index.js"></script>';
			break;
			case 'memberdir':
				echo '<script src="'._JS_URL_.'memberdir.js"></script>';
				break;
		case 'booking':
			echo '<script src="'._JS_URL_.'sustcenters/booking.js"></script>';
			break;
			case 'bookingpayment':
				echo '<script src="'._JS_URL_.'sustcenters/bookingpayment.js"></script>';
				break;	
		case 'geoloc':
			echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script src="'._PLUGINS_URL_.'gmap3/gmap3.min.js"></script>';
				break;
		case 'traveldiary':
			echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
				<script src="'._PLUGINS_URL_.'gmap3/gmap3.min.js"></script>
				<script src="'._PLUGINS_URL_.'gmap3/jquery-autocomplete.min.js"></script>
				<script src="'._JS_URL_.'members/traveldiary.js"></script>
				<script src="'._PLUGINS_URL_.'autoSuggest/jquery.autoSuggest.js"></script>';
				break;
		case 'addfriends':
			echo '<script src="'._PLUGINS_URL_.'autoSuggest/jquery.autoSuggest.js"></script>
			<script src="'._PLUGINS_URL_.'gmap3/jquery-autocomplete.min.js"></script>';
				break;
		case 'singlepicture':
				echo '	<script src="'._PLUGINS_URL_.'autoSuggest/jquery.autoSuggest.js"></script>';
				break;
		case 'pictureuploader':
			echo '<script src="'._JS_URL_.'members/pictureuploader.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/plupload.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/plupload.gears.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/plupload.silverlight.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/plupload.flash.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/plupload.browserplus.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/plupload.html4.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/plupload.html5.js"></script>
					<script type="text/javascript" src="'._PLUGINS_URL_.'plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
					';
				break;
	}	
}
/** Function to load CSS Files on Header Hook Depending on the View
	@param: $view which determines the view that is being loaded
**/
function load_css_files($view){
			echo '	<link rel="stylesheet" href="'._CSS_URL_.'global.css" media="screen" />
			<link rel="stylesheet" href="'._CSS_URL_.'generalstyles.css" media="screen" />
			<link rel="stylesheet" href="'._CSS_URL_.'stream.css" type="text/css" />        
    		<link rel="stylesheet" href="'._PLUGINS_URL_.'jquery/css/jquery.ui.theme.css"  type="text/css" />
    		<link rel="stylesheet" href="'._PLUGINS_URL_.'jquery/css/jquery.ui.all.css"  type="text/css" />
    		<link rel="stylesheet" href="'._PLUGINS_URL_.'jquery.fileupload/jquery.fileupload-ui.css" type="text/css" />
			<link rel="stylesheet" href="'._PLUGINS_URL_.'fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />';
	switch ($view){
		case 'member':
			echo '<link rel="stylesheet" href="'._PLUGINS_URL_.'autoSuggest/autoSuggest.css" type="text/css" />
			<link rel="stylesheet" href="'._PLUGINS_URL_.'gmap3/jquery-autocomplete.css" type="text/css" />';
			break;
		case 'messages':
			echo '<link rel="stylesheet" href="'._PLUGINS_URL_.'autoSuggest/autoSuggest.css" type="text/css" />
				<link rel="stylesheet" href="'._CSS_URL_.'messages.css" type="text/css" />';
			break;
		case 'booking':
			echo '<link rel="stylesheet" href="'._CSS_URL_.'booking.css" type="text/css" />';
			break;
		case 'maingame':
			echo '<link rel="stylesheet" href="'._CSS_URL_.'maingame.css" type="text/css" />';
			break;	
		case 'index':
			echo '<link rel="stylesheet" href="'._CSS_URL_.'index.css" type="text/css" />';
			break;
		case 'game':
			echo '<link rel="stylesheet" href="'._CSS_URL_.'game.css" type="text/css" />';
			break;
		case 'memberdir':
			echo '<link rel="stylesheet" href="'._CSS_URL_.'memberdir.css" type="text/css" />';
			break;
		case 'traveldiary':
			echo '<link rel="stylesheet" href="'._CSS_URL_.'traveldiary.css" type="text/css" />
				<link rel="stylesheet" href="'._PLUGINS_URL_.'gmap3/jquery-autocomplete.css" type="text/css" />
				<link rel="stylesheet" href="'._PLUGINS_URL_.'autoSuggest/autoSuggest.css" type="text/css" />';
			break;
		case 'addfriends':
			echo '<link rel="stylesheet" href="'._PLUGINS_URL_.'autoSuggest/autoSuggest.css" type="text/css" />';
			break;
		case 'pictureuploader':
			echo '<link rel="stylesheet" href="'._CSS_URL_.'pictureuploader.css" type="text/css" />
					<link rel="stylesheet" href="'._PLUGINS_URL_.'plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
					';
			break;
		case 'singlepicture':
			echo '<link rel="stylesheet" href="'._PLUGINS_URL_.'autoSuggest/autoSuggest.css" type="text/css" />';
			break;
	}
}
//Get current file name
function get_url(){
	$filename = $_SERVER['PHP_SELF'];
	$parts = Explode('/', $filename);
	return $parts[count($parts) - 1];
}
function redirect_to_index(){
	header('Location: '._ROOT_URL_);exit;
}
// Country Functions http://www.geognos.com/geo/en/world-countries-API.html API
// Returns Country code in a variable
function get_country_code($country){
	$sql = "SELECT code FROM countries WHERE text='$country'";
	$rst = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_row($rst);
		return $r=$row[0];
	}
}
// Echoes country code
function display_country_code($country){
	$sql = "SELECT code FROM countries WHERE text='$country'";
	$rst = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_row($rst);
		echo $r=$row[0];
	}
}
//Echoes the country flag
function display_country_flag($country){
	$code = get_country_code($country);
	$code = strtolower($code);
	echo "<img src='"._IMAGES_URL_."flags/$code.gif'/>";
}
// Returns the petal name when giving a petal number 
function get_petal_name($cat){
	$sql = "SELECT category FROM skill_categories WHERE skill_category_id=$cat";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $category = $row['category'];
}
function get_petal_class($cat){
	$sql = "SELECT class FROM skill_categories WHERE skill_category_id=$cat";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $category = $row['class'];
}
function get_petal_color($cat){
	$sql = "SELECT hexcolor FROM skill_categories WHERE skill_category_id=$cat";
	$rst = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_assoc($rst);
	return $category = $row['hexcolor'];
}
function get_all_members(){
	$sql = "SELECT user_id, usuario, nombre, apellido, ciudad, estado, pais, user_kins FROM miembros";
	$rst = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($rst)){
			$member['user_id']= $row['user_id'];
			$member['usuario'] = $row['usuario'];
			$member['nombre'] = $row['nombre'];
			$member['apellido'] = $row['apellido'];
			$member['ciudad'] = $row['ciudad'];
			$member['estado'] = $row['estado'];
			$member['pais'] = $row['pais'];
			$member['user_kins'] = $row['user_kins'];
			$members[] = $member;
	}
	return $members;
}
function createThumbnail($filename,$final_width_of_image, $path_to_image_directory, $path_to_thumbs_directory ) {  
  
    if(preg_match('/[.](jpg)$/', $filename)) {  
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);  
    } else if (preg_match('/[.](gif)$/', $filename)) {  
        $im = imagecreatefromgif($path_to_image_directory . $filename);  
    } else if (preg_match('/[.](png)$/', $filename)) {  
        $im = imagecreatefrompng($path_to_image_directory . $filename);  
    }  
  
    $ox = imagesx($im);  
    $oy = imagesy($im);  
  
    $nx = $final_width_of_image;  
    $ny = $final_width_of_image;  
	
	
	////////

	$original_aspect = $ox / $oy;
	$thumb_aspect = $nx / $ny;

	if($original_aspect >= $thumb_aspect) {
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $ny;
	   $new_width = $ox / ($oy / $ny);
	} else {
	   // If the thumbnail is wider than the image
	   $new_width = $ny;
	   $new_height = $oy / ($ox / $nx);
	}

	$thumb = imagecreatetruecolor($nx, $ny);

	// Resize and crop
	imagecopyresampled($thumb,
	                   $im,
	                   0 - ($new_width - $nx) / 2, // Center the image horizontally
	                   0 - ($new_height - $ny) / 2, // Center the image vertically
	                   0, 0,
	                   $new_width, $new_height,
	                   $ox, $oy);

  	/////////
    $nm = imagecreatetruecolor($nx, $ny);  
  

  
    if(!file_exists($path_to_thumbs_directory)) {  
      if(!mkdir($path_to_thumbs_directory)) {  
           die("There was a problem. Please try again!");  
      }  
     }  
  	imagejpeg($thumb, $path_to_thumbs_directory .  $filename);

    $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';  
    $tn .= '<br />Congratulations. Your file has been successfully uploaded, and a      thumbnail has been created.';  
    echo $tn;  
}
?>
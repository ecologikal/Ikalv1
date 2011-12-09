<?php
// Turn on Error Reporting (Development environment´);
//error_reporting(E_ALL);
// ini_set('display_errors', 1);

// ALlow include() function to use URLs instead of paths


// Language

define('_LANG_', 'es'); 
// Global Variables

define('_ROOT_PATH_',dirname(dirname(__FILE__)).'/');
define('_ROOT_URL_', 'http://greenbler.com/ecologikalv1/' );
define('_PLUGINS_URL_'  		,_ROOT_URL_.'_plugins/' ); 
define('_PLUGINS_PATHL_'		,_ROOT_PATH_. '_plugins/' ); 
define('_FRONTEND_URL_'			,_ROOT_URL_.'frontend/');
define('_FRONTEND_PATH_'		,_ROOT_PATH_. 'frontend/');
define('_BACKEND_URL_'			,_ROOT_URL_.'backend/');
define('_BACKEND_PATH_'		,_ROOT_PATH_. 'backend/');
define('_VIEWS_URL_'   			,_FRONTEND_URL_.'views/');
define('_VIEWS_PATH_'  			,_FRONTEND_PATH_. 'views/');
define('_JS_URL_'	   			,_FRONTEND_URL_.'js/');
define('_JS_PATH_'	   			,_FRONTEND_PATH_. 'js/');
define('_CSS_URL_'	   			,_FRONTEND_URL_.'css/');
define('_CSS_PATH_'	   			,_FRONTEND_PATH_. 'css/');
define('_IMAGES_URL_'  			,_CSS_URL_.'images/');
define('_IMAGES_PATH_' 			,_CSS_PATH_. 'images/');

//Pictures Definition
define('_PICS_PATH_'			,_ROOT_PATH_.'pictures/');
define('_PICS_URL_'				,_ROOT_URL_.'pictures/');
define('_MEMBER_PICS_PATH_'		,_PICS_PATH_.'members/');
define('_MEMBER_PICS_URL_'		,_PICS_URL_.'members/');
define('_SC_PICS_PATH_'			,_PICS_PATH_.'scs/');
define('_SC_PICS_URL_'			,_PICS_URL_.'scs/');
define('_PROJECTS_PICS_PATH_'	,_PICS_PATH_.'projects/');
define('_PROJECTS_PICS_URL_'	,_PICS_URL_.'projects/');
define('_EVENTS_PICS_PATH_'		,_PICS_PATH_.'events/');
define('_EVENTS_PICS_URL_'		,_PICS_URL_.'events/');

$myprofile = false;
$GEN_USUARIO=false;
$GEN_IDIOMA="es";
$GEN_USER_ID=false;
$GEN_SC_ID=false;


$GEN_URL_IMAGENES=_ROOT_URL_ ."/images";

$user_id="";
$goto="";

//Include Necessary Files

require_once(_ROOT_PATH_."/_config/session.php");
require_once(_ROOT_PATH_."/_config/dbconnection.php");
include_once(_ROOT_PATH_."backend/functions.php");
include_once(_ROOT_PATH_."backend/functions_member.php");
require_once(_ROOT_PATH_."_lang/"._LANG_."/members.php");
require_once(_ROOT_PATH_."_lang/"._LANG_."/global.php");

//Redirects to index if user is not logged in
$url = get_url();
if ($url != 'index.php'){
	if (!is_logged_in()){
		//	header('Location: '._ROOT_URL_);exit();
	}
}
//Load HTML Functionality for Main Menu

$user_id=isset($_GET['user_id']) ? $_GET['user_id'] : $GEN_USER_ID;
$goto=isset($_GET['goto']) ? $_GET['goto'] : "stream";
$array_goto["gallery"]=				array(_VIEWS_PATH_,_VIEWS_URL_,"members/gallery/gallery.php");;
$array_goto["stream"]=				array(_VIEWS_PATH_,_VIEWS_URL_,"members/stream/members_stream.php");;
$array_goto["profile"]=				array(_VIEWS_PATH_,_VIEWS_URL_,"members/profile.php");;
$array_goto["image-uploader"]=		array(_VIEWS_PATH_,_VIEWS_URL_,"members/image_uploader/index.php");;
$array_goto["sc-image-uploader"]=	array(_VIEWS_PATH_,_VIEWS_URL_,"sustcenters/image_uploader/index.php");;
$array_goto["sc-gallery"]=			array(_VIEWS_PATH_,_VIEWS_URL_,"sustcenters/gallery/gallery.php");;
$array_goto["flower"]=				array(_VIEWS_PATH_,_VIEWS_URL_,"members/member_flower.php");;
$array_goto["game"]=				array(_VIEWS_PATH_,_ROOT_URL_,"maingame.php");;

//Petal Name Array
$petal_name[1] = 'Building';
$petal_name[2] = 'Community Gov';
$petal_name[3] = 'Finance & Economics';
$petal_name[4] = 'Land & Nature';
$petal_name[5] = 'Culture & Education';
$petal_name[6] = 'Tools & Technology';
$petal_name[7] = 'Health & Spirituality';

// GAME SECTION

$noelements = 20;


?>


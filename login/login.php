<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
if(isset($_POST['login_forma_comando']) && $_POST['login_forma_comando']=="login"){
	$u=$_POST['login_forma_usuario'];
	$p=$_POST['login_forma_contrasena'];
	$r=$_POST['remember_session'];
	$sql="Select usuario,contrasena,clave_idioma,user_id From miembros Where (usuario=" . GetSQLValueString($u,"text") ." or email=" . GetSQLValueString($u,"text") .") and contrasena=".GetSQLValueString(md5($p),"text").";";
	$rst = mysql_query($sql, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_array($rst);
		$GEN_USUARIO=$row['usuario'];
		$GEN_IDIOMA=$row['clave_idioma'];
		$GEN_USER_ID=$row['user_id'];
		
		if($r=="1"){
			//suma 30 dias a la fecha actual
			$m = 2592000 + time();
			setcookie("GEN_USUARIO", $GEN_USUARIO, $m,"/");
			setcookie("GEN_USER_ID", $GEN_USER_ID ,$m,"/");
			setcookie("GEN_IDIOMA", $GEN_IDIOMA, $m,"/"); 
		}
		$_SESSION['loggedin'] = true;
		$_SESSION['user'] = $GEN_USUARIO;
		$_SESSION['user_id'] = $GEN_USER_ID;
		$_SESSION['lang'] = $GEN_IDIOMA;
		
		global $username, $user_id, $lang;
		
		$username = $_SESSION['user'];
		$user_id = $_SESSION['user_id'];
		$lang = $_SESSION['lang'];
		
		$logged = true;
		echo $logged;
		user_tracking();
		
		exit;
		
	}else{
		$logged = false;
		echo $logged;
	}
	
}
?>

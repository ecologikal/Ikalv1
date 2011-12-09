<?php 	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");

function miembro_envia_mail_confirmacion(){
	$usuario=$_POST['miembro_forma_registro_usuario'];
	$contrasena=$_POST['miembro_forma_registro_contrasena'];
	$email=$_POST['miembro_forma_registro_email'];
	echo "LANGUAGE_MEMBERS_REGISTER_EMAIL_CONFIRMATION"."->".$GEN_USUARIO;
}
if ((isset($_POST["miembro_forma_registro_comando"])) && ($_POST["miembro_forma_registro_comando"] == "agregar_miembro")) {
	$miembro_forma_registro_usuario=$_POST['miembro_forma_registro_usuario'];
	$miembro_forma_registro_contrasena=$_POST['miembro_forma_registro_contrasena'];
	$miembro_forma_registro_email=$_POST['miembro_forma_registro_email'];
	if($miembro_forma_registro_usuario == ''){
		echo "Username Required";
		exit;
	}

	if($miembro_forma_registro_contrasena == ''){
		echo "Password Required";
		exit;
	}

	if($miembro_forma_registro_email == ''){
		echo "Email Required";
		exit;
	}
	
	
	$ConsultaSQL="Select usuario,email From miembros Where usuario='$miembro_forma_registro_usuario' or email='$miembro_forma_registro_email'";
	$rst = mysql_query($ConsultaSQL, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst)>0){
		$row=mysql_fetch_array($rst);
		if($row['usuario']==$miembro_forma_registro_usuario){
			echo "Username not Available";
			exit;
		}
		if($row['email']==$miembro_forma_registro_email){
			echo "Email Already Registered";
			exit;
		}
	}
	
	$user_hash=uniqid();
	  $insertSQL = sprintf("INSERT INTO miembros (nombre, usuario, email, contrasena, clave_idioma,fecha_registro,hash) VALUES (%s, %s, %s, %s, %s, now(),%s)",
  				GetSQLValueString($miembro_forma_registro_usuario,"text"),
  				GetSQLValueString($miembro_forma_registro_usuario,"text"),
  				GetSQLValueString($miembro_forma_registro_email,"text"),
  				GetSQLValueString(md5($miembro_forma_registro_contrasena),"text"),
  				GetSQLValueString($GEN_IDIOMA,"text"),
  				GetSQLValueString($user_hash,"text"));
	  $Result1 = mysql_query($insertSQL, $ecologikal) or die(mysql_error());

	//echo $insertSQL;
	if($Result1){
		  $rst= mysql_query("Select LAST_INSERT_ID();", $ecologikal) or die(mysql_error());
		  $row=mysql_fetch_array($rst);
		$GEN_USUARIO=$miembro_forma_registro_usuario;
		$GEN_USER_ID=$row[0];
		//suma 30 dias a la fecha actual
		$m = 2592000 + time(); 
		$_SESSION['user']=$GEN_USUARIO;
		$_SESSION['user_id']= $GEN_USER_ID;
		$_SESSION['loggedin'] = true;
		$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);
		//miembro_envia_mail_confirmacion();
		
		// create picture directory
		
		mkdir(_MEMBER_PICS_PATH_.$_SESSION['user_hash'], 0777);
		
		
		
		echo true;
	}else{
		echo mysql_error();
	}
	mysql_close($ecologikal);
}
?>
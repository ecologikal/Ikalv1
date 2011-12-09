<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");

	$userid=$_SESSION['user_id'];
	foreach ($_POST as $var => $value) {
		//Validates Email and stores in DB
		if ($var == 'email'){
			$email = $value;
			if(preg_match("/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/", $email)){
  
				members_set_info('email',$userid,$email);
				echo $email;
			} else {
			      echo "Invalid Email";
			}
		}
		//Stores Gender
		if ($var == 'gender'){
			members_set_info('gender',$userid,$value);
			echo $value;
		}
		if ($var == 'dob'){
			$date = $value;
			echo $date;
			$date = strtotime($date);
			$date = date('Y-m-d',$date);
			members_set_info('dob',$userid, $date);
			
		}
		if ($var == 'phone'){
			members_set_info('phone',$userid,$value);
			echo $value;
		}
		if($var == 'country'){
			members_set_info('country',$userid,$value);
			echo $value;
		}
		if($var == 'firstname'){
			members_set_info('nombre',$userid,$value);
			echo $value;
		}
		if($var == 'lastname'){
			members_set_info('apellido',$userid,$value);
			echo $value;
		}
		if($var == 'aboutme'){
			members_set_info('aboutme',$userid,$value);
			echo $value;
		}
		if($var == 'language'){
			//Deletes previous language records from the DB to avoid duplicity
			members_delete_language_list($userid);
			$language = explode(',',$value );
			//Deletes the first element of the array
			array_shift($language);
			// Deletes the last element of the array
			array_pop($language);
			foreach ($language as $i=> $value){
				$langid = $language[$i];
			//	members_get_language_description($langid);
				members_add_language($userid,$langid);
				
			}
			echo "Language List Updated Successfully";
		//	members_add_language($userid, $langname, $langlevel);
		//	echo $langname . ",". $langlevel;
		}
		
	}
?>
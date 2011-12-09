<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); 
$_SESSION['user_hash'] = members_get_info('hash',$_SESSION['user_id']);

  // open the directory
$pathToImages = _MEMBER_PICS_PATH_.$_SESSION['user_hash'].'/profile/';

function thumbnail($image_path,$thumb_path,$image_name,$thumb_width) 
{ 
	list($imagewidth, $imageheight, $imageType) = getimagesize("$image_path/$image_name");
 	$imageType = image_type_to_mime_type($imageType);
    
	switch($imageType) {
		case "image/gif":
			$src_img=imagecreatefromgif("$image_path/$image_name");

			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$src_img=imagecreatefromjpeg("$image_path/$image_name");

			break;
	    case "image/png":
		case "image/x-png":
			$src_img=imagecreatefrompng("$image_path/$image_name"); 
			break;
  	}
 	
    $origw=imagesx($src_img); 
    $origh=imagesy($src_img); 
    $new_w = $thumb_width; 
    $diff=$origw/$new_w; 
    $new_h=$new_w; 
    $dst_img = imagecreate($new_w,$new_h); 
    imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
 	switch($imageType) {
		case "image/gif":
	  		imagegif($dst_img,"$thumb_path/profile_th.jpg"); 

			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($dst_img,"$thumb_path/profile_th.jpg",100);

			
			break;
		case "image/png":
		case "image/x-png":
			imagepng($dst_img,"$thumb_path/profile_th.jpg"); 

			break;
    }
    return TRUE; 
}


thumbnail($pathToImages,$pathToImages,'profile_original.jpg',35);




?>
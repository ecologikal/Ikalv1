<?php
/*
* Copyright (c) 2008 http://www.webmotionuk.com
* "PHP & Jquery image upload & crop"
* Date: 2008-05-15
* Ver 1.0
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
* ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
* IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, 
* PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
* INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, 
* STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF 
* THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
* http://www.opensource.org/licenses/bsd-license.php
*/

//Constants
//You can alter these options
// Get the user dir for profile pic
session_start();
$userhash = $_SESSION['user_hash'];
$command = $_GET['command'];
$upload_dir = '../../pictures/members/'.$userhash.'/profile/'; 				// The directory for the images to be saved in

$upload_path = $upload_dir."/";				// The path to where the image will be saved
$large_image_name = "profile_original.jpg"; 		// New name of the large image
$thumb_image_name = "profile.jpg"; // New name of the thumbnail image
$small_thumb_image_name = "profile_th.jpg"; 	
$max_file = "4148576"; 						// Approx 1MB
$max_width = "660";							// Max width allowed for the large image
$thumb_width = "660";						// Width of thumbnail image
$thumb_height = "254";						// Height of thumbnail image
// Only one of these image types should be allowed for upload
$allowed_image_types = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif");
$allowed_image_ext = array_unique($allowed_image_types); // do not change this
$image_ext = "";	// initialise variable, do not change this.
foreach ($allowed_image_ext as $mime_type => $ext) {
    $image_ext.= strtoupper($ext)." ";
}
//Image functions
//You do not need to alter these functions
function resizeImage($image,$width,$height,$scale) {
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
		    case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
		    case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
	  	}
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		switch($imageType) {
			case "image/gif":
		  		imagegif($newImage,$image); 
				break;
	      	case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
		  		imagejpeg($newImage,$image,90); 
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$image);  
				
				break;
	    }
		chmod($image, 0777);
		return $image;
}
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

//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$imageType = image_type_to_mime_type($imageType);

		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);

		
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image);

				break;
		    case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image);

				break;
		    case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 

				break;
	  	}
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);

		switch($imageType) {
			case "image/gif":
		  		imagegif($newImage,$thumb_image_name); 

				break;
	      	case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
		  		imagejpeg($newImage,$thumb_image_name,90);

				
				break;
			case "image/png":
			case "image/x-png":
				imagepng($newImage,$thumb_image_name); 

				break;
	    }
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$sizes = getimagesize($image);
	$height = $sizes[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$sizes = getimagesize($image);
	$width = $sizes[0];
	return $width;
}

//Image Locations
$large_image_location = $upload_path.$large_image_name;
$thumb_image_location = $upload_path.$thumb_image_name;
$small_thumb_image_location = $upload_path.$small_thumb_image_name;

//Create the upload directory with the right permissions if it doesn't exist
if(!is_dir($upload_dir)){
	mkdir($upload_dir, 0777);
	chmod($upload_dir, 0777);
}

//Check to see if any images with the same names already exist
if (file_exists($large_image_location)){
	if(file_exists($thumb_image_location)){
		$thumb_photo_exists = "<img src=\"".$upload_path.$thumb_image_name."\" alt=\"Thumbnail Image\"/>";
	}else{
		$thumb_photo_exists = "";
	}
   	$large_photo_exists = "<img src=\"".$upload_path.$large_image_name."\" alt=\"Large Image\"/>";
} else {
   	$large_photo_exists = "";
	$thumb_photo_exists = "";
}

if (isset($_POST["upload"])) { 
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = substr($filename, strrpos($filename, '.') + 1);
	
	//Only process if the file is a JPG and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		if (($file_ext!="jpg") && ($userfile_size > $max_file)) {
			$error= "ONLY jpeg images under 1MB are accepted for upload";
		}
	}else{
		$error= "Select a jpeg image for upload";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
			
			move_uploaded_file($userfile_tmp, $large_image_location);
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			//Delete the thumbnail file so the user can create a new one
			if (file_exists($thumb_image_location)) {
				unlink($thumb_image_location);
			}
		}
		//Refresh the page to show the new uploaded image
		header("location:".$_SERVER["PHP_SELF"]);
		exit();
	}
}

if (isset($_POST["upload_thumbnail"]) && strlen($large_photo_exists)>0) {
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	
	thumbnail($upload_path,$upload_path,'profile_original.jpg',35);
    
	//Reload the page again to view the thumbnail
	header("location:".$_SERVER["PHP_SELF"]);
	exit();
}

if ($_GET['a']=="delete"){
	if (file_exists($large_image_location)) {
		unlink($large_image_location);
	}
	if (file_exists($thumb_image_location)) {
		unlink($thumb_image_location);
	}
	header("location:".$_SERVER["PHP_SELF"]);
	exit(); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>WebMotionUK - PHP &amp; Jquery image upload &amp; crop</title>
	<script type="text/javascript" src="js/jquery-pack.js"></script>
	<script type="text/javascript" src="js/jquery.imgareaselect-0.3.min.js"></script>
</head>
<body>
<!-- 
* Copyright (c) 2008 http://www.webmotionuk.com / http://www.webmotionuk.co.uk
* Date: 2008-05-15
* Ver 1.0
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND 
* ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
* WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. 
* IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
* INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, 
* PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
* INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, 
* STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF 
* THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
* http://www.opensource.org/licenses/bsd-license.php
-->

<?php
//Only display the javacript if an image has been uploaded
if(strlen($large_photo_exists)>0){
	$current_large_image_width = getWidth($large_image_location);
	$current_large_image_height = getHeight($large_image_location);?>
<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

$(document).ready(function () { 
	$('#uploadbutton').trigger('click');
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("You must make a selection first");
			return false;
		}else{
			return true;
		}
	});
	$('#uploadbutton').change(function(){
	   var path = $(this).val();
		var	filename = path.replace(/C:\\fakepath\\/i, '');
		filename = filename.substr(0,26);
	   $('.fileinput .label').html(filename);
	});
}); 

$(window).load(function () { 
	$('#thumbnail').imgAreaSelect({ aspectRatio: '2.62:1', onSelectChange: preview }); 
});

</script>

<?php }?>
<link rel="stylesheet" href="../../frontend/css/generalstyles.css" media="screen" />
<link rel="stylesheet" href="upload.css" media="screen" />
<div id="iframe">
<?php
//Display error message if there are any
if(strlen($error)>0){
	echo "<ul><li><strong>Error!</strong></li><li>".$error."</li></ul>";
}
if(strlen($large_photo_exists)>0 && strlen($thumb_photo_exists)>0 && $command != 'upload'){
 //	echo $large_photo_exists."&nbsp;".$thumb_photo_exists;
//	echo "<p><a href=\"".$_SERVER["PHP_SELF"]."?a=delete\">Delete Images</a></p>";
	echo "<script>parent.location.reload(true); </script>";
}else{
	
		if(strlen($large_photo_exists)>0 && $command!='upload'){?>
		<div class="croptitle"><h4><span class="number">2</span> Crop your Pic</h4></div>
		<div align="center">
			<img src="<?php echo $upload_path.$large_image_name;?>" id="thumbnail" alt="Create Thumbnail" />
	<!--		<div style="float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
				<img src="<?php echo $upload_path.$large_image_name;?>" style="position: relative;" alt="Thumbnail Preview" />
			</div> -->
			<br style="clear:both;"/>
			<form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" />
				<input type="submit" name="upload_thumbnail" value="Save Picture" id="save_thumb"  class="greenbutton"/>
			</form>
		</div>

	<?php 	} ?>

	<?php if($command=='upload'){?><form name="photo" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<div class="fileinput">
			<h3><span class="number">1</span>Upload your File</h3>
			<div class="label">Click to Select file</div>
			<input type="file" accept="image/jpg, image/gif, image/jpeg, image/png" name="image" size="30" id="uploadbutton" class="greenbutton"/> <input type="submit" name="upload" value="Upload" class="greenbutton" />
		</div>
	</form>
	<?php }?>
<?php } ?>
<!-- Copyright (c) 2008 http://www.webmotionuk.com -->
</div>
</body>
</html>

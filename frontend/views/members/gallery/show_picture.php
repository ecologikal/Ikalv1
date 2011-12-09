<?php include_once($_SERVER['DOCUMENT_ROOT']."/ecologikal/include/inc.php");?>
<?php include_once($GEN_PATH_SERVIDOR."/include/check_sesion.php");?>
<?php require_once($GEN_PATH_SERVIDOR.'/connections/ecologikal.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/funciones.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR.'/include/members/funciones.php'); ?>
<?php require_once($GEN_PATH_SERVIDOR."/include/idiomas/".$GEN_IDIOMA."/members/members.php")?>
<?php require_once($GEN_PATH_SERVIDOR."/include/idiomas/".$GEN_IDIOMA."/gen.php")?>
<?php
$pager="";
$no_page="";
$pictures_page=1;
	
$user_id=isset($_GET['user_id']) ? $_GET['user_id'] : $GEN_USER_ID;
$no_page=isset($_GET['no_page']) ? $_GET['no_page'] : "";

if(isset($_POST['user_id']))$user_id=$_POST['user_id'];
if(isset($_POST['no_page']))$no_page=$_POST['no_page'];


if(!$GEN_USER_ID){echo "not logged";exit;}

$user_image_galery_path= $GEN_PATH_MEMBERS_PICTURES.members_get_info("hash",$user_id)."/";
$user_image_galery_url= $GEN_URL_MEMBERS_PICTURES.members_get_info("hash",$user_id)."/";

$consult="SELECT Count(hash) FROM members_pictures Where user_id=$user_id Order By member_picture_id  DESC";
$rst= mysql_query($consult, $ecologikal) or die(mysql_error());
$row=mysql_fetch_array(	$rst );
$total_pictures=$row[0];

if($total_pictures>$pictures_page){
	if(!$no_page){
		$no_page=0;
	}
	$pager=" Limit ".($no_page*$pictures_page).", $pictures_page";
}
$sql="Select *,date_format(date,'%d-%m-%y') as date1 From members_pictures Where user_id=$user_id Order By member_picture_id desc $pager";
$rst = mysql_query($sql, $ecologikal);
if(mysql_num_rows($rst)){
	$row=mysql_fetch_assoc($rst);
	$image_path=$user_image_galery_path.$row['hash'].".jpg";
	$image_url=$user_image_galery_url.$row['hash'].".jpg";
	if(!file_exists($image_path) && !file_exists($image_path_th)){
		$image_url="";
	}
}

?>
	<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	
	.loading{
		background:url(<?php echo $GEN_URL_SERVIDOR?>/images/ajax-loader.gif) no-repeat center;
		height:390px;
	}
	#gallery #picture{
		background:#eee url(<?php echo $GEN_URL_SERVIDOR?>/images/ajax-loader.gif) no-repeat center;
		width: 520px;
		text-align: center;
		border: 1px solid #CCC;
		padding: 6px;
		border-radius: 5px;
	}
	#gallery #picture img{
		max-width:520px;
	}
	</style>
<script type="text/javascript">
$(function () {
      $('#gallery #picture').addClass('loading');
	  $("#form_picture_description").submit(function(){
	  	var hash=$('#form_picture_description #hash').val(),
			description=$("#description_picture").val();

		var dataString="command=description_picture"+
			"&description="+description+
			"&hash="+hash;
		$.ajax({
			type: "POST",
			url: "<?php echo $GEN_URL_SERVIDOR?>/include/members/gallery/actions.php?q="+ 1*new Date(),
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {
				//console.log(msg);
				if (msg == "DESCRIPTION-OK" ){
					$("#picture_description").html(description);
				}
			}
		 });			

		return false;
	  });

  var img = new Image();
  
  // wrap our new image in jQuery, then:
  $(img)
    // once the image has loaded, execute this code
    .load(function () {
      // set the image hidden by default    
      $(this).hide();
    
      // with the holding div #loader, apply:
      $('#gallery #picture')
        // remove the loading class (so no background spinner), 
        .removeClass('loading')
        // then insert our image
        .append(this);
    
      // fade our image in to create a nice effect
      $(this).fadeIn();
    })
    
    // if there was an error loading the image, react accordingly
    .error(function () {
      // notify the user that the image could not be loaded
    })
    
    // *finally*, set the src attribute of the new image to our image
    .attr('src', '<?php echo $image_url;?>');
});
</script>	
<div id="galleryheader">
	<h1 onclick="load_html('content', '<?php echo $GEN_URL_SERVIDOR?>/include/members/gallery/gallery.php?no_page='+current_gallery_page+'&user_id=<?php echo $user_id?>')">Gallery</h1>
</div>
<div id="gallery" >
	<div class="loading" id="picture"></div>
    <div id="pager" class="singlepic"> 
        <?php 
        if(($no_page-1)>=0){?>
        <div id="back" onClick="javascript: load_html('content', '<?php echo $GEN_URL_SERVIDOR?>/include/members/gallery/show_picture.php?no_page=<?php echo ($no_page-1);?>&user_id=<?php echo $user_id?>')" >
			<div onClick="javascript:;" class="backbutton"></div>
		</div>
        <?php }?>
        <?php if(($no_page+1)<$total_pictures){?>
        <div  id="next" onClick="javascript: load_html('content', '<?php echo $GEN_URL_SERVIDOR?>/include/members/gallery/show_picture.php?no_page=<?php echo ($no_page+1);?>&user_id=<?php echo $user_id?>')" >
			<div onClick="javascript:;" class="nextbutton"></div>
		</div>
        <?php }?>
    </div>
	<div id="comments">
		
	</div>
	 	
	<div id="picture_details">
		<div id="picture_description">
	    <?php if($row['description']=="" && $user_id==$GEN_USER_ID){?>
	    	<form id="form_picture_description">
		    	<input style="width:500px;" id="description_picture" class="text " type="text" value="Describe esta foto" />
	            <input type="hidden" id="hash" value="<?php echo  $row['hash']?>" />
	        </form>
	    <?php }else{?>
	    	<?php echo $row['description']?>
		<?php }?>    
	    </div>
    	<div id="picture_date">Addded on <?php echo $row['date1'];?></div>
	   
	</div>
</div>

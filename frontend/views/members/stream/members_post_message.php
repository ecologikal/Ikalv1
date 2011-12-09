<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>

<?php 

$member_stream_id=isset($_POST['member_stream_id']) ? $_POST['member_stream_id'] : 0;
$from_user_id=isset($_POST['from_user_id']) ? $_POST['from_user_id'] : 0;
$to_user_id=isset($_POST['to_user_id']) ? $_POST['to_user_id'] : 0;
$category_id=isset($_POST['category_id']) ? $_POST['category_id'] : 0;
$message=isset($_POST['message']) ? $_POST['message'] : "";
$rate_value=isset($_POST['rate_value']) ? $_POST['rate_value'] : 0;
$hash=isset($_POST['hash']) ? $_POST['hash'] : "";
$command=isset($_POST['command']) ? $_POST['command'] : "";


if(!$GEN_USER_ID){echo "not logged";exit;}

if( $command == "karma_update" && $GEN_USER_ID && $member_stream_id){
	$sql="Select sr1.c, sr2.c from (select count(members_stream_id) as c from stream_rate Where members_stream_id=$member_stream_id And value=1) sr1 inner join (select count(members_stream_id) as c from stream_rate Where members_stream_id=$member_stream_id And value=-1) sr2 ";
	$rst=mysql_query($sql, $ecologikal);
	$row=mysql_fetch_array($rst);
	if(mysql_affected_rows($ecologikal))echo $row[0]." Dharma ".$row[1]." Karma";exit();
}

if( $command == "rate_message" && $GEN_USER_ID && $member_stream_id){
	$sql="Insert Into stream_rate  (date, user_id, members_stream_id,value) Values(now(), $GEN_USER_ID, $member_stream_id, $rate_value)";
	$rst=mysql_query($sql, $ecologikal);
	if(mysql_affected_rows($ecologikal))echo "RATED";exit();
}
if( $command == "unrate_message" && $GEN_USER_ID && $member_stream_id){
	$sql="Delete From stream_rate Where members_stream_id=$member_stream_id And user_id=".$GEN_USER_ID;
	$rst=mysql_query($sql, $ecologikal);
	if(mysql_affected_rows($ecologikal))echo "UNRATED";exit();
}

if($command == "remove_message" && $GEN_USER_ID){
	$sql="Select * From members_stream Where members_stream_id=$member_stream_id";
	$rst = mysql_query($sql, $ecologikal);
	if(mysql_num_rows($rst)){
		$row=mysql_fetch_assoc($rst);
		if($row['members_stream_parent_id']==0 and ($row['from_user_id']==$GEN_USER_ID or $row['to_user_id']==$GEN_USER_ID))
			$sql="Delete From members_stream Where members_stream_id=$member_stream_id OR members_stream_parent_id=$member_stream_id";

		if(!$row['members_stream_parent_id']==0 and ($row['from_user_id']==$GEN_USER_ID or $row['to_user_id']==$GEN_USER_ID))
			$sql="Delete From members_stream Where members_stream_id=$member_stream_id ";
		$rst=mysql_query($sql, $ecologikal);
		if(mysql_affected_rows($ecologikal)>0)echo "REMOVED";
	}
	exit();
}
if(($command == "post_message") && ($from_user_id == $GEN_USER_ID)){

	$sql="Insert Into members_stream(from_user_id,to_user_id, members_stream_parent_id, skill_category_id,date,date2,message,hash) Values($from_user_id,$to_user_id,$member_stream_id, $category_id,now(),now(),".GetSQLValueString($message,'text').",".GetSQLValueString($hash,'text').")";
	$rst = mysql_query($sql, $ecologikal);
	$rst= mysql_query("Select * from members_stream where members_stream_id=LAST_INSERT_ID();", $ecologikal) or die(mysql_error());
	$row=mysql_fetch_assoc($rst);
	$message=$row['message'];

	$f_url=find_url($message);
	$yt_url=get_youtube_videos($message);
	if($f_url)$message=$f_url;
	$message.=$yt_url;

	$image_path_profile_mini= _MEMBER_PICS_PATH_.members_get_info("hash",$from_user_id)."/profile_mini.jpg";
	$image_url_profile_mini= _MEMBER_PICS_URL_.members_get_info("hash",$from_user_id)."/profile_mini.jpg";
	if(!file_exists($image_path_profile_mini))$image_url_profile_mini=_IMAGES_URL_."avatar_mini.png";

	$image_path_profile_mini2= _MEMBER_PICS_PATH_.members_get_info("hash",$from_user_id)."/profile_mini2.jpg";
	$image_url_profile_mini2=_MEMBER_PICS_URL_.members_get_info("hash",$from_user_id)."/profile_mini2.jpg";
	if(!file_exists($image_path_profile_mini2))$image_url_profile_mini2=_IMAGES_URL_."/avatar_mini2.png";
	if($rst){
		$link_remove="";
		if($member_stream_id){
			if($row['from_user_id']==$GEN_USER_ID or $row['to_user_id']==$GEN_USER_ID){
				$link_remove="<div id=\"remove\" onclick=\"javascript:remove_comment(".$row['members_stream_id'].",'comment_".$row['members_stream_id']."');\" ><span class=\"ui-icon ui-icon-closethick\" ></span></div>";
			}
			echo "
				<div class=\"sub_comment\" id=\"comment_".$row['members_stream_id']."\">
					<div id=\"karma\">0 Dharma 0 Karma </div>
					<div class=\"avatar\"><img src=\"".$image_url_profile_mini2."\">
						<div class=\"category\"></div>
					</div>
					<div class=\"comment_text\">
						<div id=\"member_link\"><a href=\""._VIEWS_URL_."/member_profile.php?user_id=".$from_user_id."\">".members_get_info("nombre",$from_user_id) . " " . members_get_info("apellido",$from_user_id)."</a>
						&nbsp;<span id=\"timestamp\"><abbr class=\"timeago\" title=\"".$row['date']."\">".$row['date']."</abbr></span></div>
						$link_remove
						".$message."
					</div>
					<div id=\"categorize\">
						<span id=\"select_category\"><select><option>Test</option></select></span>
					</div>
				</div>";
		}else{
		if($row['from_user_id']==$GEN_USER_ID or $row['to_user_id']==$GEN_USER_ID){
			$link_remove="<div id=\"remove\"  onclick=\"javascript:remove_comment(".$row['members_stream_id'].",'comments_list_".$row['members_stream_id']."');\" ><span class=\"ui-icon ui-icon-closethick\" ></span></div>";
		}
			echo "
<div id=\"comments_list_". $row['members_stream_id']."\"><!--comments_list+id-->
	<div id=\"comments\"><!--comments-->
		<div class=\"comment\" id=\"comment_". $row['members_stream_id']."\"><!--comment-->
			<div id=\"karma\">Karma: 0 Useful 0 Unuseful </div>
			<div class=\"avatar\"><!--avatar-->
				<img src=\"".$image_url_profile_mini."\">
				<div class=\"category\"><div id=\"category_id_".$category_id."\"></div></div>
			</div><!--avatar-->
			<div class=\"comment_text\"><!--comment_text-->
				<div id=\"member_link\">
					<a href=\""._VIEWS_URL_."/member_profile.php?user_id=".$from_user_id."\">".members_get_info("nombre",$from_user_id) . " " . members_get_info("apellido",$from_user_id)."</a>
					<span id=\"timestamp\"><abbr class=\"timeago\" title=\"".$row['date']."\">".$row['date']."</abbr></span>
				</div><!--member_link-->
				$link_remove
				".$message."
			</div><!--comment_text-->
			<div id=\"categorize\"><!--categorize-->
				<span id=\"select_category\"><select><option>Test</option></select></span>
			</div><!--categorize-->
		</div><!--comment-->
		<div class=\"comment_link\" id=\"link_comment_form_".$row['members_stream_id']."\" onclick=\"javascript:put_comment_form(".$row['members_stream_id'].");\">Comentar</div>
	</div><!--comments-->
</div><!--comments_list-->
";
		}
	}else{
		echo "Error:" . mysql_error();
	}
}
codeExit:
  mysql_close($ecologikal);
?>

<script type="text/javascript"> 
	$(function() {
		$(".oembed").oembed(null, 
			{
			disallowedProviders: ["youtube","vimeo"],
			embedMethod: "append", 
			maxWidth: 320,
			maxHeight: 240,
			vimeo: { autoplay: false, maxWidth: 320, maxHeight: 240}			
			});
			$("abbr.timeago").timeago();
	});
</script> 
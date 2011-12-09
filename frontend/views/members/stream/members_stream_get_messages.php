<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>

<script type="text/javascript" src="<?php echo _PLUGINS_URL_;?>jquery.oembed/jquery.oembed.js"></script>

<script src="<?php echo _PLUGINS_URL_?>jquery.timeago/jquery.timeago.js"></script>
<script src="<?php echo _PLUGINS_URL_?>jquery.timeago/jquery.timeago.es.js"></script>

<script type="text/javascript"> 
	$(function() {
		$(".oembed").oembed(null, 
			{
			disallowedProviders: ["youtube", "vimeo"],
			embedMethod: "append", 
			maxWidth: 320,
			maxHeight: 240,
			vimeo: { autoplay: false, maxWidth: 320, maxHeight: 240}			
			});
  			//$("abbr.timeago").livequery(function () { $(this).timeago(); });
			$("abbr.timeago").timeago();
	});
</script> 

<?php 
	$pager="";
	$no_page="";
	
	
	if(isset($_GET['user_id'])) $user_id=$_GET['user_id'];
	if(isset($_GET['no_page'])) $no_page=$_GET['no_page'];

	if(isset($_POST['user_id'])) $user_id=$_POST['user_id'];
	if(isset($_POST['no_page'])) $no_page=$_POST['no_page'];
	
	if(isset($_SESSION['user_id'])) $user_id=$_SESSION['user_id'];
	if(isset($_SESSION['no_page'])) $no_page=$_SESSION['no_page'];


	
	$sql="Select Count(members_stream_id) From members_stream where to_user_id=".$user_id." And members_stream_parent_id=0 Order By date DESC";
	$rst= mysql_query($sql, $ecologikal) or die(mysql_error());
	$row=mysql_fetch_array(	$rst );
	$total_comments=$row[0];
	if($total_comments>10){
		if(!$no_page){
			$no_page=0;
		}
		$pager=" Limit ".($no_page*10).", 10";
		
	}else{
	}
//	$sql_stream_messages="Select *,date_format(date,'%d-%b-%Y %H:%i') as time1, date_format(date,'%d-%b-%Y') as time2,date_format(date,'%Y-%m-%d %H:%i') as date2 From members_stream where to_user_id=$user_id And members_stream_parent_id=0 Order By date DESC $pager";
	$sql_stream_messages="SELECT ms.*,date_format(ms.date,'%d-%b-%Y %H:%i') as time1, date_format(ms.date,'%d-%b-%Y') as time2,
		date_format(ms.date,'%Y-%m-%d %H:%i') as date2,sr1.c as useful, sr2.c as unuseful,sr3.rated FROM
			members_stream ms left join 
			(select members_stream_id, count(members_stream_id) as c from stream_rate where value=1 group by members_stream_id) sr1 
				on ms.members_stream_id=sr1.members_stream_id left join (
			select members_stream_id, count(members_stream_id) as c from stream_rate where value=-1  group by members_stream_id) sr2 
				on ms.members_stream_id=sr2.members_stream_id left join 
					(select members_stream_id,value as rated from stream_rate Where user_id=$GEN_USER_ID group by members_stream_id) sr3 
						on ms.members_stream_id=sr3.members_stream_id 
 			Where (ms.to_user_id=$user_id)And ms.members_stream_parent_id=0
			Group by ms.members_stream_id Order by ms.members_stream_id desc $pager";

	$rst_stream_messages = mysql_query($sql_stream_messages, $ecologikal) or die(mysql_error());
	if(mysql_num_rows($rst_stream_messages)){
		while($row_stream_messages=mysql_fetch_assoc($rst_stream_messages)){
			if(file_exists($GEN_PATH_MEMBERS_PICTURES.members_get_info("hash",$row_stream_messages['from_user_id'])."/profile_mini.jpg")){
				$image_url_profile_mini=$GEN_URL_MEMBERS_PICTURES.members_get_info("hash",$row_stream_messages['from_user_id'])."/profile_mini.jpg";
			}else{
				$image_url_profile_mini=_HOME_URL_."/images/avatar_mini.png";
			}
			?>
            <div id="comments_list_<?php echo $row_stream_messages['members_stream_id']?>">
	            <div id="comments">
    		        <div class="comment" id="comment_<?php echo $row_stream_messages['members_stream_id']?>">
                        <div id="reaction_points" <?php if((int)$row_stream_messages['rated']){?> style="display:none"<?php }?>>
                            <div id="plus" onclick="javascript:rate_message(<?php echo $row_stream_messages['members_stream_id']?>,1)"><span class = "ui-icon ui-icon-plus" ></span><span class="tooltip">Dharma</span></div>
                            <div id="minus" onclick="javascript:rate_message(<?php echo $row_stream_messages['members_stream_id']?>,-1)"><span class = "ui-icon ui-icon-minus" ></span><span class="tooltip">Karma</span></div>
                        </div>
                        <div id="rated"  <?php if(!(int)$row_stream_messages['rated']){?> style="display:none"<?php }?> onclick="javascript:rate_message(<?php echo $row_stream_messages['members_stream_id']?>,0)">Unrate</div>
                    	<div id="karma"><?php echo (int)$row_stream_messages['useful']?> Dharma <?php echo (int)$row_stream_messages['unuseful']?> Karma </div>
                        <div class="avatar"><a href="<?php echo _HOME_URL_."/profile.php?user_id=".$row_stream_messages['from_user_id'];?>"><img src="<?php echo $image_url_profile_mini;?>"></a>
                            <div class="category"><div id="category_id_<?php echo $row_stream_messages['skill_category_id'];?>"></div></div>
                        </div>
                        <div class="comment_text">
                            <div id="member_link"><a href="<?php echo _HOME_URL_."/profile.php?user_id=".$row_stream_messages['from_user_id'];?>"><?php echo members_get_info("nombre",$row_stream_messages['from_user_id']) . " " . members_get_info("apellido",$row_stream_messages['from_user_id'])?></a>&nbsp;<span id="timestamp"><abbr class="timeago" title="<?php echo $row_stream_messages['date2']?>"><?php echo $row_stream_messages['date2']?></abbr></span></div>
                         <?php if($row_stream_messages['from_user_id']==$GEN_USER_ID or $row_stream_messages['to_user_id']==$GEN_USER_ID){?>
						<div id="remove" onclick="javascript:remove_comment(<?php echo $row_stream_messages['members_stream_id']?>,'comments_list_<?php echo $row_stream_messages['members_stream_id']?>');" ><span class="ui-icon ui-icon-closethick" ></span></div>
                       	<?php }?>
                            
                           <?php
                        	$f_url=find_url($row_stream_messages['message']);
							$yt_url=get_youtube_videos($row_stream_messages['message']);
                            if($f_url){
                            	$t=$f_url;
                               }else{
                               	$t=htmlentities($row_stream_messages['message']);
                               }
                           echo $t.$yt_url?>
                        </div>
                        <div id="categorize">
                            <span id="select_category"><select><option>Test</option></select></span>
                        </div>
                    </div><!--comment-->
                    <div id="sub_comments_list_<?php echo $row_stream_messages['members_stream_id']?>">
				<?php 
				$sql="Select Count(members_stream_id) as counter From members_stream Where members_stream_parent_id =".$row_stream_messages['members_stream_id'];
				$rst= mysql_query($sql, $ecologikal) or die(mysql_error());
				$row=mysql_fetch_array($rst);
				$no_sub_comments=$row[0];
				$limit="";
				if($no_sub_comments>3){
					echo "<div class=\"no_sub_comments\" onclick=\"javascript:get_sub_comments(".$row_stream_messages['members_stream_id'].");\" id=\"no_sub_comments_".$row_stream_messages['members_stream_id']."\">Ver los ".$no_sub_comments." comentarios</div>";
					$limit=" Limit ".($no_sub_comments-3).", 3";
                }

	$sql_stream_sub_messages="SELECT ms.*,date_format(ms.date,'%d-%b-%Y %H:%i') as time1, date_format(ms.date,'%d-%b-%Y') as time2,
		date_format(ms.date,'%Y-%m-%d %H:%i') as date2,sr1.c as useful, sr2.c as unuseful,sr3.rated FROM
			members_stream ms left join 
			(select members_stream_id, count(members_stream_id) as c from stream_rate where value=1 group by members_stream_id) sr1 
				on ms.members_stream_id=sr1.members_stream_id left join (
			select members_stream_id, count(members_stream_id) as c from stream_rate where value=-1  group by members_stream_id) sr2 
				on ms.members_stream_id=sr2.members_stream_id left join 
					(select members_stream_id,value as rated from stream_rate Where user_id=$GEN_USER_ID group by members_stream_id) sr3 
						on ms.members_stream_id=sr3.members_stream_id 
 			Where members_stream_parent_id =".$row_stream_messages['members_stream_id'] ." And ms.members_stream_parent_id>=0
			Group by ms.members_stream_id Order by ms.members_stream_id asc $limit";
//			echo $sql_stream_sub_messages." //////";

//				$sql_stream_sub_messages="Select *,date_format(date,'%d-%b-%Y %H:%i') as time1,date_format(date,'%m-%d-%Y %H:%i') as date2  From 
//				members_stream where members_stream_parent_id =".$row_stream_messages['members_stream_id'] ." and members_stream_parent_id>0 $limit";

				$rst_stream_sub_messages = mysql_query($sql_stream_sub_messages, $ecologikal) or die(mysql_error());
				$no_sub_comments=mysql_num_rows($rst_stream_sub_messages);

				while($row_sub_comments=mysql_fetch_assoc($rst_stream_sub_messages)){
					if(file_exists($GEN_PATH_MEMBERS_PICTURES.members_get_info("hash",$row_sub_comments['from_user_id'])."/profile_mini2.jpg")){
						$image_url_profile_mini=$GEN_URL_MEMBERS_PICTURES.members_get_info("hash",$row_sub_comments['from_user_id'])."/profile_mini2.jpg";
					}else{
						$image_url_profile_mini=_HOME_URL_."/images/avatar_mini2.png";
					}
					$message2=$row_sub_comments['message'];
					$f_url=find_url($message2);
					$yt_url=get_youtube_videos($message2);
					if($f_url)$message2=$f_url;
					$message2.=$yt_url;
						?>
					<div class="sub_comment" id="comment_<?php echo $row_sub_comments['members_stream_id']?>">
                        <div id="reaction_points" <?php if((int)$row_sub_comments['rated']){?> style="display:none"<?php }?>>
                            <div id="plus" onclick="javascript:rate_message(<?php echo $row_sub_comments['members_stream_id']?>,1)"><span class = "ui-icon ui-icon-plus" ></span><span class="tooltip"><?php echo LANGUAGE_MEMBERS_TEXT_USEFUL;?></span></div>
                            <div id="minus" onclick="javascript:rate_message(<?php echo $row_sub_comments['members_stream_id']?>,-1)"><span class = "ui-icon ui-icon-minus" ></span><span class="tooltip"><?php echo LANGUAGE_MEMBERS_TEXT_NOT_USEFUL;?></span></div>
                        </div>
                        <div id="rated"  <?php if(!(int)$row_sub_comments['rated']){?> style="display:none"<?php }?> onclick="javascript:rate_message(<?php echo $row_sub_comments['members_stream_id']?>,0)">Unrate</div>
                    	<div id="karma"><?php echo (int)$row_sub_comments['useful']?> Dharma <?php echo (int)$row_sub_comments['unuseful']?> Karma </div>
						<div class="avatar"><a href="<?php echo _VIEWS_URL_."members/member_profile.php?user_id=".$row_sub_comments['from_user_id'];?>"><img src="<?php echo $image_url_profile_mini;?>"></a>
							<div class="category"></div>
						</div>
						<div class="comment_text">
							<div id="member_link"><a href="<?php echo _VIEWS_URL_."members/member_profile.php?user_id=".$row_sub_comments['from_user_id'];?>"><?php echo members_get_info("nombre",$row_sub_comments['from_user_id']) . " " . members_get_info("apellido",$row_sub_comments['from_user_id'])?></a>
							&nbsp;<span id="timestamp"><abbr class="timeago" title="<?php echo $row_sub_comments['date2']?>"><?php echo $row_sub_comments['date2']?></abbr></span></div>
							 <?php if($row_sub_comments['from_user_id']==$GEN_USER_ID or $row_sub_comments['from_user_id']==$GEN_USER_ID or $row_sub_comments['to_user_id']==$GEN_USER_ID){?>
							<div id="remove" onclick="javascript:remove_comment(<?php echo $row_sub_comments['members_stream_id']?>,'comment_<?php echo $row_sub_comments['members_stream_id']?>');" ><span class="ui-icon ui-icon-closethick" ></span></div>
						   <?php }?>
							<?php echo $message2?> 
						</div>
						<div id="categorize">
							<span id="select_category"><select><option>Test</option></select></span>
						</div>
					</div><!--sub_comment-->
				<?php
                }
                ?>
                </div>
        <div class="comment_link" id="link_comment_form_<?php echo $row_stream_messages['members_stream_id']?>" onclick="javascript:put_comment_form(<?php echo $row_stream_messages['members_stream_id']?>);"><?php echo LANGUAGE_MEMBERS_TEXT_COMMENT;?></div>
		</div><!--comments-->
    </div><!--comments_list_<?php echo $row_stream_messages['members_stream_id']?>-->
	<?php
    }}
    ?>
    <?php
	$no_page++;
	if($pager){
		if(($no_page * 10) < $total_comments){?>

	    <div onclick="javascript: show_more_comments('no_page=<?php echo $no_page;?>&user_id=<?php echo $user_id?>')" id="show_more_comments"><?php echo LANGUAGE_MEMBERS_TEXT_SEE_MORE_COMMENT;?></div>
    <?php }else{?>
		    <div  id="no_more_comments"><?php echo LANGUAGE_MEMBERS_TEXT_NOT_MORE_COMMENT;?></div>
	<?php }?>
<?php }?>
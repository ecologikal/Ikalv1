<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery("abbr.timeago").timeago();
});
</script>
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>

<?php 
	$user_id=isset($_GET['user_id']) ? $_GET['user_id'] : $GEN_USER_ID;
	$member_stream_id=isset($_POST['member_stream_id']) ? $_POST['member_stream_id'] : 0;
		$sql_sub_comments="SELECT ms.*,date_format(ms.date,'%d-%b-%Y %H:%i') as time1, date_format(ms.date,'%d-%b-%Y') as time2,
			date_format(ms.date,'%Y-%m-%d %H:%i') as date2,sr1.c as useful, sr2.c as unuseful,sr3.rated FROM
				members_stream ms left join 
				(select members_stream_id, count(members_stream_id) as c from stream_rate where value=1 group by members_stream_id) sr1 
					on ms.members_stream_id=sr1.members_stream_id left join (
				select members_stream_id, count(members_stream_id) as c from stream_rate where value=-1  group by members_stream_id) sr2 
					on ms.members_stream_id=sr2.members_stream_id left join 
						(select members_stream_id,value as rated from stream_rate Where user_id=$GEN_USER_ID group by members_stream_id) sr3 
							on ms.members_stream_id=sr3.members_stream_id 
	 			Where members_stream_parent_id = $member_stream_id And ms.members_stream_parent_id>=0
				Group by ms.members_stream_id Order by ms.members_stream_id ASC ";
	

//$sql_sub_comments="Select *,date_format(date,'%d-%b-%Y %H:%i') as time1, date_format(date,'%d-%b-%Y') as time2,date_format(date,'%Y-%m-%d %H:%i') as date2 From members_stream where members_stream_parent_id=$member_stream_id Order By date ASC";
$rst_sub_comments = mysql_query($sql_sub_comments, $ecologikal) or die(mysql_error());
if(mysql_num_rows($rst_sub_comments)){
	while($row_sub_comments=mysql_fetch_assoc($rst_sub_comments)){
		if(file_exists($GEN_PATH_MEMBERS_PICTURES.members_get_info("hash",$row_sub_comments['from_user_id'])."/profile_mini2.jpg")){
			$image_url_profile_mini=$GEN_URL_MEMBERS_PICTURES.members_get_info("hash",$row_sub_comments['from_user_id'])."/profile_mini2.jpg";
		}else{
			$image_url_profile_mini=_ROOT_URL_."/images/avatar.png";
		}
		?>
		<div class="sub_comment" id="comment_<?php echo $row_sub_comments['members_stream_id']?>">
            <div id="reaction_points" <?php if((int)$row_sub_comments['rated']){?> style="display:none"<?php }?>>
                <div id="plus" onclick="javascript:rate_message(<?php echo $row_sub_comments['members_stream_id']?>,1)"><span class = "ui-icon ui-icon-plus" ></span><span class="tooltip"><?php echo LANGUAGE_MEMBERS_TEXT_USEFUL;?></span></div>
                <div id="minus" onclick="javascript:rate_message(<?php echo $row_sub_comments['members_stream_id']?>,-1)"><span class = "ui-icon ui-icon-minus" ></span><span class="tooltip"><?php echo LANGUAGE_MEMBERS_TEXT_NOT_USEFUL;?></span></div>
            </div>
            <div id="rated"  <?php if(!(int)$row_sub_comments['rated']){?> style="display:none"<?php }?> onclick="javascript:rate_message(<?php echo $row_sub_comments['members_stream_id']?>,0)">Unrate</div>
            <div id="karma"><?php echo (int)$row_sub_comments['useful']?> Dharma <?php echo (int)$row_sub_comments['unuseful']?> Karma </div>
			<div class="avatar"><a href="<?php echo _ROOT_URL_."/profile.php?user_id=".$row_sub_comments['from_user_id'];?>"><img src="<?php echo $image_url_profile_mini;?>"></a>
				<div class="category"></div>
			</div>
			<div class="comment_text">
				<div id="member_link"><a href="<?php echo _ROOT_URL_."/profile.php?user_id=".$row_sub_comments['from_user_id'];?>"><?php echo members_get_info("nombre",$row_sub_comments['from_user_id']) . " " . members_get_info("apellido",$row_sub_comments['from_user_id'])?></a>
				&nbsp;<span id="timestamp"><abbr class="timeago" title="<?php echo $row_sub_comments['date2']?>"><?php echo $row_sub_comments['date2']?></abbr></span></div>
				 <?php if($row_sub_comments['from_user_id']==$GEN_USER_ID or $row_sub_comments['from_user_id']==$GEN_USER_ID or $row_sub_comments['to_user_id']==$GEN_USER_ID){?>
				<div id="remove" onclick="javascript:remove_comment(<?php echo $row_sub_comments['members_stream_id']?>,'sub_comment_<?php echo $row_sub_comments['members_stream_id']?>');" ><span class="ui-icon ui-icon-closethick" ></span></div>
			   <?php }?>
				<?php echo $row_sub_comments['message']?> 
			</div>
			<div id="categorize">
				<span id="select_category"><select><option>Test</option></select></span>
			</div>
		</div><!--sub_comment-->
<?php
}}
?>
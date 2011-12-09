<?php
 	$view = 'memberdir'; // This is for determining which scripts and css are going to be loaded
	include("header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php");
	
?>

<content>
	<h1>Member's Directory</h1>
	<?php $members = get_all_members();
			foreach ($members as $key => $value) { 
			$requested = members_check_request($_SESSION['user_id'], $members[$key]['user_id'], 'friendship');
			if ($members[$key]['user_id']!= $_SESSION['user_id']){?>
			<div class="member" onclick="location.href='<?php members_display_profile_url($members[$key]['user_id'])?> '">
				<input type="hidden" name="user_id" value="<?php echo $members[$key]['user_id']?>" id="user_id">
				<memberavatar onclick="location.href='<?php members_display_profile_url($members[$key]['user_id']) ?>'"><?php members_display_profile_thumb($members[$key]['user_id'])?></memberavatar>
				<name><a href="<?php members_display_profile_url($members[$key]['user_id']) ?>"><?php echo $members[$key]['nombre']. ' ' . $members[$key]['apellido']?></a> 
					<span class="friendsincommon"><?php echo members_get_friends_in_common($members[$key]['user_id'])?> friends in common</span>
				</name>
				<?php $flag = members_get_info("country",$members[$key]['user_id']); 
				if($flag){ ?>
				<location>
					<div class="flag">
						<?php display_country_flag($flag); ?>
					</div>
					<span class='countrytext'><?php echo members_get_info('country', $members[$key]['user_id']); ?></span>
				</location>
				<?php } ?>
					<?php $totalskills = members_get_total_skills($members[$key]['user_id']);
						if ($totalskills > 0){ ?>
						<div class="flower">
				<?php
						for($x=1; $x <8 ; $x++){ 
							$noskills = members_get_no_skills($members[$key]['user_id'], $x);
							if($noskills != 0){
								$percskills = $noskills/$totalskills*100;?>
								<div class="tiptip " style="background:<?php echo get_petal_color($x);?>;width:<?php echo $percskills ?>% "title="<?php echo members_get_no_skills($members[$key]['user_id'],$x)?> skills <br> <h2><?php echo members_get_petal_grade($members[$key]['user_id'], $x);?>%</h2>"></div>
						<?php	} // End if
						} //END for ?>
						</div>
					<?php } // End if?>
					
				
				<div id="reactionpoints" class="tiptip" title="Kin Balance (Alternative Currency)"><span class="icon kinsmall"></span><?php echo $members[$key]['user_kins']?></div>
				<div class="buttons">
					<?php if (!members_is_friend($members[$key]['user_id']) && $requested == false && $members[$key]['user_id'] != $_SESSION['user_id']){ ?>
							<button class="green addfriend iconspan"><span class="ui-icon ui-icon-plus"></span></button>

					<?php }
					if($requested && !members_is_friend($members[$key]['user_id'])){ ?>
							<span class="requested">Friendship Requested</span>
					<?php	} ?>
					<?php if(members_is_friend($members[$key]['user_id'])){ ?>
							<button class="green deletefriend tiptip" title="Delete from friends"><span class="ui-icon ui-icon-close"></span></button>
					<?php }?>
					<button class="green sendmessage tiptip" title="Send Message"><span class="ui-icon ui-icon-mail-closed"></span></button>
				</div><!--Buttons-->
			</div>	<!--member-->
	<?php	}//End if
		} // End Foreach?>
	
</content>

<?php include("footer.php")?>
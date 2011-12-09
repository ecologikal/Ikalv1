<?php
 	$view = 'memberdir'; // This is for determining which scripts and css are going to be loaded
	include("../../../header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php"); 
	$userid = $_SESSION['user_id']; // This determines the user id of the page being displayed?>
	
	<content>
		<h1><?php echo members_get_info('nombre', $userid)?>'s Notifications</h1>
		<?php $notfications = members_get_notifications($userid);
				if ($notifications != null){
				foreach ($notifications as $key => $value) {?>
					<div class="notification expanded <?php if ($notifications[$key]['status']== null){ echo "unread"; }?>"
						 			<?php 
										$type = $notifications[$key]['type'];
										if ($type == 'message'){ ?>
											onclick="location.href='<?php echo _VIEWS_URL_?>members/messages.php?messagefrom=<?php echo $notifications[$key]['userfrom']?>'"
									<?php }
										  if ($type == 'trip'){ ?>
											onclick ="location.href='<?php echo _VIEWS_URL_ ?>members/traveldiary.php?notifid=<?php echo $notifications[$key]['id']?>&user_id=<?php echo $notifications[$key]['userfrom']?>'"
									<?php } if ($type == 'pictag'){?>
												onclick ="$(this).parent().find('a.pic').trigger('click');"	
									<?php } ?>>
						<a class="iframe pic" href="<?php echo _VIEWS_URL_ ?>members/pictures/singlepicture.php?type=member&picid=<?php echo $notifications[$key]['item_id']?>&user_id=<?php echo $notifications[$key]['userfrom']?>"></a>
						
						<span class="icon delete"></span>
						<input type="hidden" name="userfrom" value="<?php echo $notifications[$key]['userfrom'] ?>" id="userfrom">
						<input type="hidden" name="userto" value="<?php echo $notifications[$key]['userto'] ?>" id="userto">
						<input type="hidden" name="id" value="<?php echo $notifications[$key]['id'] ?>" id="id">
						<abbr class="timeago" title="<?php echo $notifications[$key]['time'];?>"></abbr>
						<memberavatar><?php members_display_profile_thumb($notifications[$key]['userfrom'])?></memberavatar>
						<div class="name"><?php echo members_get_info('nombre', $notifications[$key]['userfrom']); echo " ".members_get_info('apellido', $notifications[$key]['userfrom']); ?></div>
						<div class="message"><?php echo $notifications[$key]['message']?></div>
						<?php if ($notifications[$key]['type']== 'friendship' && $notifications[$key]['status']!= 'read'){?>
							<div class="buttons">
								<button class="green accept">Accept</button><button class="green reject">Reject</button>
							</div>
							
						<?php }?>
					</div>
				
				
				<?php }
				}else{
					echo "<div class='nonewnotifications'>There are no Notifications</div>";
				}// End if?>
	</content>
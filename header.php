<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>
<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="utf-8" /> 
        <title>Ecologikal</title> 

		<?php if (function_exists('load_css_files')){ load_css_files($view);} ?>
		<?php if (function_exists('load_js_scripts')){ load_js_scripts($view);$js_loaded=true;} ?>

    </head> 
	    <body>
			<header>
						<toolbar>
							
							<account>
								<?php if (is_logged_in()){?>
								<div class="icon tiptip" id="account" title="My Account">
									<memberavatar>
										<?php
										members_display_profile_thumb($_SESSION['user_id']);
 										?>
										
									</memberavatar>
									<div class="membername"><?php echo members_get_info("usuario",$_SESSION['user_id'])?></div>
									<div class="dropdown"></div>
								</div>
								<div class="icon tiptip" id="notifications" title="Notifications">
									
									
								</div>
									
										<?php $notifications = members_get_notifications($_SESSION['user_id']);
											$nonotif = members_count_unread_notifications($_SESSION['user_id']);
											if($nonotif>0){ ?>
												<nomessages>
													<?php echo $nonotif; ?>
												</nomessages>
												<div id="notificationlist">
													<?php foreach ($notifications as $key => $value) { ?>
														<?php if ($notifications[$key]['status']== null){
															$type = $notifications[$key]['type'];
															if ($type!= 'friendship' && $type != 'message' && $type != 'trip'){
																members_update_notification_status_by_id($notifications[$key]['id'],'read');
															}	?>
															
															<div class="notification" <?php // make it clickable depending on the type of the notification 
																							if ($type== 'message'){ ?>
																							onclick ="location.href='<?php echo _VIEWS_URL_ ?>members/messages.php?messagefrom=<?php echo $notifications[$key]['userfrom']?>'"
																							<?php } if ($type== 'trip'){ ?>
																							onclick ="location.href='<?php echo _VIEWS_URL_ ?>members/traveldiary.php?notifid=<?php echo $notifications[$key]['id']?>&user_id=<?php echo $notifications[$key]['userfrom']?>'"	
																							<?php } if ($type == 'pictag'){?>
																										onclick ="$(this).parent().find('a.pic').trigger('click');"	
																							<?php } ?>>
																				<a class="iframe pic" href="<?php echo _VIEWS_URL_ ?>members/pictures/singlepicture.php?type=member&picid=<?php echo $notifications[$key]['item_id']?>&user_id=<?php echo $notifications[$key]['userfrom']?>"></a>
																
																<input type="hidden" name="userfrom" value="<?php echo $notifications[$key]['userfrom'] ?>" id="userfrom">
																<input type="hidden" name="userto" value="<?php echo $notifications[$key]['userto'] ?>" id="userto">
																<input type="hidden" name="id" value="<?php echo $notifications[$key]['id'] ?>" id="id">
																<memberavatar><?php members_display_profile_thumb($notifications[$key]['userfrom'])?></memberavatar>
																<div class="message">
																	<a href="<?php echo _VIEWS_URL_?>members/member_profile.php?user_id=<?php echo $notifications[$key]['userfrom'] ?>"><?php echo members_get_info('nombre',$notifications[$key]['userfrom']); ?></a>
																<?php echo $notifications[$key]['message'];?></div>
																<timeago><abbr class="timeago" title="<?php echo $notifications[$key]['time'];?>"></abbr></timeago>
																<?php if($notifications[$key]['type']=='friendship' ){?>
																	
																	<div class="buttons">
																		<button class="green accept">Accept</button><button class="green reject">Reject</button>
																	</div>
																<?php } //END IF ?>
															</div>
													<?php } //END FOREACh ?>
													<?php }//END IF?>
													<div class="viewall">
														<a href="<?php echo _VIEWS_URL_?>members/notifications.php">View All Notifications</a>
													</div>
												</div>
											<?php }else{?>
												<div id="notificationlist">
													<div class="notification">
														<div class="nonew">You have no new notifications</div>
													</div>
													<div class="viewall">
														<a href="<?php echo _VIEWS_URL_?>members/notifications.php">View All Notifications</a>
													</div>
												</div>	
											<?php } // Endif ?>	
									
								<div id="accountlist">
									<ul>
										<li onclick="location.href='<?=_VIEWS_URL_?>members/member_profile.php'"><a  class="accountelement" href="<?=_VIEWS_URL_?>members/member_profile.php">Profile</a></li>
										<li onclick="location.href='<?=_VIEWS_URL_?>members/settings.php'"><a  class="accountelement" href="#">Settings</a></li>
										<li onclick="location.href='?command=logout'"><a  class="accountelement" href="?command=logout">Log out</a></li>
									</ul>
								</div>
								<?php }else{
										 include(_ROOT_PATH_."login/login_form.php");
										?>
									<div id="login_btn" class="icon tiptip" title="Login"></div>
								<?php }?>
							</account>

						</toolbar>
						<logo onClick="load_html('content', '<?php echo $array_goto["profile"][1].$array_goto["profile"][2];?>?no_page='+current_gallery_page+'&user_id=<?php echo $user_id;?>')"></logo>
						<div id="quickpost">
							<button class="green postcontent" onclick="$('a.post').trigger('click');" >Post Content</button>
						</div><a href="<?php echo _VIEWS_URL_ ?>postcontent.php?username=carlosepp" class="post iframe" ></a>
			</header>
			<background></background>
<?php
 	$view = 'messages'; // This is for determining which scripts and css are going to be loaded
	include("../../../header.php"); 
	include(_VIEWS_PATH_."members/sidebar_left.php"); 
	$userid = $_SESSION['user_id']; // This determines the user id of the page being displayed
	if (isset($_GET['messagefrom'])){$from = $_GET['messagefrom']; members_update_notification_status($from, $userid, 'message', 'read');}else{ $from = false;}?>
	<script src="<?php echo _JS_URL_ ?>members/messagemain.js"></script>
	<content>
	<?php if ($from){?>
		<h1><?php echo members_get_info('nombre', $from)?>'s Message Box</h1>
		<div class="answer">
			<input type="hidden" name="to" value="<?php echo $from ?>" id="to">
			<textarea id="sendmessagesmall"></textarea>
			<button class="green sendmessagesmall">Send Message</button>
		</div>
		<?php 	$messages = members_get_messages_from($from);
				foreach ($messages as $key => $value) {
					$message = $messages[$key]['message'];
					$id = $messages[$key]['id'];
					$from = $messages[$key]['userfrom'];
					$to = $messages[$key]['userto'];
					$time = $messages[$key]['time'];
					$status = $messages[$key]['status'];?>
					<div class="messageitem" <?php if($status === null){ echo "class='unread'";}?>>
						<span class="icon delete deletemessage"></span>
						<input type="hidden" name="messageid" value="<?php echo $id ?>" id="messageid">
						<memberavatar onclick="location.href='<?php members_display_profile_url($from)?>'" class="tiptip" title="<?php echo members_get_info('nombre', $from) . " " . members_get_info('apellido', $from)?>"><?php members_display_profile_thumb($from);?></memberavatar>
						<timeago><abbr class="timeago" title="<?php echo $time ?>"></abbr></timeago>
						<div class="message"><?php echo $message; ?></div>
					</div>
				<?php }//END FOREaCH ?>
	<?php }else{?>
		<h1><?php echo members_get_info('nombre', $userid)?>'s Messages</h1>
		<?php $notfications = members_get_notifications($userid);
				if ($notifications != null){
				foreach ($notifications as $key => $value) {?>
					<div class="notification expanded <?php if ($notifications[$key]['status']== null){ echo "unread"; }?>">
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
		<?php } //end userfrom if?>
	</content>
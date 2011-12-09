<?php
require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");?>
<?php if (function_exists('load_js_scripts')){ load_js_scripts('singlepicture');} ?>
<?php if (function_exists('load_css_files')){ load_css_files('singlepicture');} ?>
<style>
	div.imagecontainer{
		text-align:center;
		background:#222;
		width:100%;
	}
	div.prev{
		top:60px;
		width:20%;
		min-height:50px;
		background:rgba(0,0,0,.4);
		position:absolute;
	}	
	div.next{
			top:60px;
			width:20%;
			height:300px;
			background:rgba(0,0,0,.4);
			position:absolute;
			right:0;
			min-height:50px;
	}
	div.comments{
		width:70%;
		float:left;
	}
	div.tags{
		width:27%;
		float:right;
	}
</style>
<?php 
	$type = $_GET['type'];
	$picid = $_GET['picid'];
	$userid = $_GET['user_id'];
	
	$prevpic = members_get_prev_pic($userid, $picid);
	$nextpic = members_get_next_pic($userid, $picid);
	
	if ($type == 'member'){
		
		$picture = members_get_picture_from_id($userid, $picid); ?>
	<div id="iframe">
			<h2><?php echo members_get_album_name($userid, $picture['album_id'])?></h2>
			<div class="imagecontainer">
				<?php if($prevpic){ ?><div class="prev" onclick = "location.href='?type=member&picid=<?php echo $prevpic ?>&user_id=<?php echo $userid?>'" >PREV PIC</div><?php } ?>
				<input type="hidden" name="picid" value="<?php echo $picid?>" id="picid">
				<img src="<?php echo $picture['url'] ?>">
				<?php if($nextpic){ ?><div class="next" onclick = "location.href='?type=member&picid=<?php echo $nextpic ?>&user_id=<?php echo $userid?>'" >NEXT PIC</div><?php } ?>
			</div>
			<div class="picinfo">
				<div class="description"><?php if ($picture['description']){ echo $picture['description'];}else{ echo "<button class='green adddesc'>Add Desc</button>";}?></div>
			</div>
		<div class="comments">
			<?php if(members_is_friend($_SESSION['user_id'])){?>
				<button class="green addcomment">Comment</button>
			<?php }
			$comments = members_get_picture_comments($picid);
			if ($comments){
				foreach ($comments as $key => $value) {
					$userfrom = $comments[$key]['user_from'];
					$time = $comments[$key]['time'];
					$message = $comments[$key]['message']?>
				<div class="comment">
					<memberavatar><?php members_display_profile_thumb($userfrom)?></memberavatar>
					<timeago><abbr class="timeago" title="<?php echo $time ?>"></timeago>
					<div class="message"><?php echo $message ?></div>
				</div>
			
		<?php 
				}// end foreach

		}?>
		</div>
		<div class="tags">
			<h4>People Tags</h4>
			<div class="peopletags">
				<?php $tags = members_get_picture_tags($picid);
					if ($tags){ ?>
				<ul class="as-selections" id="tags">
				
					<?php foreach ($tags as $key => $value) { ?>
						
						<li class="as-selection-item"><?php echo $tags[$key]['name']?></li>	
			<?php			} ?>
			
				</ul>
				<?php	}?>
			</div>
			<button class="green tagpeople">Tag People</button>
			<h4>Action Tags</h4>
			<button class="green tagactions">Tag People</button>
		</div>
	</div>
	
	<?php }// End if member?>
<script>
	picheight= $('.imagecontainer img').height();
	$('.prev, .next').css({ height: picheight});
	// Adding Comments
	$('button.addcomment').click(function(e){
		$(this).parent().prepend('<memberavatar><img src="'+USER_PIC_THUMB+'"></memberavatar><input type="text" id="message"/><button class="green postcomment">Post</button>');
		$('#message').focus();
		$('button.postcomment').click(function(e){
			message = $(this).parent().find('#message').val();
			if (message){
				$('#message').css({background: '#ccc'}).focus();
				picid = $('#picid').val();
				queryurl = BACKEND_URL + 'members/pictures/savecomment.php';
				$.post(queryurl, {picid:picid, message:message}, function(e){

				});
				$(this).after('<div class="comment"><memberavatar><img src="'+USER_PIC_THUMB+'"></memberavatar><timeago>Just Now</timeago><div class="message">'+message+'</div></div>');
				$('#message').val('');
			}else{
				$('#message').css({background: '#ff0044'}).focus();
			}
			
		});
		$(this).remove();
	});
	// Adding people tag
	$('button.tagpeople').click(function(e){
		$('#tags').remove();
		$(this).after('<input type="text" name="addfriends" value="" id="addfriends"><button class="green savepeople">Save Tags</button>');
		<?php if($tags){ ?>
		selectedData = {items:[
		<?php foreach ($tags as $key => $value) { ?>
			{id: '<?php echo $tags[$key]["user_id"] ?>', 
			nombre: '<?php echo $tags[$key]["name"] ?>'},
		<?php } ?>
		]};
		<?php } // end if tags?>
		
		queryurl = BACKEND_URL + '_general/getfriendslist.php';
		$('#addfriends').autoSuggest(queryurl,{ 
			selectedItemProp: 'nombre',
			selectedValuesProp: 'id',
			asHtmlID: 'friends',
		<?php if ($tags){ ?>
			preFill: selectedData.items,
		<?php } ?>
			searchObjProps: "nombre",
			startText: "Type Friend Name",
			minChars: 1,
			matchCase: false,
			//Adds country code to the list
			formatList: function(data,elem){
				var pic = data.pic, name = data.nombre;
				var new_elem = elem.html(pic +name);
				return new_elem;
			}
		}).watermark('Type Friend Name').focus();
		
		$('button.savepeople').click(function(e){
			queryurl = BACKEND_URL + 'members/pictures/savetags.php?type=people';
			picid = $('#picid').val();
			friends = $('#as-values-friends').val();
			$.post(queryurl, {picid:picid, friends:friends }, function(data){
				location.reload(true);
			});
		});
		
		$(this).remove();
	});
</script>


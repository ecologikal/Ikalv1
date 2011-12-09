<script>
	var current_stream_post=randomString();

	function karma_update(id){
		var dataString="command=karma_update"+
			"&member_stream_id="+id;
		$.ajax({
			type: "POST",
			url: "<?=_VIEWS_URL_?>members/stream/members_post_message.php",
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {
				//console.log(msg);
				$("#comment_"+id+" #karma").html(msg);
			}
		 });			
		return false;
	}
	function rate_message(id,v){
		var c="rate_message";
		if(v==0)c="unrate_message";
		var dataString="command="+c+
			"&user_id=<?php echo $GEN_USER_ID;?>"+
			"&member_stream_id="+id+
			"&rate_value="+v;
		$.ajax({
			type: "POST",
			url: "<?=_VIEWS_URL_?>members/stream/members_post_message.php",
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {
				//console.log(msg);
				if(msg=="RATED"){
					$("#comment_"+id+" #reaction_points").hide();
					$("#comment_"+id+" #rated").show();
				}
				if(msg=="UNRATED"){
					$("#comment_"+id+" #reaction_points").show();
					$("#comment_"+id+" #rated").hide();
				}
				karma_update(id);
			}
		 });			
		return false;
	}
	function show_more_comments(param){
		$("#show_more_comments").html("<img src='<?=_IMAGES_URL_?>ajax-loader.gif'>")
		$("#show_more_comments").append("<div id='loader'><img src='<?=_IMAGES_URL_?>ajax-loader.gif'> Cargando...</div>");
		var dataString=param;
		$.ajax({	
			type: "POST",
			url: "<?=_VIEWS_URL_?>members/stream/members_stream_get_messages.php",
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {
				//console.log(msg);
				$("#show_more_comments").remove()
				$("#stream_comments").append(msg);
			}
		 });			
		return false;
	}
	
	function get_sub_comments(id){
		var dataString="member_stream_id=" + id +
			"&command=get_sub_comments";
		$.ajax({
			type: "POST",
			url: "<?=_VIEWS_URL_?>members/stream/members_stream_get_sub_comments.php",
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {
				$("#sub_comments_list_"+id).html(msg);
				$("#no_sub_comments_"+id).remove();
			}
		 });			
		return false;
	}
	
	function remove_comment(id,obj_id){
		var dataString="member_stream_id=" + id +
			"&command=remove_message";
		$.ajax({
			type: "POST",
			url: "<?=_VIEWS_URL_?>members/stream/members_post_message.php",
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {
				//console.log(msg);
				if(msg=='REMOVED'){
					$('#'+obj_id).remove();
				}
			}
		 });			
		return false;
	}

	function put_comment_form(id){
		$("#link_comment_form_"+id).hide()
		if($("#post_comment_form"+id).length){
			$("#post_comment_form"+id).show();
		}else{
			var html_comment_form="<div id=\"post_comment_form"+id+"\"><form AUTOCOMPLETE=\"off\"  onsubmit=\"javascript:sub_message("+id+"); return false;\">"+
						   "<input  class=\"text ui-widget-content ui-corner-all\"  type=\"text\" id=\"post_"+id+"\" onblur=\"javascript:this.value='<?php echo LANGUAGE_MEMBERS_TEXT_WRITE;?>';$('#post_comment_form'+"+id+").hide();$('#link_comment_form_'+"+id+").show();\"  onfocus=\"javascript:if(this.value=='<?php echo LANGUAGE_MEMBERS_TEXT_WRITE;?>')this.value='';\" value=\"<?php echo LANGUAGE_MEMBERS_TEXT_WRITE;?>\" />"+
						   "<input AUTOCOMPLETE=\"off\" type=\"submit\" value=\"Enviar\" />"+
						"</form></div>";
			$(html_comment_form).insertAfter("#link_comment_form_"+id);
		}
		$("#post_"+id).focus();
	}
	function sub_message(id){
		$("#post_"+id).removeClass("ui-state-error" );
		if($("#post_"+id).val().length==0){
			$("#post_"+id).addClass( "ui-state-error" );
			updateTips("Escriba un comentario",0);
			$("#post_"+id).focus();
			setTimeout( function() {
				$("#post_"+id).removeClass( "ui-state-error" );
			}, 500 );
			return false;
		}

		var dataString="to_user_id=" + <?php echo $user_id?> +
			"&from_user_id=" + <?php echo $GEN_USER_ID?> +
			"&member_stream_id=" + id +
			"&message="+ $("#post_"+id).val() + 
			"&command=post_message" + 
			"&hash="+current_stream_post;
		$.ajax({
			type: "POST",
			url: "<?=_VIEWS_URL_?>members/stream/members_post_message.php",
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {
				if(msg=='Error'){
					$('#comments').prepend(msg);
					updateTips( "<?php echo LANGUAGE_MEMBERS_TEXT_ERROR;?>",0);
				}else {	
					updateTips( '<?php echo LANGUAGE_MEMBERS_TEXT_ADD_COMMENT;?>',1);
					$(msg).insertBefore("#link_comment_form_"+id);
					current_stream_post=randomString();
					$("#post_"+id).val('<?php echo LANGUAGE_MEMBERS_TEXT_WRITE;?>');
					$("#post_comment_form"+id).remove();
					$("#link_comment_form_"+id).show();
				}
			}
		 });			
		return false;
	}

	function stream_post(category_id){
		$("#stream_comment").removeClass("ui-state-error" );
		if($("#stream_comment").val().length==0){
			$("#stream_comment").addClass( "ui-state-error" );
			updateTips("Escriba un comentario",0);
			$('#stream_comment').focus();
			setTimeout( function() {
				$('#stream_comment').removeClass( "ui-state-error" );
			}, 500 );
			return false;
		}
		var dataString="to_user_id=" + <?php echo $user_id?> +
			"&from_user_id=" + <?php echo $GEN_USER_ID?> +
			"&category_id=" + category_id +
			"&message="+$("#stream_comment").val() + 
			"&command=post_message" + 
			"&hash="+current_stream_post;
			//console.log(dataString);
		$.ajax({
			type: "POST",
			url: "<?=_VIEWS_URL_?>members/stream/members_post_message.php",
			contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
			data: dataString,
			dataType: "html",
			success: function(msg) {

				if(msg=='Error'){
					$('#comments').prepend(msg);
					updateTips( "<?php echo LANGUAGE_MEMBERS_TEXT_ERROR;?>",0);
				}else {
					updateTips( '<?php echo LANGUAGE_MEMBERS_TEXT_WRITE;?>',1);
					$('#stream_comments').prepend(msg);
					current_stream_post=randomString();
					$("#stream_comment").val('');
				}
			}
		 });			
	}
	$(document).ready(function(e){
        //$("abbr.timeago").timeago();
		$("abbr.timeago").livequery(function () { $(this).timeago(); });
		$('#content').click(function(){ 
		        mouse_is_inside=true; 
		    });
		$('#content').hover(function(){ 
		        mouse_is_inside=true; 
		    }, function(){ 
		        mouse_is_inside=false; 
		    });

		    $("body").mouseup(function(){ 
		        if(! mouse_is_inside){
					$('#stream #postcomment').slideUp(300);
					$('#stream textarea').animate({
						height:'15'
					});
					$('div#profile_info').slideDown(400);
				} 
		    });
		
		$('#stream textarea').mouseup(function(){
			$(this).animate({
				height:'45'
			});
			$('#stream #postcomment').slideDown(300);
			$('div#profile_info').slideUp(400);
		});
		
		load_html("#stream_comments",'<?php echo _VIEWS_URL_?>members/stream/members_stream_get_messages.php?user_id=<?php echo $user_id;?>&q='+ 1*new Date());
	});
</script>
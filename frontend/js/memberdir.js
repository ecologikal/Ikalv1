$(document).ready(function(e){
	
	$('div.member .addfriend').click(function(e){
		USER_ID_VIEWING = $(this).parent().find('input#user_id').val();
		alert(USER_ID_VIEWING);
		$.post(BACKEND_URL+'members/requestfriendship.php', { user_to: USER_ID_VIEWING},function(data){
		});
		$(this).html('Friendship Request Sent');
	});
});
$(document).ready(function(e){
	$('textarea#sendmessagesmall').watermark('Please Type your Message Here').focus();
	// Send Message

	$('button.sendmessagesmall').live('click',function(e){
		message = $(this).parent().find('textarea#sendmessagesmall').val();
	   if (message === ''){
	   		$('textarea#sendmessagesmall').css({'border': '2px solid #992244', 'background':'#B3236C'}).focus();
	   }else{
	   		$('textarea#sendmessagesmall').css({'border': 'none', 'background':'#444'});
	
			friends = ","+ $('#to').val() + ","; // The commas is to comply with autosuggest format so in sendmessage.php the outer elements are not stripped out
			$.post(BACKEND_URL+'members/sendmessage.php', { friends: friends, message: message},function(data){
					location.reload();
			});
			
	   }
	});
});
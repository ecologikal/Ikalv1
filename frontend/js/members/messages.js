$(document).ready(function(e){
	queryurl = BACKEND_URL + '_general/getfriendslist.php';
	$('#users').autoSuggest(queryurl,{ 
		selectedItemProp: 'nombre',
		selectedValuesProp: 'id',
		asHtmlID: 'friends',
		preFill: selectedData.items,
		searchObjProps: "nombre",
		startText: "Add Friend",
		minChars: 1,
		matchCase: false,
		//Adds country code to the list
		formatList: function(data,elem){
			var pic = data.pic, name = data.nombre;
			var new_elem = elem.html(pic +name);
			return new_elem;
		}
	}).watermark('Add Friend').focus();
	$('textarea#sendmessage').watermark('Please Type your Message Here').focus();
	// Send Message

	$('button.sendmessage').live('click',function(e){
		message = $(this).parent().find('textarea#sendmessage').val();
	   if (message === ''){
	   		$('textarea#sendmessage').css({'border': '2px solid #992244', 'background':'#B3236C'}).focus();
	   }else{
	   		$('textarea#sendmessage').css({'border': 'none', 'background':'#444'});
	
			friends = $('input.as-values').val();
			$.post(BACKEND_URL+'members/sendmessage.php', { friends: friends, message: message},function(data){
					parent.location.reload();
			});
			
	   }
	});
});
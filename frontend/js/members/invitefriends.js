$(document).ready(function(e){
	queryurl = BACKEND_URL + '_general/getfriendslist.php';
	$('#users').autoSuggest(queryurl,{ 
		selectedItemProp: 'nombre',
		selectedValuesProp: 'id',
		asHtmlID: 'friends',
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
	$('button.invitefriends').click(function(e){
		tripid = $('#itemid').val();
		friends = $('#as-values-friends').val();
		$.post(BACKEND_URL+'members/invitefriends.php', { itemid: tripid , type: 'trip', friends: friends},function(data){
			window.parent.location.reload();
		});
		
	});
});
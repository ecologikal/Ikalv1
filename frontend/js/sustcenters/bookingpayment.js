$(document).ready(function(e){
	
	$('#phone').mask('(99) 999 99 99 999');
	$('input').watermark();
	
});
function detect_card(){
	var types = {
		Amex: [34,37],
		Visa: [4],
		Mastercard: [51, 52, 53, 54, 55],
		Discover: [6011]
	};
	//Loop the options and build a regexp
	$.each(types, function(i,opts){
		$.each(opts, function(i2,rexp){
			var re = new RegExp('^'+rexp);
			if ( $('#card_number').val().match(re) ) {
				//We have a match! Now find the correct card type
				$('#card_type > option').each(function(i3,elm){
					if ( $(elm).val() == i ) {
						$(elm).attr('selected', true);
					}
				});
			}
		});
	});
}
$(document).ready(function(e){
	//GENERAL FANCY STYLE
	$("a.attendees").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 240,
			'height'		: 300, 
			'overlayColor'	: '#000',
			'bgColor': '#000'
		});
	//PLACE VIBE BAR
	$('#reviews .barcontainer .value').each(function(e){
		value = $(this).text();
		$(this).css('width',value);
		//Change data bar color depending on grade
		value = parseInt(value);
		if (value >0 && value<50){
			$(this).css('background-color','#FF3333');
		}else{
			if(value>50 && value<75){
				$(this).css('background-color','#FF9933');
			}else{
				if(value>75 && value<90 ){
					$(this).css('background-color','#FFFF33');
				}else{
					if(value>90 && value<101){
						$(this).css('background-color','#99CC00');
					}
				}
			}
		}
	});
	//COMMENTS GRADE
	$('.grade').each(function(e){
		value = $(this).text();
		//Change data bar color depending on grade
		value = parseInt(value);
		if (value >0 && value<50){
			$(this).css('background-color','#FF3333');
		}else{
			if(value>50 && value<75){
				$(this).css('background-color','#FF9933');
			}else{
				if(value>75 && value<90 ){
					$(this).css('background-color','#FFFF33');
				}else{
					if(value>90 && value<101){
						$(this).css('background-color','#99CC00');
					}
				}
			}
		}
	});
	// WORKSHOPS
	$('workshop .titlebar').click(function(e){
		if ($(this).parent().height() == 52){
			$('workshop').animate({
				'height': '52px'
			},200);
			$(this).parent().animate({
				'height': '605px'
				},200);
			$('.triangle').removeClass('triangledown');
			$('.triangle').addClass('triangleright');
			$(this).find('.triangle').removeClass('triangleright');
			$(this).find('.triangle').addClass('triangledown');
		}else{
			$(this).parent().animate({
				'height': '52px'
			},200);
			$(this).find('.triangle').removeClass('triangledown');
			$(this).find('.triangle').addClass('triangleright');
		}
	});
	// MAsk to the Phone Field
	$('#phone').mask('(99) 999 99 99 999');
	$('input, textarea').watermark();
	$('select.health').change(function(e){
		if ($(this).val()=="Yes"){
			$(this).parent().parent().append('<textarea class="healthconditions" title="Please describe your health conditions"></textarea>');
			$('textarea.healthconditions').watermark().focus();
		}else{
			$('textarea.healthconditions').parent().remove();
			
		}
	});
});

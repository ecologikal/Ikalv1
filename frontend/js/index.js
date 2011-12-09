$(document).ready(function(e){
	$("a.introvideo").click(function() {
			$.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'none',
				'transitionOut'	: 'none',
				'title'			: this.title,
				'width'			: 900,
				'height'		: 510,
				'href'			: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
				'type'			: 'swf',
				'swf'			:{'allowfullscreen':'true',
									'title'			:'false'}
			});

			return false;
		});
	
			
});
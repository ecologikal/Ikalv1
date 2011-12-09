$(document).ready(function(e){
	$('#flower_btn').click(function(e){
			$('menucontents div.container:not(#flowercontainer)').fadeOut(100);
			$('#flowercontainer').slideDown(200);
	});
	$('#profile_btn').click(function(e){
			$('menucontents div.container:not(#profilecontainer)').fadeOut(100);
			$('#profilecontainer').slideDown(200);	
	});
	$('#stream_btn').click(function(e){
			$('menucontents div.container:not(#streamcontainer)').fadeOut(100);
			$('#streamcontainer').slideDown(200);
	});
	$('#gallery_btn').click(function(e){
			$('menucontents div.container:not(#gallerycontainer)').fadeOut(100);
			$('#gallerycontainer').slideDown(200);
	});
	$('#game_btn').click(function(e){
			$('menucontents div.container:not(#gamecontainer)').fadeOut(100);
			$('#gamecontainer').slideDown(200);
	});
	$('#travels_btn').click(function(e){
			$('menucontents div.container:not(#travelscontainer)').fadeOut(100);
			$('#travelscontainer').slideDown(200);
	});
	$('#projects_btn').click(function(e){
			$('menucontents div.container:not(#projectscontainer)').fadeOut(100);
			$('#projectscontainer').slideDown(200);
	});
	$('#events_btn').click(function(e){
			$('menucontents div.container:not(#eventscontainer)').fadeOut(100);
			$('#eventscontainer').slideDown(200);
	});
	//SELECT ELEMENTS
	$("select").change(function () {
	          $("option:selected").each(function () {
					if($(this).hasClass('post')) 	{}
					if($(this).hasClass('review')) 	{$('#review').css('display','block');}
					if($(this).hasClass('article')) {$('#article').css('display','block');}
					});
	        })
	        .trigger('change');
	
});
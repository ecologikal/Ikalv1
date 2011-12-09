
$(document).ready(function(e){
	width = $(window).width();

	// Booking Window
	$("a.booking").fancybox({
			'padding'		: 0,
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: width-100,
			'height'		: 600, 
			'overlayColor'	: '#000',
			'bgColor': '#000',
			'onClosed': function() { 
		   			parent.location.reload(true); 
		  		}
	 });
	$("a.fancylink").fancybox({
			'padding'		: 0,
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 600,
			'height'		: 300, 
			'overlayColor'	: '#000',
			'bgColor': '#000'
		});
		//More Info on sust center
		$("a.moreinfo").fancybox({
				'padding'		: 0,
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 900,
				'height'		: 500, 
				'overlayColor'	: '#000',
				'bgColor': '#000'
			});
	
	// Comment comments
	$("a.comment").fancybox({
			'padding'		: 0,
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 300,
			'height'		: 100, 
			'overlayColor'	: '#000',
			'bgColor': '#000'
		});
	// Services Fancyboxes
	$("#services a").fancybox({
			'padding'		: 0,
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 900,
			'height'		: 600, 
			'overlayColor'	: '#000',
			'bgColor': '#000'
		});
		$("#services a.vibe").fancybox({
				'padding'		: 0,
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 860,
				'height'		: 320, 
				'overlayColor'	: '#000',
				'bgColor': '#000'
			});
		$("#services a.flower").fancybox({
				'padding'		: 0,
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 860,
				'height'		: 600, 
				'overlayColor'	: '#000',
				'bgColor': '#000'
				});
		$("#services a.workshops").fancybox({
				'padding'		:0,
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 900,
				'height'		: 620, 
				'overlayColor'	: '#000',
				'bgColor': '#000'
				});
	
	
	$('.dharma').live('click', function(e){
		$(this).parent().html('<a class="unrate" href="#">Unrate</a>').tipTip();
	});
	$('.karma').live('click', function(e){
		$(this).parent().html('<a class="unrate" href="#">Unrate</a>').tipTip();
	});
	$('.unrate').live('click',function(e){
		
		$(this).parent().html('<div class="dharma tiptip" title="Give me some Dharma"></div><div class="karma tiptip" title="Bad Karma"></div>');
	});
	//Display Youtube Videos with Fancybox
	$("a.video").click(function() {
			$.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none',
				'overlayColor'	: '#000',
				'title'			: this.title,
				'width'			: 640,
				'height'		: 385,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
				'wmode'				: 'transparent',
				'allowfullscreen'	: 'true'
				}
			});
			return false;
	});
	// Petal Filter Animations
	$('.filters #category li').hover(function(e){
		if (!$(this).hasClass('selected')){
			$(this).find('a').stop().animate({ 'margin-left': '13px'},100);
		}
	},function(e){
		$(this).find('a').animate({ 'margin-left': '10px'});
	});
	//Type Filters Animation
	$('.filters #type li').hover(function(e){
		if (!$(this).hasClass('selected')){
			$(this).find('a').stop().animate({ 'margin-left': '5px'},100);
		}
	},function(e){
		$(this).find('a').animate({ 'margin-left': '8px'});
	});
	// Behavior when commenting an element
	$('#commenbutton').click(function(e){
		
	});
	//Changes the size of the elements depending on the Reaction Points
	$('#container .element').each(function(e){
		rp = $(this).find('.rp .val').html();
	
		if (rp < 1200){
			$(this).addClass('width1');
			$(this).addClass('height2');
		}
		else{ 
			if(rp < 1300){
				$(this).addClass('width1');
				$(this).addClass('height3');
			}else{ 
				if(rp < 1700){ 
					$(this).addClass('width2');
					$(this).addClass('height2');
				 }else{
					if(rp < 2000){ 
						$(this).addClass('width2');
						$(this).addClass('height3');
					 }

				}
			}
		}
		
	});
	// ISotope
	//Initialization 
	$('#container').isotope({
			itemSelector : '.element',
			sortAscending : false,
		  	masonry :{
				columnWidth:100
			},
			getSortData : {
				rp : function(e){
					return parseInt(e.find('.rp').text());
				},
				date : function(e){
					return parseInt(e.find('.timestamp').text());
				}
			}
	});
	
	//On click the object becomes large
	$('#container .element #titlecontainer, #container .element #memberpic').click(function(){
			$('#container .element').removeClass('large');
	        $(this).parent().toggleClass('large');
	        $('#container').isotope('reLayout');
	});
	
	// Filtering function
	$(function(){
		$('#sort-by .popularity').click(function(){
			$('#sort .appended').remove();
			$('#sort-direction .descending').html('Most Popular');
			$('#sort-direction .ascending').html('Least Popular');
		});
		$('#sort-by .dateadded').click(function(){
			$('#sort .appended').remove();
			$('#sort-direction .descending').html('Newest');
			$('#sort-direction .ascending').html('Oldest');
		});
		$('#sort-by .geolocation').click(function(){
			$('#sort .appended').remove();
			$('#sort-direction .descending').html('Closest');
			$('#sort-direction .ascending').html('Farthest');
			$('#sort-direction').append('<span class="appended"><select><option>Within 10</option><option>Within 40</option><option>Within 100</option></select><select><option>miles</option><option>km</option></select></span>');
		});
		$('#sort-by .relevance').click(function(){
			$('#sort .appended').remove();
			$('#sort-direction .descending').html('What I need');
			$('#sort-direction .ascending').html('What I like');
		});
		
		$('.filters a').click(function(){

				$(this).parent().parent().find('.selected').removeClass('selected');
				$(this).parent().addClass('selected');
				$('.off_filter').addClass('on').attr('title','Turn Off Filters').tipTip();


		  	var selector = $(this).attr('data-filter');
		  	$('#container').isotope({ filter: selector });
		  	return false;
		});
		$('.off_filter').click(function(e){
			$(this).toggleClass('on').attr('title','Filters are Off').tipTip();;
		});
		$('#sort-by a').click(function(){
			$(this).parent().parent().find('.selected').removeClass('selected');
			$(this).addClass('selected');
		  	var sortName = $(this).attr('href').slice(1);
		  	$('#container').isotope({ sortBy : sortName });
		  	return false;
		});
	});
	//Sort Ascending- Descending Function
	$(function(){	
		var $optionSets = $('.option-set'),
		$optionLinks = $optionSets.find('a');
		$optionLinks.click(function(){
			var $this = $(this);
			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
				return false;
			}
			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');
			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
			key = $optionSet.attr('data-option-key'),
			value = $this.attr('data-option-value');
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[ key ] = value;
			$('#container').isotope( options );
			return false;
		// On click change the size of the elements
		});
		
	
	});
	
	//Data Bars
	
	// DATA BARS
	$('.barcontainer .value').each(function(e){
		value = $(this).text();
		$(this).css('width',value);
		//Change data bar color depending on grade
		value = parseInt(value);
		if (value >25 && value<50){
			$(this).css('background-color','#FF3333');
		}else{
			if(value>50 && value<75){
				$(this).css('background-color','#FF9933');
			}else{
				if(value>75 && value<90 ){
					$(this).css('background-color','#FFFF33');
				}else{
					if(value>90 && value<100){
						$(this).css('background-color','#99CC00');
					}
				}
			}
		}
	});
	// If button is not clicked show the input fields for selecting dates
	
	$('#booknow .invisiblebutton.notclicked').live('click', function(e){
		
		$(this).removeClass('notclicked').addClass('clicked');
		// Adds a watermark to the fields
		
		
		$(this).parent().append('<input type="text" readonly="true" id="date"/><input type="text" id="days" name="days" maxlength="2"/>');
		$('#days').watermark('days');
		$('#date').watermark('Select Date');
		$('#date').datepicker({
			dateFormat: 'd MM,yy',
			onClose: function(e){
				$('#days').val('');
				$('#days').focus();
			}
		}).focus();
		href=$(this).parent().find('a.booking').attr('href');
	});
	$('#days').live('keyup',function(event){
			
			
			if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 13) {
			            // let it happen, don't do anything
					if(event.keyCode == 13){
						$(this).parent().parent().find('.invisiblebutton').fadeOut(100);
						$(this).parent().parent().find('button a').html('Book Now').trigger('click');
					}
							
			    }
			        else {
			            // Ensure that it is a number and stop the keypress
			            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
							$(this).val('');
			            }else{
							$(this).parent().parent().find('.invisiblebutton').fadeOut(100);
							$(this).parent().parent().find('button a').html('Book Now');
						}   
			        }
	});
	$('#booknow button').click(function(e){
		thisparent = $(this).parent();
		date= thisparent.find('#date').val();
		days= parseInt(thisparent.find('#days').val());
		newurl = href+"&date="+date+"&days="+days;
		thisparent.find('a.booking').attr('href',newurl);
		if (days > 0 && date != ''){
			thisparent.find('a.booking').trigger('click');
		}else{
			e.preventDefault();
		}
	});

});
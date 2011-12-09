$(document).ready(function(e){
	
	
	$('button.acceptinvite').click(function(e){
		tripid = $(this).parent().parent().find('#tripid').val();
		$.post(BACKEND_URL+'members/answerinvite.php', { itemid: tripid , type: 'trip', status: 'confirmed'},function(data){
			window.location.reload();
		});
	});
	$('button.leavetrip').click(function(e){
		tripid = $(this).parent().parent().find('#tripid').val();
		$.post(BACKEND_URL+'members/answerinvite.php', { itemid: tripid , type: 'trip', status: 'rejected'},function(data){
			window.location.reload();
		});
	});
	$('a.invitefriends').fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'padding'		: 0,
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 700,
			'height'		: 500, 
			'overlayColor'	: '#000',
			'hideOnContentClick': false,
			'onClosed': function() { 
		   			parent.location.reload(true); 
		  		}
		});
		$('a.addpics').fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'padding'		: 0,
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 700,
				'height'		: 500, 
				'overlayColor'	: '#000',
				'hideOnContentClick': false,
				'onClosed': function() { 
			   			parent.location.reload(true); 
			  		}
			});
		$('a.picstop').fancybox({
			'padding': 0,
		});
	// Adds a new stop
		$('button.addstop').click(function(e){
			$(this).fadeOut(0);
			$(this).parent().find('#stops').append('<input id="address" type="text">');
			$('#address').autocomplete({
			            source: function() {
			              $("#map").gmap3({
			                action:'getAddress',
			                address: $(this).val(),
			                callback:function(results){
			                  if (!results) return;
			                  $('#address').autocomplete(
			                    'display', 
			                    results,
			                    false
			                  );
			                }
			              });
			            },
			            cb:{
			              cast: function(item){
			                return item.formatted_address;
			              },
			              select: function(item) {
							$('#tripform').remove();
							markerposition = item.geometry.location;
							$('#map').parent().find('#stops').append('<div id="tripform">'+
																		'<input type="text" name="stoptitle" value="" id="stoptitle" />'+
																		'<input type="text" name="stopdatefrom" value="" id="stopdatefrom" readonly="readonly">'+
																		'<input type="text" name="stopdays" value="" id="stopdays">'+
																		'<textarea name="stopdesc" id="stopdesc"></textarea>'+
																		'<button class="green savestop">Save Stop</button>'+
																		'</div>');
							$('#stopdays').watermark('No. Days');
							$('#stopdatefrom').datepicker({
									dateFormat: 'd MM,yy',
									onClose: function(e){
										$('#tripdays').focus();
									}
							}).watermark('Click to Select Date');
							$('#stoptitle').watermark('Stop Title').focus();
							$('#stopdesc').watermark('Describe your Stop');
							

			                $("#map").gmap3(
			                  {action:'clear', name:'marker'},
			                  {action:'addMarker',
			                    latLng:item.geometry.location,
			                    map:{center:true},
								options:{animation: google.maps.Animation.DROP}
			                  }
			                );
							latlng = item.geometry.location;
							latlng = String(latlng).replace(')','').replace('(','');;
							latlng = latlng.split(',');
							latitude = latlng[0];
							longitude = latlng[1];
							// POST Request to save Trip in database
							$('button.savestop').click(function(e){
								var 	title 		= $('#stoptitle').val(),
										description = $('#stopdesc').val(),
										datefrom 	= $('#stopdatefrom').val(),
										days 		= $('#stopdays').val(),
										address 	= $('#address').val(),
										tripid		= $('#tripid').val();
										
										// FIELD VALIDATION
										if(title == '' || description == '' || datefrom == '' || days == '' || !is_int(days)){
											if (!is_int(days)){
												$('#stopdays').css({background: '#B3236C', 'border': '2px solid #924'}).val('');
											}else{
												$('#stopdays').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(title == ''){
												$('#stoptitle').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#stoptitle').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(description == ''){
												$('#stopdesc').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#stopdesc').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(datefrom == ''){
												$('#stopdatefrom').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#stopdatefrom').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
											if(days == ''){
												$('#stopdays').css({background: '#B3236C', 'border': '2px solid #924'});
											}else{
												$('#stopdays').css({background: '#E6E6E6', 'border': '1px solid #999'});
											}
										}else{
											queryurl 	= BACKEND_URL + 'members/savestop.php';
											$.post(queryurl,{title:title, tripid:tripid, description:description, datefrom:datefrom, days:days, address: address, latitude: latitude, longitude:longitude}, function(data){
												window.location.reload();
											});
										}
							});
			              }

			            }
			          })
			          .watermark('Type an Address').focus();
		});
		
	// LEave a comment to a specific stop
	$('button.commentstop').live('click',function(e){
		$(this).parent().prepend('<memberavatar><img src="'+USER_PIC_THUMB+'"></memberavatar><input type="text" id="inputcomment"><button class="green post">Post</button>');
		$(this).parent().find('#inputcomment').focus();
		$('button.post').live('click',function(e){

			comment = $(this).parent().find('#inputcomment').val();
			stopid = $(this).parent().parent().find('#stopid').val();
			tripid = $('#tripid').val();
			queryurl = BACKEND_URL + 'members/postcomment.php';
			$.post(queryurl ,{comment:comment, stopid:stopid, tripid:tripid, type: 'trip_comment'}, function(data){
				
			});
			date = new Date();
			$(this).parent().find('div.commentlist').prepend('<div class="comment"><memberavatar><img src="'+USER_PIC_THUMB+'"></memberavatar><timeago>Just now</timeago><div class="textcomment">'+comment+'</div></div>');
			$(this).parent().find('#inputcomment').val('').focus();
			
		});
		$(this).remove();
	});
	// Delete trip
	$('span.deletetrip').click(function(e){
		tripid = $(this).parent().find('#tripid').val();
		queryurl = BACKEND_URL + 'members/trips/deletetrip.php';
		$.post(queryurl, {tripid: tripid}, function(e){
			
		});
		$(this).parent().remove();
	});
	// Delete stop
	$('span.deletestop').click(function(e){
		tripid = $('#tripid').val();
		stopid = $(this).parent().find('#stopid').val();
		queryurl = BACKEND_URL + 'members/trips/deletestop.php';
		$.post(queryurl, {tripid: tripid, stopid:stopid}, function(e){
			alert(e);
		});
		$(this).parent().remove();
	});
	// Accordion Functionality
	$('.tripstop h3').click(function(e){
		$('.stopcontent').not($(this).parent().parent().find('.stopcontent')).slideUp(100);
		$(this).parent().parent().find('.stopcontent').slideToggle(150);
	});
	//Pan to markers
	$(".tripstop").mouseenter(function() {
				
	        $el = $(this);

	        if (!$el.hasClass("hover")) {

	          $("#locations li").removeClass("hover");
	          $el.addClass("hover");


	          // Move (pan) map to new location
	          pointToMoveTo = new google.maps.LatLng($el.attr("geo-lat"), $el.attr("geo-long"));
	          $('#map').panTo(pointToMoveTo);

	        }



	      $(".tripstop:first").trigger("mouseenter");

	    });
	
});

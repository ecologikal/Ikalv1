
$(document).ready(function(e){
	
	saveurl = BACKEND_URL + 'members/savememberdata.php';
	
	// Add the edit icon
	$('fields.editmode div').hover(function(e){
		$(this).append('<div class="editicon"><span class="ui-icon ui-icon-pencil"></span></div>');
	}, function(e){
		$(this).find('div.editicon').remove();
	});
	
	$('fields.editmode div').click(function(e){
		$(this).find('span.editable').trigger('click');
	});
	// Add Custom Editable Types
	
	$.editable.addInputType('dob', {
		element: function(settings, original){
			var dayselect = $('<select id="day">');
			var monthselect = $('<select id="month">');
			var yearselect = $('<select id="year">');
			
			// Days loop
			for(var days=1; days<32; days++){
				var option = $('<option />').val(days).append(days);
				dayselect.append(option);
			}
			$(this).append(dayselect);
			
			//Month Loop
			var month=new Array(12);
			month[0]="January";
			month[1]="February";
			month[2]="March";
			month[3]="April";
			month[4]="May";
			month[5]="June";
			month[6]="July";
			month[7]="August";
			month[8]="September";
			month[9]="October";
			month[10]="November";
			month[11]="December";
			for(var months=0; months<12; months++){
				var option = $('<option />').val(month[months]).append(month[months]);
				monthselect.append(option);
			}
			$(this).append(monthselect);
			
			//Year Loop
			for(var years=2011; years>1900; years--){
				var option = $('<option />').val(years).append(years);
				yearselect.append(option);
			}
			$(this).append(yearselect);
			var hidden = $('<input type="hidden">');
			        $(this).append(hidden);
			        return(hidden);
		},
		submit: function(settings,original){
			var value = $('#day').val() + " - " + $('#month').val() + " - " + $('#year').val();
			$('input', this).val(value);
		}
		
	});
	$.editable.addInputType('phone', {
		element: function(settings, original){
			var phone = $('<input type="text" id="phone">').mask('(99) 999 99 999 99');
			$(this).append(phone);
			var hidden = $('<input type="hidden">');
			        $(this).append(hidden);
			        return(hidden);
		},
		submit: function(settings,original){
			var value = $('#phone').val();
			$('input', this).val(value);
		}

	});
	$.editable.addInputType('autocomplete', {
	        element : $.editable.types.text.element,
	        plugin : function(settings, original) {
	            $('input', this).autocomplete(settings.autocomplete.data);
	        }
	});

	
	// Adding JEditable to specific fields
	
	$('.email').editable( saveurl,{
		name	: 'email',
		submit: 'Save', 

	});

	$('.country').editable( saveurl,{
		name	: 'country',
		type	: 'autocomplete',
		onblur    : "submit",
		submit: 'Save',
		autocomplete : {
		data : ["Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Anguilla","Antarctica","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia and Herzegovina",
				"Botswana","Bouvet Island","Brazil","British Indian Ocean Territory","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central African Republic","Chad","Chile","China","Christmas Island",
				"Cocos (Keeling) Islands","Colombia","Comoros","Congo","Congo, the Democratic Republic of the","Cook Islands","Costa Rica","Cote D'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt",
				"El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands (Malvinas)","Faroe Islands","Fiji","Finland","France","French Guiana","French Polynesia","French Southern Territories","Gabon","Gambia","Georgia","Germany","Ghana",
				"Gibraltar","Greece","Greenland","Grenada","Guadeloupe","Guam","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Heard Island and Mcdonald Islands","Holy See (Vatican City State)","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia",
				"Iran, Islamic Republic of","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, Democratic People's Republic of","Korea, Republic of","Kuwait","Kyrgyzstan","Lao People's Democratic Republic","Latvia",
				"Lebanon","Lesotho","Liberia","Libyan Arab Jamahiriya","Liechtenstein","Lithuania","Luxembourg","Macao","Macedonia, the Former Yugoslav Republic of","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Martinique","Mauritania",
				"Mauritius","Mayotte","Mexico","Micronesia, Federated States of","Moldova, Republic of","Monaco","Mongolia","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zeland",
				"Nicaragua","Niger","Nigeria","Niue","Norfolk Island","Northern Mariana Islands","Norway","Oman","Pakistan","Palau","Palestinian Territory, Occupied","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Pitcairn","Poland","Portugal","Puerto Rico",
				"Qatar","Reunion","Romania","Russian Federation","Rwanda","Saint Helena","Saint Kitts and Nevis","Saint Lucia","Saint Pierre and Miquelon","Saint Vincent and the Grenadines","Samoa","San Marino",	"Sao Tome and Principe","Saudi Arabia","Senegal",
				"Serbia and Montenegro","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Georgia and the South Sandwich Islands","Spain","Sri Lanka","Sudan","Suriname","Svalbard and Jan Mayen","Swaziland",
				"Sweden","Switzerland","Syrian Arab Republic","Taiwan, Province of China","Tajikistan",	"Tanzania, United Republic of","Thailand","Timor-Leste","Togo","Tokelau","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Turks and Caicos Islands",
				"Tuvalu","Uganda",	"Ukraine","United Arab Emirates","United Kingdom","United States","United States Minor Outlying Islands","Uruguay","Uzbekistan","Vanuatu","Venezuela","Viet Nam","Virgin Islands, British",	"Virgin Islands, U.S.",	"Wallis and Futuna",
				"Western Sahara","Yemen","Zambia","Zimbabwe"] 
		        } 
	});
	$('.genderselect').editable(saveurl,{
			name	: 'gender',
			data   : "{'Male':'Male','Female':'Female','Not Disclosed':'Not Disclosed'}",
		    type   : "select",
		    style  : "inherit",
			submit : "Save", 
		    submitdata : function() {
		      return {id : 2};
		    }
	});
	$('.dobselect').editable(saveurl,{
		name: 'dob',
		type: 'dob',
		style: 'display:inline',
		submit: 'Save'
	});
	$('.phone').editable(saveurl,{
		name: 'phone',
		type: 'phone',
		submit: 'Save'
	});
	$('.firstname').editable(saveurl,{
		name: 'firstname',
		submit: 'Save'
	});
	$('.lastname').editable(saveurl,{
		name: 'lastname',
		submit: 'Save'
	});
	$('.aboutme').editable(saveurl,{
		name: 'aboutme',
		type: 'textarea',
		submit: 'Save'
	});
	// Manage Languages

	queryurl = BACKEND_URL + '_general/getlanguagelist.php';
	
	$('#language').autoSuggest(queryurl,{ 
		selectedItemProp: 'value',
		selectedValuesProp: 'id',
		startText: "Type Language",
		searchObjProps: "value",
		minChars: 2,
		preFill: selectedData.items,
		matchCase: false,
		//Adds country code to the list
		formatList: function(data,elem){
			var level = data.level, language = data.value;
			var new_elem = elem.html( language+" - "  +level);
			return new_elem;
		}
	}).watermark('Type Language').focus();
	$('button.add').live('click',function(e){
		langs = $('input.as-values').val();
		$.post(BACKEND_URL+'members/savememberdata.php', { language: langs},function(data){
				//$('#languages').append(data);
				window.location.href = "?";
		});
	});
	
	// Add Skills
	
	queryurl = BACKEND_URL + '_general/getskillslist.php';
	appended = false;
	$('button.addskill').live('click',function(e){
	if (appended == false){ 
		$(this).parent().append('<input type="text" id="skill">');
		$(this).parent().find('#skill').autoSuggest(queryurl,{ 
			selectedItemProp: 'value',
			startText: "Type Skill",
			selectedValuesProp: 'id',
			selectionLimit:1,
			limitText: "One Skill at a Time",
			selectionAdded: function(data){
				 
				$('#skillslist').append('<textarea id="skilldescription"></textarea>');
				$('#skilldescription').watermark('Type a description of your skill').focus();
				$('#skillslist').append('<div class="sliderlabel"><span class="hint">Level of proficiency</span><span class="value">0 %</span></div><div id="slider"></div><button class="saveskill green">Save Skill</button>');
				$('#slider').slider({
					range: "min",
					min: 1,
					max: 100,
					slide: function(e,ui){
						$('.sliderlabel span.value').html(ui.value+" %");
					}
				});
			},
			selectionRemoved: function(data){
				$('#skilldescription, #skillslist .watermark, #skillslist li.as-selection-item, #skillslist div.sliderlabel, #skillslist #slider, button.saveskill').remove();
			},
			searchObjProps: "value",
			minChars: 2,
			matchCase: false,
			//Adds country code to the list
			formatList: function(data,elem){
				var cat = data.cat, skill = data.value, catname = data.catname;
				var new_elem = elem.html("<span class='iconsmall petal p"+cat+" tiptip' title='"+catname+"'></span>"+ skill);
				return new_elem;
			}
		}).watermark('Type Skill').focus();
		appended= true;
		}
	});
	// Add Skill
	$('button.saveskill').live('click',function(e){
		skillname = $(this).parent().find('ul li.as-selection-item').text().replace(/^.(\s+)?/, "");
		level = parseInt($('.sliderlabel span.value').html());
		description = $('#skilldescription').val();
		skillid = $('#skillslist input.as-values').val();
		skillid = skillid.replace(",", "");
		skillid = parseInt(skillid);
		if (description === '' || level === 0 || skillid === null){
			if (description == ''){
				$('#skilldescription').css({'border': '2px solid #992244', 'background':'#B3236C'}).focus();
			}else{
				$('#skilldescription').css({'border': 'none', 'background':'#444'})
			}
			if (level === 0){
				alert('Please select a level');
			}
		}else{
			$.post(BACKEND_URL+'members/saveskill.php', { skillid: skillid, desc: description, level:level},function(data){
				window.location.href = "?";
				petalno = parseInt(data);

				$('div#p'+petalno).slideDown(200).find('skill').slideDown(200);
				noskills = $('div#p'+petalno).find('#noskills').html();
				noskills = parseInt(noskills);
				noskills++;
				$('div#p'+petalno).find('noskills').text(noskills+' skills');
				$('div#p'+petalno+' #percSkills').after('<skill style="display: block; "><input type="hidden" id="skillid" value="'+skillid+'"><name><span class="icon delete skill"></span>'+skillname+'</name><grade>'+level+' %</grade><description>'+description+'</description></skill>');
				// UPDATE POINTS
				
				$('#skilldescription, #slider, .sliderlabel, ul li.as-selection-item, button.saveskill').remove();
				kins = $('#reactionpoints #kinvalue').text();
				kins = parseInt(kins);
				kins= kins + 3;
				$('#reactionpoints #kinvalue').html("<span class='icon kin'></span>"+kins+" kins");
			});
		}
	});
	// Delete Skill
	
	$('span.icon.delete.skill').click(function(e){
		skillid = $(this).parent().parent().find('input#skillid').val();
		$(this).parent().parent().fadeOut(200).remove();
		$.post(BACKEND_URL+'members/deleteskill.php', { skillid: skillid},function(data){
			$(this).parent().parent().append(data);
		});
	});
	// Leave Reference
	
	$('button.reference').live('click',function(e){

			$(this).parent().append('<textarea id="reference"></textarea><span class="value greengradient">0 %</span><span class="hintref greengradient">Level of proficiency</span><div id="refslider"></div><button class="green postref">Post Reference</button>');
			$(this).parent().find('#reference').watermark('Please Write your reference here').focus();
			$(this).parent().find('#refslider').slider({
				min: 1,
				max: 100,
				slide: function(e,ui){
					$(this).parent().find('span.value').html(ui.value+" %");
				}
			});
			$(this).live('focus', function () { $(this).unbind('focus');  });
			$(this).slideUp(200);
	});
	$('button.postref').live('click',function(e){
		grade = parseInt($(this).parent().find('span.value').html());
		description = $(this).parent().find('#reference').val();
		skillid = $(this).parent().find('input#skillid').val();
		if (description === '' || grade === 0 || skillid === null){
			if (description == ''){
				$('#reference').css({'border': '2px solid #992244', 'background':'#B3236C'}).focus();
			}else{
				$('#reference').css({'border': 'none', 'background':'#444'})
			}
			if (level === 0){
				alert('Please select a level');
			}
		}else{
			$.post(BACKEND_URL+'members/savereference.php', { userto: USER_ID_VIEWING, skillid: skillid, desc: description, grade:grade},function(data){
			//	$(this).parent().parent().find('#reference, span.value, .hintref, #refslider, button.postref').remove();
				window.location.href = "?user_id="+USER_ID_VIEWING;
			//	$(this).parent().append('<reference><userid>'+USER_ID+'</userid><avatar><img src="'+USER_PIC+'"/></avatar><username>'+USER_NAME+'</username><description>'+description+'</description><refgrade>'+grade+' %</refgrade></reference>');
			/**	petalno = parseInt(data);
				$('div#p'+petalno).slideDown(200).find('skill').slideDown(200);
				noskills = $('div#p'+petalno).find('#noskills').html();
				noskills = parseInt(noskills);
				noskills++;
				$('div#p'+petalno).find('noskills').text(noskills+' skills');
				$('div#p'+petalno+' #percSkills').after('<skill style="display: block; "><input type="hidden" id="skillid" value="'+skillid+'"><name><span class="icon delete skill"></span>'+skillname+'</name><grade>'+level+' %</grade><description>'+description+'</description></skill>'); **/
			}); 
		}
	});
	// PRofile Pic
	$("a.profilepic").fancybox({
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
		$("a.addpics, a.addpicstoalbum, a.managepictures").livequery(function(e){
				$(this).fancybox({
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
		});
			
		$("a.sendmessage").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'padding'		: 0,
				'speedIn'		:	300, 
				'speedOut'		:	200, 
				'overlayShow'	:	true,
				'width'			: 500,
				'height'		: 400, 
				'overlayColor'	: '#000',
				'hideOnContentClick': false,
			});
	//Make Bond
	$('#makebond').hover(function(e){
		$('#bondtype').slideToggle(200);
	});
	$('#addfriend').click(function(e){
		$.post(BACKEND_URL+'members/requestfriendship.php', { user_to: USER_ID_VIEWING},function(data){
			location.reload(true); 
		});
	});
	// ALBUMS 

	$('button.addalbum').live('click',function(e){
		$('.albumscontainer').prepend(' <div class="albuminfo"><span class="icon delete close"></span><h4>Album info</h4><input type="text" id="albumname"><textarea id="albumdesc"></textarea><button class="green savealbum">Save Album</button></div>');
		$('#albumname').watermark('Type album name').focus();
		$('#albumdesc').watermark('Type album description');
		$('.albuminfo span.close').click(function(e){
			$(this).parent().remove();
			$('.gallery h3').append('<button class="green addalbum iconspan"><span class="ui-icon ui-icon-plus"></span>Add Album</button>');
		});
		$('button.savealbum').click(function(e){
			albumname = $('#albumname').val();
			albumdesc = $('#albumdesc').val();
			queryurl = BACKEND_URL + 'members/addalbum.php';
			$.post(queryurl, { albumname : albumname, albumdesc : albumdesc}, function(data){
				albumid = parseInt(data);
				datatoappend = '<div class="album">'+
									'<input type="hidden" name="albumid" value="'+albumid+'" id="albumid" />'+
									'<div class="name">'+
										'<h4>'+
										'<span class="icon delete deletealbum"></span>'+albumname+
										'<span class="nopics">'+
											'<span class="ui-icon ui-icon-image"></span>'+
											'0 pictures'+
										'</span>'+
										'<timeago>Just Now</timeago>'+
										'</h4>'+
										
										'<button class="green addpicstoalbum tiptip" title="Add Pictures" ><span class="ui-icon ui-icon-plus"></span></button>'+
										'<a class="iframe addpicstoalbum" href="'+VIEWS_URL+'members/pictureuploader.php?type=member&albumname='+albumname+'"></a>'+
										'<button class="green managepictures tiptip" title="Manage Pictures"><span class="ui-icon ui-icon-image"></span></button>'+
										'<a class="iframe managepictures" href="'+VIEWS_URL+'members/picturedetails.php?type=member&albumname='+albumname+'"></a>'+
									'</div>'+
										'<div class="description">'+albumdesc+'</div>'+
										'<div class="albumpics">No pictures Yet</div>'+
								'</div>';
				$('#profilecontent.gallery .albumscontainer').prepend(datatoappend);
			});
			$('.albuminfo').remove();
			$('.gallery h3').append('<button class="green addalbum">Add Album</button>');
			
		});
		$(this).remove();
	});
	$('button.addpicstoalbum').live('click',function(e){
		$(this).parent().find('a.addpicstoalbum').trigger('click');
	});
	$('button.managepictures').live('click',function(e){
		$(this).parent().find('a.managepictures').trigger('click');
	});
	$('span.deletealbum').live('click',function(e){
		answer = confirm('Are you sure you want to delete album?');
		if (answer){
			albumid = $(this).parent().parent().parent().find('#albumid').val();
			$.post(BACKEND_URL+'members/pictures/deletealbum.php', { albumid:albumid}, function(data){
			});
			$(this).parent().parent().parent().slideUp(200);	
		}
		
	});
	// Slide toggle bars
	$('.gallery h3').click(function(e){
		//$('.albumscontainer').slideToggle(200);
	});
});
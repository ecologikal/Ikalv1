// JavaScript Document
var current_gallery_page=0;
var mouse_is_inside=true;
var PetalActualNo=0
function randomString() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 20;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	return randomstring;
}

function load_html( target, url){
	var content;
	$(target).append("<div id='loader'><div class='loadericon'></div> Cargando...</div>");
	$.get(url, function(data){
		$(target).html("");
		$(target).html(data);
		$(target).slideDown(600);
	});
}
function is_int(value){ 
  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
      return true;
  } else { 
      return false;
  } 
}
function updateTips( t, type ) {
	tips = $( ".validateTips" );
	if(type){
		tips.removeClass( "ui-state-error" );
		tips.addClass( "ui-state-highlight" );
		t='<span style="position:absolute;margin-top:5px;" class="ui-icon ui-icon-alert"></span>'+t;
	}else{
		tips.removeClass( "ui-state-highlight" );
		tips.addClass( "ui-state-error" );
		t='<span style="position:absolute;margin-top:5px;" class="ui-icon ui-icon-info"></span>'+t;
	}
	tips.html( t ).fadeIn(100);setTimeout(function() {tips.fadeOut(1500 );	}, 2000 );
}

function checkLength( o, m, min, max ) {
	if ( o.val().length > max || o.val().length < min ) {
		o.addClass( "ui-state-error" );
//		updateTips( "Length of " + n + " must be between " + min + " and " + max + ".",0 );
		updateTips( m,0 );
		return false;
	} else {
		return true;
	}
}

function checkRegexp( o, regexp, n ) {
	if ( !( regexp.test( o.val() ) ) ) {
		o.addClass( "ui-state-error" );
		updateTips( n,0);
		return false;
	} else {
		return true;
	}
}

String.parseJSON  = (function (s) {

  var m = {
    '\b': '\\b',
    '\t': '\\t',
    '\n': '\\n',
    '\f': '\\f',
    '\r': '\\r',
    '"' : '\\"',
    '\\': '\\\\'
  };

  s.parseJSON = function (filter) {
     /*
           Reason: Why this function is useful?
     */
    // Parsing happens in three stages. In the first stage, we run the text against
    // a regular expression which looks for non-JSON characters. We are especially
    // concerned with '()' and 'new' because they can cause invocation, and '='
    // because it can cause mutation. But just to be safe, we will reject all
    // unexpected characters.

    try {
      if (/^("(\\.|[^"\\\n\r])*?"|[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t])+?$/.test(this)) {

          // In the second stage we use the eval function to compile the text into a
          // JavaScript structure. The '{' operator is subject to a syntactic ambiguity
          // in JavaScript: it can begin a block or an object literal. We wrap the text
          // in parens to eliminate the ambiguity.

          var j = eval('(' + this + ')');

          // In the optional third stage, we recursively walk the new structure, passing
          // each name/value pair to a filter function for possible transformation.

          if (typeof filter === 'function') {

            function walk(k, v) {
              if (v && typeof v === 'object') {
                for (var i in v) {
                  if (v.hasOwnProperty(i)) {
                    v[i] = walk(i, v[i]);
                  }
                }
              }
              return filter(k, v);
            }

            j = walk('', j);
          }
          return j;
        }
      } catch (e) {

  // Fall through if the regexp test fails.

      }
      throw new SyntaxError("parseJSON: filter failed");
    };
  }
) (String.prototype);
// End public domain parseJSON block

function SyntaxError(e)
{
 alert(e);
}
$.fn.focusNextTextareaField = function() {
    return this.each(function() {
        var fields = $(this).parents('form:eq(0),body').find('textarea');
        var index = fields.index( this );
        if ( index > -1 && ( index + 1 ) < fields.length ) {
            fields.eq( index + 1 ).focus();
        }
        return false;
    });
};
$(document).ready(function(e){
	//TOOLBAR ICONS
	$.watermarker.setDefaults({ color: '#ccc'});
	$('#login_form input').watermark();
	
	$('.tiptip').tipTip({defaultPosition: "right"});
	//TOOLBAR
	var accountopen = false;
	$('#account').click(function(e){
		if (accountopen === false){
			$(this).find('.dropdown').css({
				'margin-top':'7px',
				'border-top': '0',
				'border-bottom':'7px solid #ccc',
				'border-right':	'7px solid #555',
				'border-left':	'7px solid #555',
			});
			$('#accountlist').fadeIn(200);
			accountopen = true;
		}else{
			$(this).find('.dropdown').css({
				'margin-top':'10px',
				'border-bottom': '0',
				'border-top':'7px solid #fff',
				'border-right':	'7px solid #555',
				'border-left':	'7px solid #555',
			});
			$('#accountlist').hide();
			accountopen = false;
		}
		
	});
	//MAIN MENU ICON ANIMATION
	$('#mainmenu .icon').hover(function(e){
	//	if (!$(this).hasClass('selected')){
			$(this).stop().animate({ 'margin-left': '5px'},100);
	//	}
	},function(e){
		$(this).animate({ 'margin-left': '0px'});
	});
	$("a.post").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	300, 
			'speedOut'		:	200, 
			'overlayShow'	:	true,
			'width'			: 400,
			'height'		: 500, 
			'overlayColor'	: '#000',
			'bgColor': '#000'
		});
	
	// Notifications
	
	$('div#notifications').click(function(e){
		$('#notificationlist').slideToggle(100);
	});
	//Accept Friendship
	$('button.accept').click(function(e){
		userfrom = $(this).parent().parent().find('input#userfrom').val();
		userto = $(this).parent().parent().find('input#userto').val();
		
		$.post(BACKEND_URL+'members/addfriend.php', { user_to: userto, user_from: userfrom},function(data){
		
		});
		// NOTE: Cant figure out how to acces it in the $.post success function
		$(this).parent().parent().remove();
		nomessages = $('nomessages').html();
		$('nomessages').html(nomessages-1);
	});
	//DELETE FRIEND
	$('button.deletefriend').click(function(e){
		user_id = $(this).parent().find('input#user_id').val();
		$.post(BACKEND_URL+'members/deletefriend.php', { user_id: user_id},function(data){
			alert(data);
		});
		// NOTE: Cant figure out how to acces it in the $.post success function
		$(this).remove();
		
	});
	$("abbr.timeago").timeago();
	$('a.pic').fancybox({
		'padding'		: 0,
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	300, 
		'speedOut'		:	200, 
		'overlayShow'	:	true,
		'width'			: 900,
		'height'		: 900, 
		'overlayColor'	: '#000',
		'bgColor': '#000',
	});

	
});
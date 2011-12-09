<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");?>
    <div id="login_form" title="Login" >

		<div id="fields">
        	<input type="text" name="login_form_user" id="login_form_user"  class="text ui-widget-content ui-corner-all" title="Type in username/email" />
	        <input type="password" name="login_form_password" id="login_form_password" class="text ui-widget-content ui-corner-all" title="Type in password"/>
		</div>
		<div id="checkboxes">
			<label for="login_form_remember_session"><input name="login_form_remember_session" type="checkbox" id="login_form_remember_session" value="1" />
	        Remember me </label>
		</div>
        <a href¨="#">Forgot your password?</a>
    </div>

<div id="validateTips_login" class="validateTips">&nbsp;</div>
<script>
$(function() {
	// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
	
	var login_form_user = $( "#login_form_user" ),
		login_form_password = $( "#login_form_password" ),
		login_form_remember_session = $( "#login_form_remember_session" );

		tips = $( "#validateTips_login" ),
		allFields = $( [] ).add( login_form_user ).add( login_form_password).add( tips);
		
	$( "#login_form" ).dialog({autoOpen: false, modal: true, width:240, draggable: true, 
		resizable: false, dialogClass: 'dialogo_editar_perfil',
		buttons: {
			"Login": function() {
				var bValid = true;
				login_form_user.removeClass( "ui-state-error" );
				login_form_password.removeClass( "ui-state-error" );
				bValid = bValid && checkLength( login_form_user, "Please check your Username", 3, 50 );
				bValid = bValid && checkLength( login_form_password, "Please check your password", 3, 16 );
				if ( bValid ) {
					var u=login_form_user.val(),
						p=login_form_password.val();
					var r=0;
					if($(login_form_remember_session).attr('checked'))r=1;
					var dataString = 'login_forma_usuario='+ u + '&login_forma_contrasena=' + p + '&login_forma_comando=login&remember_session='+r;
					$.ajax({
						type: "POST",
						url: "<?=_ROOT_URL_?>login/login.php",
						data: dataString,
						beforeSend: function(objeto){
							     $('.ui-dialog button span').html("<img src='<?=_IMAGES_URL_?>ajax-loader.gif' alt='Loading...'/> Logging in");
						    },
						success: function(logged) {
							$('.ui-dialog button span').html("Log In");
							if(logged==true){
								$("#login_form").dialog( "close" );
								var url='<?=_VIEWS_URL_?>members/member_profile.php';
								$(location).attr('href',url);
								updateTips("Login Successful",1)
							}
							if(logged==false){
								updateTips( "Please Verify your Details",0 );
							}

						}
					 });
					return false;
				}
			},
		},
		close: function(){allFields.val( "" ).removeClass( "ui-state-error" );allFields.html( "" );}
	});
	$('#login_form').live('keyup', function(e){ if (e.keyCode == 13){$(':button:contains("Login")').click();}});
	$( "#login_btn" ).click(function() {$( "#login_form" ).dialog( "open" );});

});
</script>

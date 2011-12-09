<?php if(is_logged_in()){ ?>
	<script>
		$('#register').click(function(e){
			alert('Seems like you are already logged in');
		});
	</script>
<?php }else{ ?>	

<script>
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var name = $( "#miembro_forma_registro_usuario" ),
			email = $( "#miembro_forma_registro_email" ),
			password = $( "#miembro_forma_registro_contrasena" ),
			allFields = $( [] ).add( name ).add( email ).add( password );




		
		$( "#forma_registro" ).dialog({
			autoOpen: false,
			height: 500,
			width: 500,
			modal: true,
			draggable: false,
			resizable: false,
			buttons: {
				"REGISTER": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );
					if(name.val()==name.attr("title"))name.val('');
					if(email.val()==email.attr("title"))email.val('');
					bValid = bValid && checkLength( name, "EL nombre de usuario debe contener minimo 3 y maximo 16 caracteres", 3, 16 );

					bValid = bValid && checkLength( password, "password", 5, 16 );
					bValid = bValid && checkLength( email, "email", 6, 80 );

					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "ejemplo. juan.perez@ecologikal.net" );

					if ( bValid ) {
					//
						var miembro_forma_registro_usuario=$("#miembro_forma_registro_usuario").val();
						var miembro_forma_registro_contrasena=$("#miembro_forma_registro_contrasena").val();
						var miembro_forma_registro_email=$("#miembro_forma_registro_email").val();
						var miembro_forma_registro_comando=$("#miembro_forma_registro_comando").val();
						var dataString = 'miembro_forma_registro_usuario='+ miembro_forma_registro_usuario +
							'&miembro_forma_registro_contrasena=' + miembro_forma_registro_contrasena +
							'&miembro_forma_registro_email='+miembro_forma_registro_email+
							'&miembro_forma_registro_comando='+miembro_forma_registro_comando;
						$.ajax({
							type: "POST",
							url: "<?php echo _BACKEND_URL_?>_registration/memberdata.php",
							data: dataString,
							success: function(msg) {
								if(msg==true){
										var url='<?php echo _VIEWS_URL_ ?>members/member_profile.php?edit=1';
										$(location).attr('href',url);
									//$('#miembro_forma_registro_error').html("Logged").hide().fadeIn(500, function(){});
								}else{
									updateTips(msg,0);
								}
							}
						 });
						return false;
					//
						$( this ).dialog( "close" );
					}
				},
				Cancelar: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});

		$('#forma_registro').live('keyup', function(e){ if (e.keyCode == 13){$(':button:contains("REGISTER")').click();}});

		$( "#register" ).click(function() {$( "#forma_registro" ).dialog( "open" );});
	});
	</script>

<div id="forma_registro" title="Registro">
	<h2>Unete a Ecologikal</h2>
	<p>Al ser miembro de ecologikal puedes disfrutar de muchos beneficios</p>
	<form>
	<fieldset>
		<label for="miembro_forma_registro_usuario">Username</label>
		<input name="miembro_forma_registro_usuario" type="text" class="text ui-widget-content ui-corner-all" id="miembro_forma_registro_usuario" title="Username"/>
		<label for="miembro_forma_registro_contrasena">Password</label>
    	<input type="password" name="miembro_forma_registro_contrasena" id="miembro_forma_registro_contrasena" class="text ui-widget-content ui-corner-all" title="Password" />
		<label for="miembro_forma_registro_email">E-mail</label>
	  <input type="text" name="miembro_forma_registro_email" id="miembro_forma_registro_email"  class="text ui-widget-content ui-corner-all" title="Email" />
      <input name="miembro_forma_registro_comando" type="hidden" id="miembro_forma_registro_comando" value="agregar_miembro" />
	</fieldset>
	</form>
</div>
<?php } //ELSE END ?>
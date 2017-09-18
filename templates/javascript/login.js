$(document).ready(function(){
	console.log("Cargando script");
	$("form:not(.filter) :input:visible:enabled:first").focus();
	
	$("#frmLogin").validate({
		debug: true,
		rules: {
			txtUsuario: "required",
			txtPass: "required"
		},
		wrapper: 'span',
		submitHandler: function(form){
			var obj = new TUsuario;
			obj.login($("#txtUsuario").val(), $("#txtPass").val(), {
				after: function(datos){
					if (datos.band)
						location.href = "panelPrincipal";
					else{
						alert("The username or password you have entered is invalid, please try again.");
					}
				}
			});
        }

    });
	
	$("#btnRecuperar").click(function(){
		var email = prompt("Enter your email to reset your password", $("#txtUsuario").val());
		
		var obj = new TUsuario;
		obj.resetPassword(email, {
			after: function(datos){
				if (datos.band)
					alert("Your new password was sent to your email");
				else{
					alert("Email account does not exist");
				}
			}
		});
	});
});
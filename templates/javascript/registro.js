$(document).ready(function(){
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			txtTienda: "required",
			//txtDireccion: "required",
			txtEmail:{
				required: true,
				email: true
			},
			txtTelefono: {
				required : false,
				minlength: 7,
				maxlength: 15,
				number: true
			},
			txtCelular: {
				required : false,
				minlength: 7,
				maxlength: 15,
				number: true
			},
			txtPass: {
				required: true
			},
			txtPassConfirm:{
				equalTo: "#txtPass"
			},
			txtSitioWeb: "required",
			txtStreet: "required",
			txtZip: "required",
			txtCity: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TCliente;
			
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(), 
				$("#txtEmail").val(),
				$("#txtRFC").val(),
				$("#txtDireccion").val(),
				$("#txtTienda").val(),
				$("#txtLocalidad").val(),
				$("#txtTelefono").val(),
				$("#txtCelular").val(),
				$("#txtObservaciones").val(),
				$("#selTipo").val(),
				$("#txtSitioWeb").val(),
				$("#selEstado").val(),
				$("#txtPass").val(),
				$("#txtStreet").val(),
				$("#txtCity").val(),
				$("#txtState").val(),
				$("#txtZip").val(),
				{
					before: function(){
						$("#frmAdd").find("[type=submit]").prop("disabled", true);
						$(".alert").show();
					},
					after: function(datos){
						$("#frmAdd").find("[type=submit]").prop("disabled", false);
						$(".alert").hide();
						if (datos.band){
							alert("Thanks for registering with us, we are evaluating your information and we will notify you when your account is activated");
							location.href = "welcome";
						}else{
							alert(datos.message);
						}
					}
				}
			);
        }

    });
});
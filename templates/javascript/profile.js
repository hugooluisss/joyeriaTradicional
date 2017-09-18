$(document).ready(function(){
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
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
			/*txtPass: {
				required: true
			},*/
			txtConfirm:{
				equalTo: "#txtPass"
			}
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
					},
					after: function(datos){
						$("#frmAdd").find("[type=submit]").prop("disabled", false);
						if (datos.band){
							alert("Thank you for updating your info!");
						}else{
							alert("Not found");
						}
					}
				}
			);
        }
    });
    
    $("#txtPass").change(function(){
    	$("#txtConfirm").val("");
    });
});
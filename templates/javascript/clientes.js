$(document).ready(function(){
	if ($("#dvLista").length){
		getLista();
	
		$("#panelTabs li a[href=#add]").click(function(){
			$("#frmAdd").get(0).reset();
			$("#id").val("");
			$("form:not(.filter) :input:visible:enabled:first").focus();
		});
	}
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
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
			}/*,
			txtPass: {
				required: true
			}
			*/
		},
		wrapper: 'span', 
		messages: {
			txtNombre: "Este campo es necesario",
			txtTelefono: "Solo acepta número de entre 7 y 15 dígitos",
			txtCelular: "Solo acepta número de entre 7 y 15 dígitos"
		},
		submitHandler: function(form){
			var obj = new TCliente;
			
			obj.add(
				$("#id").val(), 
				$("#txtNombre").val(), 
				$("#txtEmail").val(),
				$("#txtRFC").val(),
				$("#txtDireccion").val(),
				$("#txtRazonSocial").val(),
				$("#txtLocalidad").val(),
				$("#txtTelefono").val(),
				$("#txtCelular").val(),
				$("#txtObservaciones").val(),
				$("#selTipo").val(),
				$("#txtSitio").val(),
				$("#selEstado").val(),
				$("#txtPass").val(),
				$("#txtStreet").val(),
				$("#txtCity").val(),
				$("#txtState").val(),
				$("#txtZip").val(),
				{
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
							
							if(datos.sendEmail)
								alert("Se envió un correo al cliente pidiendo que confirme su cuenta");
						}else{
							alert("Upps... No se guardaron los datos");
						}
					}
				}
			);
        }

    });
		
	function getLista(){
		$.get("?mod=listaClientes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TCliente;
					obj.del($(this).attr("cliente"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idCliente);
				$("#txtNombre").val(el.nombre);
				$("#txtRFC").val(el.rfc);
				$("#txtDireccion").val(el.direccion);
				$("#txtEmail").val(el.email);
				$("#txtRazonSocial").val(el.razonsocial);
				$("#txtLocalidad").val(el.localidad);
				$("#txtTelefono").val(el.tel);
				$("#txtCelular").val(el.cel);
				$("#txtObservaciones").val(el.observaciones);
				$("#selTipo").val(el.tipo);
				$("#txtSitio").val(el.sitioweb);
				$("#selEstado").val(el.estado);
				//$("#txtPass").val(el.pass);
				$("#txtStreet").val(el.street);
				$("#txtCity").val(el.city);
				$("#txtState").val(el.state);
				$("#txtZip").val(el.zip);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblClientes").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
});
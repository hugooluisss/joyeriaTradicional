$(document).ready(function(){
	getLista();
	$('#txtCodigo').colorpicker();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtNombre: "required",
			//txtCodigo: "required",
			txtClave: {
				required: true,
				remote: {
					url: "ccolores",
					type: "post",
					data: {
						action: "validaClave",
						id: function(){
							return $("#id").val();
						}
					}
				}
			}
		},
		messages:{
			txtClave: {
				remote: "La clave se encuentra repetida"
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TColor;
			obj.add(
				$("#id").val(), 
				$("#txtClave").val(), 
				$("#txtNombre").val(), 
				$("#txtCodigo").val(),
				{
					before: function(){
						$(form).find("[type=submit]").prop("disabled", true);
					},
					after: function(datos){
						$(form).find("[type=submit]").prop("disabled", false);
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... No se pudo guardar");
						}
					}
				}
			);
        }

    });
		
	function getLista(){
		$.get("listaColores", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TColor;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idColor);
				$("#txtClave").val(el.clave);
				$("#txtNombre").val(el.nombre);
				$("#txtCodigo").val(el.codigo);
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=imagen]").click(function(){
				var color = $(this);
				$("#winUploadImagen").find("form").attr("action", "?mod=ccolores&action=upload&color=" + color.attr("identificador"));
				$("#winUploadImagen").find("form").find("#color").val(color.attr("identificador"));
				
				$("#winUploadImagen").modal();
			});
			
			
			$("#winUploadImagen").find("form").fileupload({
				// This function is called when a file is added to the queue
				add: function (e, data) {
			    	
				
					// Automatically upload the file once it is added to the queue
					var jqXHR = data.submit();
				},
				progress: function(e, data){
					// Calculate the completion percentage of the upload
					var progress = parseInt(data.loaded / data.total * 100, 10);
					if(progress == 100){
						//data.context.removeClass('working');
						alert("La imagen se ha subido con éxito");
						getLista();
						$("#winUploadImagen").modal("hide");
						//getImagenes($("#winUploadImagen").find("form").find("#producto").val());
					}
				},
				fail: function(){
					alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
					
					console.log("Error en el servidor al subir el archivo, checa permisos de la carpeta repositorio");
				}
			});
			
			$("#tblDatos").DataTable({
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
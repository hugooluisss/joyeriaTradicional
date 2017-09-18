$(document).ready(function(){
	getLista();
	
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
			txtClave: {
				required: true,
				remote: {
					url: "csize",
					type: "post",
					data: {
						action: "validaClave",
						id: function(){
							return $("#id").val();
						}
					}
				}
			},
			txtPrecio: "required"
		},
		messages:{
			txtClave: {
				remote: "La clave se encuentra repetida"
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TSize;
			obj.add(
				$("#id").val(), 
				$("#txtClave").val(), 
				$("#txtNombre").val(), 
				$("#txtPrecio").val(), 
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
		$.get("listaSize", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TSize;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idSize);
				$("#txtClave").val(el.clave);
				$("#txtNombre").val(el.nombre);
				$("#txtPrecio").val(el.precio);
				
				$('#panelTabs a[href="#add"]').tab('show');
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
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
			txtCosto: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TPaqueteria;
			obj.add(
				$("#id").val(), 
				$("#txtURL").val(), 
				$("#txtNombre").val(), 
				$("#txtCosto").val(), 
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
		$.get("listaPaqueteria", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TPaqueteria;
					obj.del($(this).attr("identificador"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idPaqueteria);
				$("#txtURL").val(el.url);
				$("#txtNombre").val(el.nombre);
				$("#txtCosto").val(el.costo);
				
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
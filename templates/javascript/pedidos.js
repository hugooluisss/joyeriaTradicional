$(document).ready(function(){
	getLista();
	$("#frmAdd #txtFecha").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	$("#frmAddPago #txtFecha").datepicker( "option", "dateFormat", "yyyy-mm-dd" );
	
	$('.nav a[href="#add"]').click(function(){
		$("#frmAdd")[0].reset();
		$("#frmAddProductos")[0].reset();
		$("#frmAdd #id").val("");
		
		$("#selEstado").attr("anterior", "");
		
		$("#btnBuscarProductos").prop("disabled", false);
		$("#btnBuscarClientes").prop("disabled", false);
		$("#frmAdd").find("[type=submit]").prop("disabled", false);
		
		showDetalle();
	});
	
	showDetalle();
	
	$("#btnBuscarClientes").click(function(){
		$("#winClientes").modal();
		
		$.get("clientesPedido", function(html){
			$("#winClientes .modal-body").html(html);
			
			$("#winClientes #tblClientes button[action=seleccionar]").click(function(){
				var el =  jQuery.parseJSON($(this).attr("cliente"));
				
				$("#txtCliente").val(el.nombre);
				$("#txtCliente").attr("idCliente", el.idCliente);
				$("#winClientes").modal("hide");
			});
			
			$("#tblClientes").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
	});
	
	var productos = false;
	$("#btnBuscarProductos").click(function(){
		$("#winProductos").modal();
		
		if (!productos){
			productos = true;
			$("#winProductos .modal-body").html("Estamos actualizando la lista, por favor espere...");
			
			$.get("productosPedido", function(html){
				$("#winProductos .modal-body").html(html);
				
				$("#winProductos #tblProductos button[action=seleccionar]").click(function(){
					var el =  jQuery.parseJSON($(this).attr("producto"));
					
					$("#frmAddProductos #txtClave").val(el.clave);
					$("#frmAddProductos #txtDescripcion").val(el.nombre);
					$("#frmAddProductos #txtPrecio").val(el.precio);
					$("#frmAddProductos #txtCantidad").val(1);
					$("#winProductos").modal("hide");
					
					$("#frmAddProductos #txtCantidad").focus();
				});
				
				$("#tblProductos").DataTable({
					"responsive": true,
					"language": espaniol,
					"paging": true,
					"lengthChange": false,
					"ordering": true,
					"info": true,
					"autoWidth": true
				});
			});
		}
	});
	
	$("#frmAdd").validate({
		debug: false,
		rules: {
			txtFecha: "required",
			txtCliente: "required"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		submitHandler: function(form){
			var obj = new TPedido;
			obj.guardar(
				$("#id").val(), 
				$("#txtCliente").attr("idCliente"), 
				$("#txtFecha").val(),
				{
					before: function(){
						$("#frmAdd").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAdd").prop("disabled", false);
						
						if (datos.band){
							alert("Listo... puedes ingresar los artículos vendidos");
							$("#frmAdd #id").val(datos.id);
							showDetalle();
							getLista();
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
    
    
    $("#frmAddProductos").validate({
		debug: false,
		rules: {
			txtDescripcion: "required",
			txtCantidad: {
				required: true,
				digits: true,
				min: 1
			},
			txtPrecio: {
				required: true,
				number: true,
				min: 1
			}
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		submitHandler: function(form){
			var obj = new TPedido;
			obj.addMovimiento(
				"",
				$("#id").val(), 
				$("#txtClave").val(), 
				$("#txtDescripcion").val(),
				$("#txtCantidad").val(),
				$("#txtPrecio").val(),
				$("#txtDescuento").val(),
				{
					before: function(){
						$("#frmAddProductos").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAddProductos").prop("disabled", false);
						
						if (datos.band){
							getListaMovimientos();
							$("#frmAddProductos")[0].reset();
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			);
        }

    });
    
	function getLista(ocultar){
		if (ocultar == undefined)
			ocultar = false;
			
		$("#dvLista").html("Estamos actualizando la lista de pedidos, por favor espere...");
		$.post("listaPedidos", {
				"ocultar": ocultar
			}, function(html){
			$("#dvLista").html(html);
			
			$("#btnOcultar").click(function(){
				getLista(true);
			});
			
			$("#btnMostrar").click(function(){
				getLista();
			});
			
			$("[action=pdf]").click(function(){
				var el = $(this);
				var datos = jQuery.parseJSON($(this).attr("datos"));
				el.prop("disabled", true);
				
				$.post("cpedidos", {
						"pedido": datos.idPedido,
						"action": "imprimir"
					},function(data){
						el.prop("disabled", false);
						if (data.documento != ''){
							if (ventanaPedido === undefined)
								var ventanaPedido = window.open(data.documento, '_blank');
							else
								ventanaPedido.document.href = data.documento;
								
							ventanaPedido.focus();
						}else
							alert("El documento no se pudo generar");
					}, "json");
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#frmAdd #id").val(el.idPedido);
				$("#frmAdd #txtCliente").val(el.nombre);
				$("#frmAdd #txtCliente").attr("idCliente", el.idCliente);
				$("#frmAdd #selPagos").val(el.pagos);
				$("#frmAdd #txtFecha").val(el.fecha);
				$("#selEstado").val(el.idEstado);
				$("#selEstado").attr("anterior", el.idEstado);
				
				//$("#btnBuscarProductos").prop("disabled", el.idEstado != 1);
				//$("#btnBuscarClientes").prop("disabled", el.idEstado != 1);
				//$("#frmAdd").find("[type=submit]").prop("disabled", el.idEstado != 1);
				showDetalle();
				
				$('.nav a[href="#add"]').tab('show');
			});
			
			$("#dvLista [action=pagos]").click(function(){
				$("#winPagos").modal();
				$("#winPagos #venta").val($(this).attr("venta"));
				listaPagos($(this).attr("venta"));
			});
			
			$("#dvLista [action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TPedido ;
					obj.del($(this).attr("pedido"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar el pedido");
							getLista();
						}
					});
				}
			});
			
			$("[action=rastreo]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#winRastreo").find("#selPaqueteria").val(el.idPaqueteria);
				$("#winRastreo").find("#txtRastreo").val(el.codigo);
				$("#winRastreo").find("#txtComentario").val(el.comentarioEnvio);
				$("#winRastreo").find("#pedido").val(el.idPedido);
				$("#winRastreo").find("#selEstado").val(el.idEstado);
				
				$("#winRastreo").modal();
			});
			
			$("#tblPedidos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true,
				"order": [[ 0, "desc" ]]
			});
		});
	}
	
	function showDetalle(){
		if($("#frmAdd #id").val() == ''){
			$("#frmAddProductos").hide();
			$("#frmAddProductos").hide();
			$("#lstMovimiento").hide();
		}else{
			$("#frmAddProductos").show();
			$("#lstMovimiento").show();
			getListaMovimientos();
		}
	}
	
	
	function getListaMovimientos(){
		$.post("listaMovimientosPedido", {"pedido": $("#frmAdd #id").val()}, function(html){
			$("#lstMovimiento").html(html);
			
			$("#lstMovimiento [action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TPedido;
					obj.delMovimiento($(this).attr("movimiento"), {
						after: function(data){
							if (data.band == false)
								alert("Ocurrió un error al eliminar el artículo");
							getListaMovimientos();
						}
					});
				}
			});
			
			$("#btnImprimir").click(function(){
				var el = $(this)
				el.prop("disabled", true);
				
				$.post("cpedidos", {
						"pedido": $(this).attr("pedido"),
						"action": "imprimir"
					},function(data){
						el.prop("disabled", false);
						if (data.documento != ''){
							if (ventanaPedido === undefined)
								var ventanaPedido = window.open(data.documento, '_blank');
							else
								ventanaPedido.document.href = data.documento;
								
							ventanaPedido.focus();
						}else
							alert("El documento no se pudo generar");
					}, "json");
			});
			
			$("#tblMovimientos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": true
			});
		});
		
		getLista();
	}
	
	$("#selEstado").change(function(){
		if(confirm("¿Seguro de cambiar el estado del pedido?")){
			var pedido = new TPedido;
			
			pedido.setEstado($("#id").val(), $("#selEstado").val(), {
				before: function(){
					$("#selEstado").prop("disabled", true);
				}, after: function(resp){
					$("#selEstado").prop("disabled", false);
					
					if (resp.band){
						$("#selEstado").attr("anterior", $("#selEstado").val());
						getLista();
						getListaMovimientos();
					}else{
						alert("No se pudo actualizar el estado del pedido");
						$("#selEstado").val($("#selEstado").attr("anterior"));
					}
				}
			});
		}
	});
	
	$("#frmAddRastreo").validate({
		debug: false,
		rules: {
			selPaqueteria: "required",
			txtRastreo: "required"
		},
		errorElement : 'span',
		errorLabelContainer: '.errorTxt',
		submitHandler: function(form){
			var obj = new TPedido;
			obj.setEnvio(
				$("#frmAddRastreo").find("#pedido").val(), 
				$("#frmAddRastreo").find("#selPaqueteria").val(), 
				$("#frmAddRastreo").find("#txtRastreo").val(),
				$("#frmAddRastreo").find("#txtComentario").val(),
				$("#frmAddRastreo").find("#selEstado").val(),
				{
					before: function(){
						$("#frmAdd").prop("disabled", true);
					},
					after: function(datos){
						$("#frmAdd").prop("disabled", false);
						
						if (datos.band){
							$("#frmAdd #id").val(datos.id);
							getLista();
							$("#winRastreo").modal("hide");
						}else{
							alert("Upps... No se pudo guardar el código de rastreo");
						}
					}
				}
			);
        }

    });
});
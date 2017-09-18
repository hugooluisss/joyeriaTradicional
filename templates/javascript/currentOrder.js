$(document).ready(function(){
	var carrito = new TCarrito();
	listaPedidos();
	
	$("#print").click(function(){
		var el = $(this);
		
		el.prop("disabled", true);
		
		$.post("cpedidos", {
				"pedido": $("#idPedido").val(),
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
					alert("The document could not be generated");
			}, "json");
	});
	
	function listaPedidos(){
		carrito.getProductos({
			"idPedido": $("#idPedido").val(),
			after: function(resp){
				$(".table-responsive").html(resp);
				
				$(".btn-delete").click(function(){
					if ($("#tblCarrito").find("[type=checkbox]:checked").length > 0){
						if(confirm("Are you sure?")){
							var codigos = "";
							$("#tblCarrito").find("[type=checkbox]:checked").each(function(){
								codigos += $(this).val() + ",";
							});
							
							var obj = new TPedido;
							obj.delMovimiento(codigos, {
								before: function(){
									$(".btn-delete").prop("dissabled", true);
								}, after: function(resp){
									$(".btn-delete").prop("dissabled", false);
									
									if(!resp.band)
										alert("Could not be deleted");
									
									listaPedidos();
								}
							});
						}
					}
				});
			}
		});
	}
	
	$(".table-responsive").css("height", $(window).height() * 40 / 100);
	/*
	$("[href=placeOrder]").click(function(){
		location.href = "?mod=placeOrder&comentario=" + $("#txtComentarios").val();
	});
	*/
	if ($("#txtComentarios").val() == ''){
		$("#txtComentarios").val(window.localStorage.getItem("comentarios"));
	}
});
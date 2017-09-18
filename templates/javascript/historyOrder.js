$(document).ready(function(){
	$(".viewOrder").click(function(){
		var el = $(this);
		
		el.prop("disabled", true);
		
		$.post("cpedidos", {
				"pedido": el.attr('pedido'),
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
});
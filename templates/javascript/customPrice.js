$(document).ready(function(){
	$(".generarListaPrecios").click(function(){
		var valor = $("#multiplicador").val();
		if (valor < 1 || valor == '')
			alert("Indicates a value greater than 0");
		else{
			$(".generarListaPrecios").prop("disabled", true);
			$.post("cuserAdmin", {
				"multiplicador": valor,
				"action": "multiplicador",
				"json": 1
			}, function(data){
				$(".generarListaPrecios").prop("disabled", false);
				if (data.documento != ''){
					if (ventanaPedido === undefined)
						var ventanaPedido = window.open(data.documento, '_blank');
					else
						ventanaPedido.document.href = data.documento;
						
					ventanaPedido.focus();
				}else
					alert("El documento no se pudo generar");
			}, "json");
		}
	});
});
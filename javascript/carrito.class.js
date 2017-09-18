TCarrito = function(){
	var self = this;
	
	this.getChildrens = function(datos){
		if (datos.before !== undefined) datos.before();
		
		$.post("itemsElemento", {
	    	"item": datos.identificador,
	    	"index": datos.index,
	    	"total": datos.total
	    }, function(data){	
			if (datos.after !== undefined)
				datos.after(data);
		});
	};
	
	this.getProductos = function(datos){
		if (datos.before !== undefined) datos.before();
		
		$.post("productosPedidoCarrito", {
			"idPedido": datos.idPedido
		},
		function(data){	
			if (datos.after !== undefined)
				datos.after(data);
		});
	}
};
TPedido = function(){
	var self = this;
	
	this.guardar = function(id, cliente, fecha, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpedidos', {
				"action": "guardar",
				"id": id,
				"cliente": cliente,
				"fecha": fecha
			}, function(data) {
				if (data.band == false)
					console.log(data.mensaje == ''?"Upps. Ocurrió un error al agregar la venta":data.mensaje);
				
				if (fn.after !== undefined) fn.after(data);
			}, "json"
		);
	};
	
	this.addMovimiento = function(id, pedido, clave, descripcion, cantidad, precio, descuento, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpedidos', {
				"action": "addMovimiento",
				"id": id,
				"pedido": pedido,
				"clave": clave,
				"descripcion": descripcion,
				"cantidad": cantidad,
				"precio": precio,
				"descuento": descuento
			}, function(data) {
				if (data.band == 'false')
					console.log(data.mensaje == ''?"Upps. Ocurrió un error al agregar el movimiento al pedido ":data.mensaje);
				
				if (fn.after !== undefined) fn.after(data);
			}, "json"
		);
	};
	
	this.del = function(id, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpedidos', {
			"action": "del",
			"id": id,
		}, function(data){
			if (data.band == 'false')
				console.log("Ocurrió un error al eliminar el pedido");
			
			if (fn.after !== undefined) fn.after(data);
		}, "json");
	};
	
	this.delMovimiento = function(movimiento, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpedidos', {
			"action": "delMovimiento",
			"id": movimiento,
		}, function(data){
			if (data.band == 'false')
				console.log("Ocurrió un error al eliminar el artículo");
			
			if (fn.after !== undefined) fn.after(data);
		}, "json");
	};
	
	this.setEstado = function(id, estado, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpedidos', {
				"action": "cambiarEstado",
				"id": id,
				"estado": estado
			}, function(data) {
				if (data.band == false)
					console.log(data.mensaje == ''?"Upps. Ocurrió un error al agregar la venta":data.mensaje);
				
				if (fn.after !== undefined) fn.after(data);
			}, "json"
		);
	};
	
	this.setEnvio = function(pedido, paqueteria, codigo, comentario, estado, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpedidos', {
				"action": "setEnvio",
				"id": pedido,
				"paqueteria": paqueteria,
				"codigo": codigo,
				"comentario": comentario,
				"estado": estado
			}, function(data) {
				if (data.band == false)
					console.log(data.mensaje == ''?"Upps. Ocurrió un error al guardar el codigo de rastreo":data.mensaje);
				
				if (fn.after !== undefined) fn.after(data);
			}, "json"
		);
	}
};
TProducto = function(){
	var self = this;
	
	this.add = function(id,	padre, clave, nombre, descripcion, precio,fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cproductos', {
				"id": id,
				"padre": padre,
				"clave": clave,
				"nombre": nombre,
				"descripcion": descripcion,
				"precio": precio,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cproductos', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar");
			}
		}, "json");
	};
	
	this.getImagenes = function(id, fn){
		$.post('cproductos', {
			"id": id,
			"action": "getImagenes"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
		}, "json");
	}
	
	this.addMasiva = function(padre, items, fn){
		if (fn.before !== undefined) fn.before();
		console.log(items);
		$.post('cproductos', {
				"padre": padre,
				"items": items,
				"action": "addMasiva"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.clonar = function(copiar, en, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cproductos', {
				"copiar": copiar,
				"en": en,
				"action": "clonar"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
	
	this.generarCatalogo = function(fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cproductos', {
				"action": "updateProductos"
			}, function(data){	
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.setVista = function(id, html, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cproductos', {
				"id": id,
				"html": html,
				"action": "setVista"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	}
};
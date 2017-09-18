TTextura = function(){
	var self = this;
	
	this.add = function(id,	clave, nombre, precio, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('ctexturas', {
				"id": id,
				"clave": clave,
				"nombre": nombre,
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
		$.post('ctexturas', {
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
};
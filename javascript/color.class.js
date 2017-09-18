TColor = function(){
	var self = this;
	
	this.add = function(id,	clave, nombre, codigo, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('ccolores', {
				"id": id,
				"clave": clave,
				"nombre": nombre,
				"codigo": codigo,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('ccolores', {
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
TPaqueteria = function(){
	var self = this;
	
	this.add = function(id,	url, nombre, costo, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cpaqueteria', {
				"id": id,
				"url": url,
				"nombre": nombre,
				"costo": costo,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cpaqueteria', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false')
				console.log("Ocurrió un error al eliminar");
		}, "json");
	};
};
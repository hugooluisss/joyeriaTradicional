TCliente = function(){
	var self = this;
	
	this.add = function(id,	nombre, email, rfc, direccion, razonSocial, localidad, telefono, celular, observaciones, tipo, sitioweb, estado, pass, street, city, state, zip, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cclientes', {
				"id": id,
				"nombre": nombre,
				"email": email,
				"rfc": rfc, 
				"direccion": direccion,
				"razonSocial": razonSocial,
				"localidad": localidad,
				"telefono": telefono,
				"celular": celular,
				"observaciones": observaciones,
				"tipo": tipo,
				"sitioWeb": sitioweb,
				"estado": estado,
				"pass": pass,
				"street": street,
				"city": city,
				"state": state,
				"zip": zip,
				"action": "add"
			}, function(data){
				if (data.band == 'false')
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cclientes', {
			"cliente": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al cliente");
			}
		}, "json");
	};
	
	this.getData = function(id, event){
		if (event.before !== undefined)
			event.before();
			
		$.get('?mod=cclientes&action=getData&id=' + id, function(data){
			if (event.after !== undefined)
				event.after(data);

		}, "json");
	}
};
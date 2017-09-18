$(document).ready(function(){
	var table = $("#tblDatos").DataTable({
		"responsive": true,
		"ordering": true,
		"autoWidth": true,
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
	});
	
	$("#multiplicator").change(function(){
		var multiplicador = $("#multiplicator").val();
		var info = table.page.info();
		table.page.len(-1).draw();
		var search = $('div#tblDatos_wrapper input').val();
		table.search("").draw();
		
		$.each($("#tblDatos").find("td[price]"), function(i, el){
			el = $(this);
			el.html((el.attr("price") * multiplicador).toFixed(2));
		});
		
		table.page.len(info.length);
		table.page(info.page);
		table.search(search).draw();
	});
});
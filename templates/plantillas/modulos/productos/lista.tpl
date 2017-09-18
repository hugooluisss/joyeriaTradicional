{foreach from=$productos item="row"}
<div class="row">
	<div class="col-md-7">
		<div class="col-md-{12-$nivel} col-md-offset-{$nivel}">
			<button class="btn btn-default btn-xs" action="hijos" title="Hijos" datos='{$row.json}' hijos="{if $row.hijos}si{/if}"><i class="fa fa-plus"></i></button>
			{$row.nombre}
		</div>
	</div>
	<div class="col-md-1 text-right">{$row.precio}</div>
	<div class="col-md-1 text-right">{$row.venta}</div>
	<div class="col-md-3">
		<input type="checkbox" value="{$row.idProducto}" title="Copiar" class="copiar"/> 
		<button type="button" class="btn btn-success btn-xs" action="agregar" title="Nuevo" datos='{$row.json}'><i class="fa fa-plus"></i></button>
			<button type="button" class="btn btn-default btn-xs" action="imagen" title="Imagen" identificador="{$row.idProducto}"><i class="fa fa-picture-o"></i></button>
			<button type="button" class="btn btn-default btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
			<button type="button" class="btn btn-info btn-xs" action="masivo" title="Insertar masivamente" datos='{$row.json}'><i class="fa fa-flag"></i></button>
			<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" datos='{$row.json}'><i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-default btn-xs" action="pegar" title="Pegar" datos='{$row.json}'><i class="fa fa-paste"></i></button>
			<button type="button" class="btn btn-default btn-xs" action="html" title="Vista en HTML" datos='{$row.json}'><i class="fa fa-code"></i></button>
	</div>
</div>

<div id="dvLista{$row.idProducto}"></div>
{/foreach}
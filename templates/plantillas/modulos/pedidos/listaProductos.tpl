<table id="tblProductos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Nombre</th>
			<th>Precio</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item=row}
		<tr>
			<td>{$row.clave}</td>
			<td>{$row.nombre}</td>
			<td class="text-right">{$row.precio}</td>
			<td class="text-right">
				<button type="button" class="btn btn-default" action="seleccionar" title="Seleccionar" producto='{$row.json}'>
					<i class="fa fa-hand-pointer-o"></i>
				</button>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>
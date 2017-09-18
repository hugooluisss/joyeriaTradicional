<table id="tblClientes" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item=row}
		<tr>
			<td>{$row.idCliente}</td>
			<td>{$row.nombre}</td>
			<td class="text-right">
				<button type="button" class="btn btn-default" action="seleccionar" title="Seleccionar" cliente='{$row.json}'>
					<i class="fa fa-hand-pointer-o"></i>
				</button>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>
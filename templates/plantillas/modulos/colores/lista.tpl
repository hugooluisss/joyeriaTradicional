<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Código</th>
					<th>Ícono</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td style="border-left: 2px solid {$row.codigo}">{$row.idColor}</td>
						<td>{$row.clave}</td>
						<td>{$row.nombre}</td>
						<td style="color: {$row.codigo}">{$row.codigo}</td>
						<td class="text-center">
							<a href="repositorio/colores/color_{$row.idColor}.jpg" target="_blank">
								<img src="repositorio/colores/color_{$row.idColor}.jpg" onerror="javascript: this.src='{$PAGE.iconos}sinicono.jpg';" style="width: 20px;" />
							</a>
						</td>
						<td class="text-right">
							<button type="button" class="btn btn-default" action="imagen" title="Imagen" identificador="{$row.idColor}"><i class="fa fa-picture-o"></i></button>
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="{$row.idColor}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
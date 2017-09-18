<div class="box">
	<div class="box-body">
		<button class="btn-success btn btn-xs" id="btnMostrar">Mostrar todas</button>
		<button class="btn-danger btn btn-xs" id="btnOcultar">Ocultar "Adding Products"</button>
		
		
		<table id="tblPedidos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idPedido}</td>
						<td style="border-left: solid 1px {$row.color}">{$row.fecha}</td>
						<td><b>{$row.nombre}</b> <small>({$row.razonsocial})</small></td>
						<td style="color: {$row.color}" class="text-center">
							{$row.estado}
							{if $row.codigo neq ''}
								<br />
								<small>Tracking {$row.codigo}</small>
							{/if}
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="rastreo" title="Envio" datos='{$row.json}'><i class="fa fa-motorcycle"></i></button>
							<button type="button" class="btn btn-default" action="pdf" title="Imprimir" datos='{$row.json}'><i class="fa fa-file-pdf-o"></i></button>
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" pedido="{$row.idPedido}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>
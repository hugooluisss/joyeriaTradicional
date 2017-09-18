<button class="btn btn-success" pedido="{$pedido->getId()}" id="btnImprimir"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
<table id="tblMovimientos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Clave</th>
			<th>Descripción</th>
			<th>Cant</th>
			<th>Precio</th>
			{if $pedido->estado->getId() eq 1}
			<th>&nbsp;</th>
			{/if}
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item=row}
		<tr>
			<td>{$row.clave}</td>
			<td>{$row.descripcion}</td>
			<td>{$row.cantidad}</td>
			<td>{$row.precio}</td>
			
			<td class="text-right">
				<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" movimiento="{$row.idMovimiento}"><i class="fa fa-times"></i></button>
			</td>
		</tr>
		{/foreach}
	</tbody>
</table>

<div class="row">
	<div class="col-sm-offset-8 col-sm-4">
		<div class="alert alert-info text-right">
			<div class="row">
				<div class="col-md-6">
					<strong>Subtotal</strong>
				</div>
				<div class="col-md-6">
					$ {$subtotal}
				</div>
			</div>
		</div>
		<div class="alert alert-success text-right">
			<div class="row">
				<div class="col-md-6">
					<strong>Descuento ({$etiquetaDescuento}%)</strong>
				</div>
				<div class="col-md-6">
					$ {$descuento}
				</div>
			</div>
		</div>
		<div class="alert alert-warning text-right">
			<div class="row">
				<div class="col-md-6">
					<strong>Total</strong>
				</div>
				<div class="col-md-6">
					$ {$total}
				</div>
			</div>
		</div>
	</div>
</div>
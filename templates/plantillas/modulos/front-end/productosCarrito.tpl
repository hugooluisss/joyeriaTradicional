<table id="tblCarrito" class="table table-hover table-condensed">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<!--<th class="visible-xs">&nbsp;</th>-->
			<th class="text-center">Description</th>
			<th class="text-center">
				<span class="hidden-xs">Pieces</span>
				<!--<span class="visible-xs">P</span>-->
			</th>
			<th class="text-center">
				<span class="hidden-xs">Unit Price</span>
				<span class="visible-xs">Qty</span>
			</th>
			<th class="text-center">
				<span class="hidden-xs">Product Total</span>
				<span class="visible-xs">Total</span>
			</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
		<tr>
			<td><input type="checkbox" value="{$row.idMovimiento}"/></td>
			<!--<td class="visible-xs">{$row.clave}</td> -->
			<td class="hidden-xs">{$row.descripcion}</td>
			<td class="visible-xs">{$row.descripcion|truncate:30:"...":true}</td>
			<td class="text-right">{$row.cantidad}</td>
			<td class="text-right">{$row.precio / $row.cantidad|string_format:"%.2f"}</td>
			<td class="text-right">{$row.precio}</td>
		</tr>
		{foreachelse}
			<tr>
				<td class="text-center" colspan="5">None</td>
			</tr>
		{/foreach}
	</tbody>
</table>

<div class="row">
	<div class="col-md-5">
		<a class="btn btn-delete btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Remove selected items</a>
	</div>
	<div class="col-md-7">
		<div class="alert alert-gris">
			<div class="row">
				<div class="col-xs-6 col-sm-9 text-right">DISCOUNT</div>
				<div class="col-xs-6 col-sm-3 text-right">{$etiquetaDescuento}%</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-9 text-right">ESTIMATED SUBTOTAL(USD)</div>
				<div class="col-xs-6 col-sm-3 text-right">{$total}</div>
			</div>
		</div>
	</div>
</div>
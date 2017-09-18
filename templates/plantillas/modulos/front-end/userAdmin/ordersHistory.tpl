<div class="page-header">
	<h1>Order History</h1>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body" style="width: 100%; overflow-x: scroll">
				<table id="tblOrdenes" class="table table-hover">
					<thead>
						<tr>
							<th class="text-center">DATE PLACED</th>
							<th class="text-center">SUBTOTAL (USD)</th>
							<th class="text-center">STATUS</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$ordenes item="row"}
							<tr>
								<td>{$row.fecha|date_format}</td>
								<td class="text-right">$ {$row.subtotal|string_format:"%.02f"}</td>
								<td class="text-center">
									<div class="colorEstado" style="background: {$row.color}">
										{$row.estado}
										{if $row.codigo}
										<br />
										<small>
										{if $row.url neq ''}
											<a target="_blank" href="{$row.url}">{$row.paqueteria}</a><br />
										{else}
											{$row.paqueteria}<br />
										{/if}
										<b>Code: </b>{$row.codigo}
										</small>
										{/if}
									</div>
								</td>
								<td style="text-align: center">
									<button class="btn btn-gris viewOrder" pedido="{$row.idPedido}">VIEW ORDER</button>
								</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
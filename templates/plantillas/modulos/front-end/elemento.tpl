<div class="row producto">
	<div class="col-xs-12 col-sm-6">
		<div class="panel panel-default">
			<div class="panel-body">
				{if count($item.img) eq 0}
					<img src="{$PAGE.iconos}/items.jpg"/>
				{else}
					<img src="repositorio/productos/producto_{$item.idProducto}/{$item.img[0]}"/>
				{/if}
			</div>
			<div class="panel-footer">
				{$item.nombre} <b>{$item.clave}</b>
				<p>
					{$item.descripcion}
				</p>
			</div>
		</div>
	</div>
</div>
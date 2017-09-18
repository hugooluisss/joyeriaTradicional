{if $vista eq ''}
	<div class="bar icons">
		{foreach from=$nodosPrimerNivel item="row"}
			<a href="{$row.url}" title="{$row.nombre}">
				<img src="repositorio/img/iconosproductos/{$row.idProducto}.png" onmouseover='javascript: this.src="repositorio/img/iconosproductos/{$row.idProducto}_hover.png"' onmouseout='javascript: this.src="repositorio/img/iconosproductos/{$row.idProducto}.png"'/>
			</a>
		{/foreach}
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				<h3 class="page-title">{$nombreItem}</h3>
			</div>
			{if $vista eq ''}
				<div class="col-md-4 col-sm-6 col-xs-12 pull-right text-right">
					SORT BY
					<div class="btn-group order">
						<button type="button" class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{if $ordenProductos eq ''}NEWEST{else}{$ordenProductos}{/if}&nbsp;</button>
						<button type="button" class="btn btn-secundary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
						<div class="dropdown-menu">
							<li><a class="dropdown-item order" valor="NEWEST" href="#" onclick="javascript: return false">NEWEST</a></li>
							<li><a class="dropdown-item order" valor="MOST POPULAR" href="#" onclick="javascript: return false">MOST POPULAR</a></li>
						</div>
					</div>
				</div>
			{/if}
		</div>
	</div>
	<br />

	<div class="container">	
		<ol class="breadcrumb hidden-xs">
			{foreach from=$breadcrumb item="row"}
				<li><a href="{$row.url}">{$row.nombre}</a></li>
			{/foreach}
		</ol>
		
		<ol class="breadcrumb visible-xs">
			{foreach from=$breadcrumb item="row"}
				<li><a href="{$row.url}">{$row.clave}</a></li>
			{/foreach}
		</ol>
		
		{if count($hijos) > 0}
			{foreach from=$hijos item="row"}
				<a href="{$row.url}">
					<div class="col-md-3 col-xs-12 col-sm-6" item="{$row.idProducto}">
						<div class="panel panel-default">
							<div class="panel-body">
								{if count($row.img) eq 0}
									<img src="{$PAGE.iconos}/items.jpg"/>
								{else}
									<img src="repositorio/productos/producto_{$row.idProducto}/{$row.img[0]}"/>
								{/if}
							</div>
							<div class="panel-footer">
								{$row.nombre} <b>{$row.clave}</b>
							</div>
						</div>
					</div>
				</a>
			{/foreach}
		{else}
			{include file=$PAGE.rutaModulos|cat:"modulos/front-end/elemento.tpl"}
		{/if}
	</div>
{else}
	<br />
	<div class="bar icons">
		{foreach from=$nodosPrimerNivel item="row"}
			<a href="{$row.url}" title="{$row.nombre}">
				<img src="repositorio/img/iconosproductos/{$row.idProducto}.png" onmouseover='javascript: this.src="repositorio/img/iconosproductos/{$row.idProducto}_hover.png"' onmouseout='javascript: this.src="repositorio/img/iconosproductos/{$row.idProducto}.png"'/>
			</a>
		{/foreach}
	</div>
	<!--
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				<h3 class="page-title">{$nombreItem}</h3>
			</div>
		</div>
	</div>
	<br />-->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				<h3 class="page-title">{$nombreItem}</h3>
			</div>
		</div>
	</div>
	
	<div class="container">
		<ol class="breadcrumb hidden-xs">
			{foreach from=$breadcrumb item="row"}
				<li><a href="{$row.url}">{$row.nombre}</a></li>
			{/foreach}
		</ol>
		
		<ol class="breadcrumb visible-xs">
			{foreach from=$breadcrumb item="row"}
				<li><a href="{$row.url}">{$row.clave}</a></li>
			{/foreach}
		</ol>
		<div id="vistaPage">
			{$vista}
			{if $PAGE.sesion.perfil eq "cliente"}
			<div class="text-center">
					<b><a href="#" class="addProducto btn btn-info" identificador="{$itemId}" totalEtiquetas="{$etiquetas|@count}" onclick="javascript: return false;" style="font-size: 16px; color: black"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Select size and color!</a></b>
					<br />
					<br />
			</div>
			{/if}
		</div>
	</div>
	
	{include file=$PAGE.ruta|cat:"plantillas/modulos/front-end/carrito.tpl"}
{/if}
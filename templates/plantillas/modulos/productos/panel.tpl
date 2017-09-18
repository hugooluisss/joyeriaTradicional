<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de Productos</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<button id="btnProductoPrincipal" class="btn btn-info"><i class="fa fa-plus"></i> Nodo principal</button>
		<button id="btnGenerarArticulos" class="btn btn-danger pull-right"><i class="fa fa-wrench" aria-hidden="true"></i>
 Actualizar catálogo de artículos</button>
	 	<button id="btnUploadXls" class="btn btn-primary pull-right" data-toggle="modal" data-target="#winUploadXls"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
 Subir catálogo</button>
	 	{if file_exists("repositorio/catalogo.xls")}
	 	<a href="repositorio/catalogo.xls" class="btn btn-success pull-right" download="Price List {date("F d Y H:i:s", filectime("repositorio/catalogo.xls"))}.xls">Descargar catálogo</a>
	 	{/if}
	</div>
</div>
<br />
<div class="box">
	<div class="box-body">
		<div class="row text-success text-center">
			<div class="col-md-7">Productos</div>
			<div class="col-md-1">Precio</div>
			<div class="col-md-1">Venta</div>
			<div class="col-md-2">&nbsp;</div>
		</div>
		<hr />
		<div id="dvLista">
		</div>
	</div>
</div>

<div class="modal fade" id="winProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Productos</h1>
			</div>
			<div class="modal-body">
				<form action="#" onsubmit="javascript: return false;" id="frmProducto">
					<div class="row">
						<label class="col-xs-4" for="txtClave">Clave</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" id="txtClave" name="txtClave">
						</div>
					</div>
					<div class="row">
						<label class="col-xs-4" for="txtNombre">Nombre</label>
						<div class="col-xs-8">
							<input type="text" class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="row">
						<label class="col-xs-4" for="txtNombre">Descripción</label>
						<div class="col-xs-8">
							<textarea class="form-control" id="txtDescripcion"  name="txtDescripcion" rows="5"></textarea>
						</div>
					</div>
					<div class="row">
						<label class="col-xs-4" for="txtPrecio">Precio</label>
						<div class="col-xs-3">
							<input type="text" class="form-control" id="txtPrecio" name="txtPrecio">
						</div>
					</div>
					<input type="submit" value="Guardar" class="btn btn-success"/>
					<input type="hidden" id="id" name="id" value="" />
					<input type="hidden" id="padre" name="padre" value="" />
					<input type="hidden" id="hijos" name="hijos" value="" />
					<input type="hidden" id="nivel" name="nivel" value="" />
					<input type="hidden" id="venta" name="venta" value="" />
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="winUploadImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Imágenes</h1>
			</div>
			<div class="modal-body">
				<form method="post" action="?mod=cpedidos&action=uploadfile2" enctype="multipart/form-data">
					<input type="file" name="upl" multiple />
					<input type="hidden" name="producto" id="producto" />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="winMasivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Inserción masiva por caracteristicas</h1>
			</div>
			<div class="modal-body">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#colores">Colores</a>
							</h4>
						</div>
						<div id="colores" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-3">
										<label for="txtPrecio">Precio general</label>
									</div>
									<div class="col-md-2">
										<input type="text" value="0.00" id="txtPrecio" name="txtPrecio" class="form-control text-right" />
									</div>
								</div>
								<hr />
								{foreach from=$colores item="row"}
									<div class="checkbox">
										<label style="color: {$row.codigo}"><input type="checkbox" value="{$row.idColor}" class="colores" datos='{$row.json}'>{$row.nombre}</label>
									</div>
								{/foreach}
								<br />
								<div class="row">
									<div class="col-md-12 text-right">
										<button class="btn btn-success" tipo="colores">Agregar seleccionados</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#tamano">Tamaños</a>
							</h4>
						</div>
						<div id="tamano" class="panel-collapse collapse">
							<div class="panel-body">
								{foreach from=$tamanos item="row"}
									<div class="checkbox">
										<label><input type="checkbox" value="{$row.idSize}" class="tamanos" datos='{$row.json}'>{$row.nombre} <small class="text-muted">$ {$row.precio}</small></label>
									</div>
								{/foreach}
								
								<br />
								<div class="row">
									<div class="col-md-12 text-right">
										<button class="btn btn-success" tipo="tamanos">Agregar seleccionados</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#texturas">Texturas</a>
							</h4>
						</div>
						<div id="texturas" class="panel-collapse collapse">
							<div class="panel-body">
								{foreach from=$texturas item="row"}
									<div class="checkbox">
										<label><input type="checkbox" value="{$row.idTextura}" class="texturas" datos='{$row.json}'>{$row.nombre} <small class="text-muted">$ {$row.precio}</small></label>
									</div>
								{/foreach}
								<br />
								<div class="row">
									<div class="col-md-12 text-right">
										<button class="btn btn-success" tipo="texturas">Agregar seleccionados</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="winHTML" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Vista en HTML</h1>
			</div>
			<div class="modal-body">
				<textarea id="txtHTML" name="txtHTML" class="form-control" rows="10"></textarea>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="winUploadXls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Subir XLS</h1>
			</div>
			<div class="modal-body">
				<form method="post" action="?mod=cproductos&action=uploadXLS" enctype="multipart/form-data">
					<input type="file" name="upl" multiple />
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>
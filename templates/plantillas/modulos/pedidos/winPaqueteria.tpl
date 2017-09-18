<div class="modal fade" id="winRastreo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1>Paqueteria</h1>
			</div>
			<div class="modal-body">
				<form role="form" id="frmAddRastreo" class="form-horizontal" onsubmit="javascript: return false;">
					<div class="form-group">
						<label for="selPaqueteria" class="col-sm-4 control-label">Paqueteria</label>
						<div class="col-sm-8">
							<select class="form-control" id="selPaqueteria" name="selPaqueteria">
								{foreach from=$listaPaqueteria item=paqueteria}
									<option value="{$paqueteria.idPaqueteria}">{$paqueteria.nombre} - {$paqueteria.costo}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selEstado" class="col-sm-4 control-label">Estado de la orden</label>
						<div class="col-sm-8">
							<select class="form-control" id="selEstado" name="selEstado">
								{foreach from=$estados item=estado}
									<option value="{$estado.idEstado}">{$estado.nombre}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtRastreo" class="col-sm-4 control-label">Código de rastreo</label>
						<div class="col-sm-8">
							<input type="text" id="txtRastreo" name="txtRastreo" autofocus="true" class="form-control" autocomplete="false"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtComentario" class="col-sm-4 control-label">Comentario</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="txtComentario" name="txtComentario"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 text-right">
							<button type="submit" id="btnSubmit" class="btn btn-default">Guardar</button>
							<input type="hidden" value="" id="pedido" name="pedido" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		{if $PAGE.modulo eq "clienteDatos"}<h1>Bienvenido</h1>{/if}
		<div class="box-body">
			<div class="form-group">
				<label for="selTipo" class="col-lg-2">Tipo</label>
				<div class="col-lg-3">
					<select class="form-control" id="selTipo" name="selTipo">
						<option value="F" {if $cliente->getTipo() eq 'F'}selected{/if}>Persona
						<option value="E" {if $cliente->getTipo() eq 'M'}selected{/if}>Empresa
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="selTipo" class="col-lg-2">Estado</label>
				<div class="col-lg-3">
					<select class="form-control" id="selEstado" name="selEstado">
						<option value="R" {if $cliente->getEstado() eq 'R'}selected{/if}>Registrado
						<option value="A" {if $cliente->getEstado() eq 'A'}selected{/if}>Activo
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="txtRazonSocial" class="col-lg-2">Nombre de la tienda / Razón social</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtRazonSocial" name="txtRazonSocial" value="{$cliente->getRazonSocial()}">
				</div>
			</div>		
			<div class="form-group">
				<label for="txtNombre" class="col-lg-2">Nombre completo</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtNombre" name="txtNombre" value="{$cliente->getNombre()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-lg-2">Dirección</label>
				<div class="col-lg-3">
					<textarea class="form-control" id="txtDireccion" name="txtDireccion">{$cliente->getDireccion()}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="txtLocalidad" class="col-lg-2">Localidad</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtLocalidad" name="txtLocalidad" value="{$cliente->getLocalidad()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-lg-2">Teléfono</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="{$cliente->getTelefono()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtCelular" class="col-lg-2">Celular</label>
				<div class="col-lg-2">
					<input class="form-control" id="txtCelular" name="txtCelular" value="{$cliente->getCelular()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtEmail" class="col-lg-2">Correo electrónico</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtEmail" name="txtEmail" type="email" value="{$cliente->getEmail()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtPass" class="col-lg-2">Contraseña</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtPass" name="txtPass" type="password" value="{$cliente->getPass()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtRFC" class="col-lg-2">TaxID/VAT/Import number</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtRFC" name="txtRFC" type="text" value="{$cliente->getRFC()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtRFC" class="col-lg-2">Sitio web</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtSitio" name="txtSitio" type="text" value="{$cliente->getSitioWeb()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtObservaciones" class="col-lg-2">Observaciones</label>
				<div class="col-lg-3">
					<textarea class="form-control" id="txtObservaciones" name="txtObservaciones">{$cliente->getObservaciones()}</textarea>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label for="txtStreet" class="col-lg-2">Calle</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtStreet" name="txtStreet" type="text" value="{$cliente->getStreet()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtCity" class="col-lg-2">Ciudad</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtCity" name="txtCity" type="text" value="{$cliente->getCity()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtState" class="col-lg-2">Estado</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtState" name="txtState" type="text" value="{$cliente->getState()}">
				</div>
			</div>
			<div class="form-group">
				<label for="txtZip" class="col-lg-2">ZIP</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtZip" name="txtZip" type="text" value="{$cliente->getZip()}">
				</div>
			</div>
		</div>
		<div class="box-footer">
			<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id" value="{$cliente->getId()}"/>
			<!--<input class="form-control" id="txtPass" name="txtPass" type="hidden" value="{$cliente->getPass()}">-->
		</div>
	</div>
</form>
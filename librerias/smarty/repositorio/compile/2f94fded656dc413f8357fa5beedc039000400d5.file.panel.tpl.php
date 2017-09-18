<?php /* Smarty version Smarty-3.1.11, created on 2017-05-04 13:16:08
         compiled from "templates/plantillas/modulos/pedidos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13407914465908926cea31b0-48002280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f94fded656dc413f8357fa5beedc039000400d5' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/panel.tpl',
      1 => 1485893053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13407914465908926cea31b0-48002280',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5908926cee64e6_23330905',
  'variables' => 
  array (
    'estados' => 0,
    'item' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5908926cee64e6_23330905')) {function content_5908926cee64e6_23330905($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/gorillaglass/librerias/smarty/plugins/modifier.date_format.php';
?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pedidos</h1>
	</div>
</div>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#lista">Lista</a></li>
	<li><a data-toggle="tab" href="#add">Agregar o modificar</a></li>
</ul>




<div class="tab-content">
	<div id="lista" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	<div id="add" class="tab-pane fade" style="background: white">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtFecha" class="col-sm-2 control-label">Fecha *</label>
				<div class="col-sm-2">
					<input type="text" id="txtFecha" name="txtFecha" autofocus="true" class="form-control" autocomplete="false" value="<?php echo smarty_modifier_date_format(time(),"Y-m-d");?>
" placeholder="Y-m-d"/>
					<div id="datepicker"></div>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCliente" class="col-sm-2 control-label">Cliente *</label>
				<div class="col-sm-6">
					<input type="text" id="txtCliente" name="txtCliente" autofocus="true" class="form-control" autocomplete="false" disabled="true" />
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default btn-block" id="btnBuscarClientes"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</div>
			<button type="submit" class="btn btn-info pull-right">Guardar</button>
			<input type="hidden" id="id"/>
		</form>
		<br/><br/>
		<hr />
		<br/>
		<form role="form" id="frmAddProductos" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtClave" class="col-sm-2 control-label">Producto</label>
				<div class="col-sm-2">
					<input type="text" id="txtClave" name="txtClave" autofocus="true" class="form-control" autocomplete="false" placeholder="clave" disabled="false"/>
				</div>
				<div class="col-sm-5">
					<input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" autocomplete="false" placeholder="Descripción" disabled="false"/>
				</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-default btn-block" id="btnBuscarProductos"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</div>
			<div class="form-group">
				<label for="txtCantidad" class="col-sm-2 control-label">Cantidad</label>
				<div class="col-sm-2">
					<input type="text" id="txtCantidad" name="txtCantidad" autofocus="true" class="form-control" autocomplete="false" placeholder="Cantidad"/>
				</div>
				<label for="txtCantidad" class="col-sm-offset-2 col-sm-2 control-label">Precio Unitario</label>
				<div class="col-sm-2">
					<input type="text" id="txtPrecio" name="txtPrecio" class="form-control text-right" disabled readonly autocomplete="false" placeholder="Precio"/>
				</div>
				<div class="col-sm-1 text-right">
					<button type="submit" id="btnReset" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></button>
				</div>
			</div>
		</form>
		<br/>
		<hr />
		<div class="row">
			<div class="col-md-3 col-md-offset-5 text-right">
				<b>Estado</b>
			</div>
			<div class="col-md-4">
				<select class="form-control" id="selEstado" name="selEstado" anterior="">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>

					<?php } ?>
				</select>
			</div>
		</div>
		<br />
		<div id="lstMovimiento"></div>
	</div>
</div>


<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pedidos/winClientes.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pedidos/winProductos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pedidos/winPaqueteria.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
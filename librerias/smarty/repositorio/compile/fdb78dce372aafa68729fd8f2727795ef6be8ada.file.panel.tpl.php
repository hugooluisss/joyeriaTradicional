<?php /* Smarty version Smarty-3.1.11, created on 2017-04-25 19:46:21
         compiled from "templates/plantillas/modulos/paqueteria/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189837699758ffeddd0fd257-77945461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdb78dce372aafa68729fd8f2727795ef6be8ada' => 
    array (
      0 => 'templates/plantillas/modulos/paqueteria/panel.tpl',
      1 => 1486005266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189837699758ffeddd0fd257-77945461',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58ffeddd1444f3_13415458',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ffeddd1444f3_13415458')) {function content_58ffeddd1444f3_13415458($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de servicios de paqueteria</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista"></div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">	
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtURL" class="col-lg-2">URL</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtURL" name="txtURL" type="text">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCosto" class="col-lg-2">Costo</label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtCosto" name="txtCosto" type="number">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>
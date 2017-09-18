<?php /* Smarty version Smarty-3.1.11, created on 2017-05-04 13:16:22
         compiled from "templates/plantillas/modulos/clientes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2085913159590b68140059f1-32329107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b0420e588c8f140981aaefc6982f8fda3e4f189' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/panel.tpl',
      1 => 1474999783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2085913159590b68140059f1-32329107',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_590b68140c7229_10471910',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b68140c7229_10471910')) {function content_590b68140c7229_10471910($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de clientes</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/clientes/modificar.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div><?php }} ?>
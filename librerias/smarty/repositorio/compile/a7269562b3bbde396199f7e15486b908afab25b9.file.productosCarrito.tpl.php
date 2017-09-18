<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:26:44
         compiled from "templates/plantillas/modulos/front-end/productosCarrito.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175705662659089724d8cef0-15149692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7269562b3bbde396199f7e15486b908afab25b9' => 
    array (
      0 => 'templates/plantillas/modulos/front-end/productosCarrito.tpl',
      1 => 1490115681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175705662659089724d8cef0-15149692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'etiquetaDescuento' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59089725089a53_61915049',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59089725089a53_61915049')) {function content_59089725089a53_61915049($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/Library/WebServer/Documents/gorillasglass/librerias/smarty/plugins/modifier.truncate.php';
?><table id="tblCarrito" class="table table-hover table-condensed">
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
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<tr>
			<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMovimiento'];?>
"/></td>
			<!--<td class="visible-xs"><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td> -->
			<td class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
			<td class="visible-xs"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['descripcion'],30,"...",true);?>
</td>
			<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</td>
			<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio']/sprintf("%.2f",$_smarty_tpl->tpl_vars['row']->value['cantidad']);?>
</td>
			<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
		</tr>
		<?php }
if (!$_smarty_tpl->tpl_vars["row"]->_loop) {
?>
			<tr>
				<td class="text-center" colspan="5">None</td>
			</tr>
		<?php } ?>
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
				<div class="col-xs-6 col-sm-3 text-right"><?php echo $_smarty_tpl->tpl_vars['etiquetaDescuento']->value;?>
%</div>
			</div>
			<div class="row">
				<div class="col-xs-6 col-sm-9 text-right">ESTIMATED SUBTOTAL(USD)</div>
				<div class="col-xs-6 col-sm-3 text-right"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
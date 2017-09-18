<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:26:58
         compiled from "templates/plantillas/modulos/front-end/userAdmin/ordersHistory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20018003559089732500bd9-10969790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c8aa64d0b614a5cfab706be2cbaebef01fc63b9' => 
    array (
      0 => 'templates/plantillas/modulos/front-end/userAdmin/ordersHistory.tpl',
      1 => 1485974553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20018003559089732500bd9-10969790',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ordenes' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59089732586453_88274270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59089732586453_88274270')) {function content_59089732586453_88274270($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/gorillasglass/librerias/smarty/plugins/modifier.date_format.php';
?><div class="page-header">
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
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ordenes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
							<tr>
								<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['fecha']);?>
</td>
								<td class="text-right">$ <?php echo sprintf("%.02f",$_smarty_tpl->tpl_vars['row']->value['subtotal']);?>
</td>
								<td class="text-center">
									<div class="colorEstado" style="background: <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
">
										<?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>

										<?php if ($_smarty_tpl->tpl_vars['row']->value['codigo']){?>
										<br />
										<small>
										<?php if ($_smarty_tpl->tpl_vars['row']->value['url']!=''){?>
											<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['paqueteria'];?>
</a><br />
										<?php }else{ ?>
											<?php echo $_smarty_tpl->tpl_vars['row']->value['paqueteria'];?>
<br />
										<?php }?>
										<b>Code: </b><?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>

										</small>
										<?php }?>
									</div>
								</td>
								<td style="text-align: center">
									<button class="btn btn-gris viewOrder" pedido="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
">VIEW ORDER</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><?php }} ?>
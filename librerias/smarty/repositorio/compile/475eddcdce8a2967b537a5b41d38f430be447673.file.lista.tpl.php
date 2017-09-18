<?php /* Smarty version Smarty-3.1.11, created on 2017-05-04 13:16:10
         compiled from "templates/plantillas/modulos/pedidos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115925172586d3088aa30a5-62389873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '475eddcdce8a2967b537a5b41d38f430be447673' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/lista.tpl',
      1 => 1493919696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115925172586d3088aa30a5-62389873',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_586d3088b29342_32903549',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586d3088b29342_32903549')) {function content_586d3088b29342_32903549($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<button class="btn-success btn btn-xs" id="btnMostrar">Mostrar todas</button>
		<button class="btn-danger btn btn-xs" id="btnOcultar">Ocultar "Adding Products"</button>
		
		
		<table id="tblPedidos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
</td>
						<td style="border-left: solid 1px <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
						<td><b><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</b> <small>(<?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
)</small></td>
						<td style="color: <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
" class="text-center">
							<?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>

							<?php if ($_smarty_tpl->tpl_vars['row']->value['codigo']!=''){?>
								<br />
								<small>Tracking <?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
</small>
							<?php }?>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-default" action="rastreo" title="Envio" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-motorcycle"></i></button>
							<button type="button" class="btn btn-default" action="pdf" title="Imprimir" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-file-pdf-o"></i></button>
							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" pedido="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.11, created on 2017-05-04 13:16:23
         compiled from "templates/plantillas/modulos/clientes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301664634590b6814907ba2-39378345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b3d926bdf5ef13138597e908a4dd74ad59633ab' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/lista.tpl',
      1 => 1475694184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301664634590b6814907ba2-39378345',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_590b681498dbf5_61771380',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590b681498dbf5_61771380')) {function content_590b681498dbf5_61771380($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblClientes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>E-mail</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['row']->value['estado']=='R'){?>Registrado<?php }else{ ?>Activo<?php }?></td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" cliente="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>
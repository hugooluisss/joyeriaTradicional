<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:06:36
         compiled from "templates/plantillas/modulos/pedidos/winPaqueteria.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151295336058bf0003daf324-52072836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b26ab42ed7d03e08d6bcce16bd098cefe30b64d5' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/winPaqueteria.tpl',
      1 => 1493733910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151295336058bf0003daf324-52072836',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58bf0003dd3364_39527522',
  'variables' => 
  array (
    'listaPaqueteria' => 0,
    'paqueteria' => 0,
    'estados' => 0,
    'estado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58bf0003dd3364_39527522')) {function content_58bf0003dd3364_39527522($_smarty_tpl) {?><div class="modal fade" id="winRastreo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
								<?php  $_smarty_tpl->tpl_vars['paqueteria'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paqueteria']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaPaqueteria']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paqueteria']->key => $_smarty_tpl->tpl_vars['paqueteria']->value){
$_smarty_tpl->tpl_vars['paqueteria']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['paqueteria']->value['idPaqueteria'];?>
"><?php echo $_smarty_tpl->tpl_vars['paqueteria']->value['nombre'];?>
 - <?php echo $_smarty_tpl->tpl_vars['paqueteria']->value['costo'];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selEstado" class="col-sm-4 control-label">Estado de la orden</label>
						<div class="col-sm-8">
							<select class="form-control" id="selEstado" name="selEstado">
								<?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['estado']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value['nombre'];?>
</option>
								<?php } ?>
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
</div><?php }} ?>
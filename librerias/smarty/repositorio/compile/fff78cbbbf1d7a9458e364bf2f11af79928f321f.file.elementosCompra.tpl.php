<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:26:44
         compiled from "templates/plantillas/modulos/front-end/elementosCompra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40862468359089724ab2e03-17464589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fff78cbbbf1d7a9458e364bf2f11af79928f321f' => 
    array (
      0 => 'templates/plantillas/modulos/front-end/elementosCompra.tpl',
      1 => 1493733910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40862468359089724ab2e03-17464589',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'index' => 0,
    'etiquetas' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59089724b0ed58_65440036',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59089724b0ed58_65440036')) {function content_59089724b0ed58_65440036($_smarty_tpl) {?><select class="selectpicker" style="widht: 80%;" <?php if ($_smarty_tpl->tpl_vars['index']->value==$_smarty_tpl->tpl_vars['etiquetas']->value){?>multiple<?php }?> nivels="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" total="<?php echo count($_smarty_tpl->tpl_vars['etiquetas']->value);?>
">
	<?php if ($_smarty_tpl->tpl_vars['index']->value!=$_smarty_tpl->tpl_vars['etiquetas']->value){?>
	<option value="" datos="">Select</option>
	<?php }?>
<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
	<option value='<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
' datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
<?php } ?>
</select>
<?php }} ?>
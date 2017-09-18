<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:06:52
         compiled from "templates/plantillas/layout/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6109208695908927cbb66c7-23216600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72901d00223ef61af04899ba43850d9da70bd5c9' => 
    array (
      0 => 'templates/plantillas/layout/update.tpl',
      1 => 1472745128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6109208695908927cbb66c7-23216600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5908927cbe8ae3_61960183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5908927cbe8ae3_61960183')) {function content_5908927cbe8ae3_61960183($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['PAGE']->value['vista']!=''){?>
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['PAGE']->value['vista'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>
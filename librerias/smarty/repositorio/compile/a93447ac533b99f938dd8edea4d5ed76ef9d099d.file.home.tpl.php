<?php /* Smarty version Smarty-3.1.11, created on 2017-05-04 13:51:34
         compiled from "templates/plantillas/modulos/front-end/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15804035635908971de67347-70830351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a93447ac533b99f938dd8edea4d5ed76ef9d099d' => 
    array (
      0 => 'templates/plantillas/modulos/front-end/home.tpl',
      1 => 1490910036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15804035635908971de67347-70830351',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5908971e0aa5f3_61019068',
  'variables' => 
  array (
    'vista' => 0,
    'nodosPrimerNivel' => 0,
    'row' => 0,
    'nombreItem' => 0,
    'ordenProductos' => 0,
    'breadcrumb' => 0,
    'hijos' => 0,
    'PAGE' => 0,
    'itemId' => 0,
    'etiquetas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5908971e0aa5f3_61019068')) {function content_5908971e0aa5f3_61019068($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['vista']->value==''){?>
	<div class="bar icons">
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nodosPrimerNivel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
">
				<img src="repositorio/img/iconosproductos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
.png" onmouseover='javascript: this.src="repositorio/img/iconosproductos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
_hover.png"' onmouseout='javascript: this.src="repositorio/img/iconosproductos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
.png"'/>
			</a>
		<?php } ?>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				<h3 class="page-title"><?php echo $_smarty_tpl->tpl_vars['nombreItem']->value;?>
</h3>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['vista']->value==''){?>
				<div class="col-md-4 col-sm-6 col-xs-12 pull-right text-right">
					SORT BY
					<div class="btn-group order">
						<button type="button" class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if ($_smarty_tpl->tpl_vars['ordenProductos']->value==''){?>NEWEST<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ordenProductos']->value;?>
<?php }?>&nbsp;</button>
						<button type="button" class="btn btn-secundary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
						<div class="dropdown-menu">
							<li><a class="dropdown-item order" valor="NEWEST" href="#" onclick="javascript: return false">NEWEST</a></li>
							<li><a class="dropdown-item order" valor="MOST POPULAR" href="#" onclick="javascript: return false">MOST POPULAR</a></li>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
	<br />

	<div class="container">	
		<ol class="breadcrumb hidden-xs">
			<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</a></li>
			<?php } ?>
		</ol>
		
		<ol class="breadcrumb visible-xs">
			<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</a></li>
			<?php } ?>
		</ol>
		
		<?php if (count($_smarty_tpl->tpl_vars['hijos']->value)>0){?>
			<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hijos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
">
					<div class="col-md-3 col-xs-12 col-sm-6" item="<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
">
						<div class="panel panel-default">
							<div class="panel-body">
								<?php if (count($_smarty_tpl->tpl_vars['row']->value['img'])==0){?>
									<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
/items.jpg"/>
								<?php }else{ ?>
									<img src="repositorio/productos/producto_<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['img'][0];?>
"/>
								<?php }?>
							</div>
							<div class="panel-footer">
								<?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
 <b><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</b>
							</div>
						</div>
					</div>
				</a>
			<?php } ?>
		<?php }else{ ?>
			<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/front-end/elemento.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php }?>
	</div>
<?php }else{ ?>
	<br />
	<div class="bar icons">
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nodosPrimerNivel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
">
				<img src="repositorio/img/iconosproductos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
.png" onmouseover='javascript: this.src="repositorio/img/iconosproductos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
_hover.png"' onmouseout='javascript: this.src="repositorio/img/iconosproductos/<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
.png"'/>
			</a>
		<?php } ?>
	</div>
	<!--
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				<h3 class="page-title"><?php echo $_smarty_tpl->tpl_vars['nombreItem']->value;?>
</h3>
			</div>
		</div>
	</div>
	<br />-->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				<h3 class="page-title"><?php echo $_smarty_tpl->tpl_vars['nombreItem']->value;?>
</h3>
			</div>
		</div>
	</div>
	
	<div class="container">
		<ol class="breadcrumb hidden-xs">
			<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</a></li>
			<?php } ?>
		</ol>
		
		<ol class="breadcrumb visible-xs">
			<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</a></li>
			<?php } ?>
		</ol>
		<div id="vistaPage">
			<?php echo $_smarty_tpl->tpl_vars['vista']->value;?>

			<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['sesion']['perfil']=="cliente"){?>
			<div class="text-center">
					<b><a href="#" class="addProducto btn btn-info" identificador="<?php echo $_smarty_tpl->tpl_vars['itemId']->value;?>
" totalEtiquetas="<?php echo count($_smarty_tpl->tpl_vars['etiquetas']->value);?>
" onclick="javascript: return false;" style="font-size: 16px; color: black"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Select size and color!</a></b>
					<br />
					<br />
			</div>
			<?php }?>
		</div>
	</div>
	
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['ruta']).("plantillas/modulos/front-end/carrito.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:26:58
         compiled from "templates/plantillas/layout/userAdmin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1063518231590897323f1256-35869719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '880a4b31673caea96213ecd6be6948f92a1a406b' => 
    array (
      0 => 'templates/plantillas/layout/userAdmin.tpl',
      1 => 1485536818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1063518231590897323f1256-35869719',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_590897324fac70_52572899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590897324fac70_52572899')) {function content_590897324fac70_52572899($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>.:: <?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
 ::.</title>
		<base href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['url'];?>
index.php" target="_top">
		<!--<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
front-end/style.less?m=<?php echo rand();?>
" />-->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
front-end/style.css">
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/ionicons.min.css">
	</head>
	<body class="userConfig">
		<nav class="menu-principal fixed">
			<div class="barraNegra">&nbsp;</div>
			
			<div class="block left">
				<a href="welcome">
					<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
logo.png" class="logo"/>
					<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
nombre.png" class="hidden-xs" />
				</a>
			</div>
			
			<div class="block right">
				<form class="navbar-form" role="search">
					<div class="form-group text-right">
						<!--<input type="text" class="form-control search" placeholder="Search">-->
					</div>
					<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
iconCar.png" id="mnuProfile" />
				</form>
			</div>
		</nav>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/front-end/menuPrincipal.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="cuerpo">
			<div class="col-sm-3 hidden-xs">
				<ul class="list-group menu">
					<li class="list-group-item"><a href="welcome">Home</a></li>
					<li class="list-group-item"><a href="profile">Profile</a></li>
					<li class="list-group-item"><a href="currentOrder">Current Order</a></li>
					<li class="list-group-item"><a href="orderHistory">Order History</a></li>
					<!--<li class="list-group-item"><a href="customPriceList">Custom Price List</a></li>-->
					<li class="list-group-item"><a href="priceList">Price List</a></li>
					<li class="list-group-item"><a href="logout">Logout</a></li>
				</ul>
			</div>
			<div class="col-sm-9 border-left">
				<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['vista']!=''){?>
					<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['PAGE']->value['vista'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php }?>
			</div>
		</div>
		
		<!-- jQuery 2.1.4 -->
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQueryUI/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQueryUI/jquery-ui.css" />
		<!-- Bootstrap 3.3.5 -->
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/css/bootstrap-select.min.css" />
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/js/i18n/defaults-es_CL.min.js"></script>
	    
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
    	
    	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.css">
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!--<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/lenguaje/ES-mx.js"></script>-->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.js"></script>
    	
    	<?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PAGE']->value['scriptsJS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
?m=<?php echo rand();?>
"></script>
		<?php } ?>
	</body>
</html><?php }} ?>
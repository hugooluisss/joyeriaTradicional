<?php /* Smarty version Smarty-3.1.11, created on 2017-05-02 09:26:18
         compiled from "templates/plantillas/layout/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2049699628584f7ba0b4e4a3-81677027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00ca9aa948c6307384dd4e1670c7dc45b622d415' => 
    array (
      0 => 'templates/plantillas/layout/home.tpl',
      1 => 1493733910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2049699628584f7ba0b4e4a3-81677027',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_584f7ba0cd00b9_16621546',
  'variables' => 
  array (
    'PAGE' => 0,
    'nodosPrimerNivel' => 0,
    'row' => 0,
    'vista' => 0,
    'itemId' => 0,
    'etiquetas' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584f7ba0cd00b9_16621546')) {function content_584f7ba0cd00b9_16621546($_smarty_tpl) {?><!DOCTYPE html>
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
	<body>
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
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['sesion']['perfil']=="cliente"){?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
iconCar.png" id="mnuProfile" />
					<?php }else{ ?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
wholesale.png" id="mnuProfile" style="margin-top: 15px; cursor: pointer;"/>
					<?php }?>
				</form>
			</div>
		</nav>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/front-end/menuPrincipal.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['vista']!=''){?>
			<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['PAGE']->value['vista'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']!='welcome'){?>
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
			        	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nodosPrimerNivel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			        		<div class="col-xs-6 col-sm-2 text-center">
			        			 <span class="product_link">
			        			 	<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</a>
			        			 </span>
			        		</div>
						<?php } ?>
					</div>
	        	</div>
			</div>
        <?php }?>
            <br />
		<div id="redesSociales" class="container text-center">
			<a href="https://www.facebook.com/GorillaGlass/" target="_blank">
				<span class="fa-stack fa-2x">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x"></i>
				</span>
			</a>
			
			<a href="http://instagram.com/gorillaglass/" target="_blank">
				<span class="fa-stack fa-2x">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-instagram fa-stack-1x"></i>
				</span>
			</a>
			
			<a href="https://twitter.com/GorillaGlass1" target="_blank">
				<span class="fa-stack fa-2x">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x"></i>
				</span>
			</a>
			
			<a href="https://www.youtube.com/c/GorillaGlassJewelry" target="_blank">
				<span class="fa-stack fa-2x">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-youtube-play fa-stack-1x"></i>
				</span>
			</a>
			
			<a href="mailto:sales@getgorilla.com">
				<span class="fa-stack fa-2x">
					<i class="fa fa-circle-thin fa-stack-2x"></i>
					<i class="fa fa-envelope-o fa-stack-1x"></i>
				</span>
			</a>
		</div>
		<div id="otherLinks" class="container text-center">
			<a href="welcome">BUY WHOLESALE</a>
			<a href="retailLocator">BUY RETAIL</a>
			<a href="contact">CONTACT US</a>
		</div>
		
		<div id="copyright" class="container text-center">
			<?php echo date("Y");?>
 GORILLA GLASS &#8482;
		</div>
		<div id="footer">
			<div class="container text-center">
				<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['sesion']['perfil']=="cliente"){?>
					<?php if ($_smarty_tpl->tpl_vars['vista']->value!=''){?>
						<b><a href="#" class="addProducto" identificador="<?php echo $_smarty_tpl->tpl_vars['itemId']->value;?>
" totalEtiquetas="<?php echo count($_smarty_tpl->tpl_vars['etiquetas']->value);?>
" onclick="javascript: return false;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Click here to select the size and color</a></b>
					<?php }else{ ?>
						<b>Choose a product</b>
					<?php }?>
				<?php }else{ ?>
					<a href="retailLocator">Where to buy</a>
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
plugins/bootstrap-select/js/i18n/defaults-en_US.min.js"></script>
	    
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
    	
    	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.css">
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/lenguaje/ES-mx.js"></script>
		
		<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/sldr.js"></script>
    	
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
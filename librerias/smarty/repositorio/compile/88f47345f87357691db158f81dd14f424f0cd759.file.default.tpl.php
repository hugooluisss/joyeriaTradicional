<?php /* Smarty version Smarty-3.1.11, created on 2017-05-04 13:16:07
         compiled from "templates/plantillas/layout/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:337956145908926cc74ac4-88415510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88f47345f87357691db158f81dd14f424f0cd759' => 
    array (
      0 => 'templates/plantillas/layout/default.tpl',
      1 => 1485893053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '337956145908926cc74ac4-88415510',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5908926ce80b37_35005569',
  'variables' => 
  array (
    'PAGE' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5908926ce80b37_35005569')) {function content_5908926ce80b37_35005569($_smarty_tpl) {?><!DOCTYPE html>
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
		<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['debug']){?>
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/less/AdminLTE.less" />
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/less/skins/_all-skins.less" />
		<?php }else{ ?>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/AdminLTE.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/skins/_all-skins.css" />
		<?php }?>

		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/ionicons.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/less/skins/_all-skins.less" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/morris/morris.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/css/jquery.fileupload.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
	<body class="hold-transition skin-blue-light sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="panelPrincipal" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>Gorilla</b>Glass</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Gorilla Glass</b> Panel Admin</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<i class="fa fa-user"></i> <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>
</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="?mod=cusuarios&action=getFoto&ancho=180&alto=180" class="img-circle" alt="User Image"/>
									<p>
										<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>

										<small><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getEmail();?>
</small>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-right">
										<a href="?mod=logout" class="btn btn-default btn-flat">Salir</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-custom-menu -->
			</nav>
		</header>
		
		
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
			<!-- Sidebar user panel -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MENÚ PRINCIPAL</li>
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==1){?>
					<li class="<?php if (in_array($_smarty_tpl->tpl_vars['PAGE']->value['modulo'],array('admonUsuarios'))){?>active<?php }?> treeview">
						<a href="#">
							<span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='admonUsuarios'){?>class="active"<?php }?>><a href="admonUsuarios"><i class="fa fa-users"></i> Usuarios</a></li>
						</ul>
					</li>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getIdTipo()==1){?>
					<li class="<?php if (in_array($_smarty_tpl->tpl_vars['PAGE']->value['modulo'],array('clientes','productos','estadoPedidos','colores','texturas','size','paqueteria'))){?>active<?php }?> treeview">
						<a href="#">
							<span>Catálogos</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='clientes'){?>class="active"<?php }?>><a href="clientes"><i class="fa fa-male"></i> Clientes</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='estadoPedidos'){?>class="active"<?php }?>><a href="estadoPedidos"><i class="fa fa-bookmark"></i> Estado de pedidos</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='colores'){?>class="active"<?php }?>><a href="colores"><i class="fa fa-circle"></i> Colores</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='texturas'){?>class="active"<?php }?>><a href="texturas"><i class="fa fa-braille"></i> Texturas</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='size'){?>class="active"<?php }?>><a href="size"><i class="fa fa-ellipsis-h"></i> Tamaños</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='productos'){?>class="active"<?php }?>><a href="productos"><i class="fa fa-tags"></i> Definición de productos</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='paqueteria'){?>class="active"<?php }?>><a href="paqueteria"><i class="fa fa-motorcycle" aria-hidden="true"></i> Paqueteria</a></li>
						</ul>
					</li>
					<?php }?>
					
					<br />
					<li <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='pedidos'){?>class="active"<?php }?>><a href="pedidos"><i class="fa fa-shopping-cart"></i> Pedidos</a></li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		
		
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-lg-12">
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['vista']!=''){?>
						<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['PAGE']->value['vista'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					<?php }?>
					</div>
				</div>
			</section><!-- /.content -->
		</div><!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Versión</b> <?php echo $_smarty_tpl->tpl_vars['PAGE']->value['version'];?>

			</div>
			<strong>Copyright &copy; <?php echo date("Y");?>
 <?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
.</strong> Todos los derechos reservados
		</footer>
	</div>
    
    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQueryUI/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jQueryUI/jquery-ui.css">
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/raphael-min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
moment.min.js"></script>
    <!-- datepicker -->

    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/fastclick/fastclick.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.es.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.js"></script>
    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datatables/lenguaje/ES-mx.js"></script>
    
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/upload/js/jquery.fileupload.js"></script>
    
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datepicker/datepicker3.css" />
     
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/input-mask/jquery.inputmask.extensions.js"></script>
    
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/colorpicker/bootstrap-colorpicker.css" />
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/colorpicker/bootstrap-colorpicker.js"></script>
    
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/timepicker/bootstrap-timepicker.css" />
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/timepicker/bootstrap-timepicker.js"></script>
    
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/js/app.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/css/bootstrap-select.min.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/bootstrap-select/js/i18n/defaults-es_CL.min.js"></script>
	
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/treegrid/css/jquery.treegrid.css" />
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/treegrid/js/jquery.treegrid.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/treegrid/js/jquery.treegrid.bootstrap3.js"></script>
    
    <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PAGE']->value['scriptsJS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
?m=<?php echo rand();?>
"></script>
	<?php } ?>
    
    <?php if ($_smarty_tpl->tpl_vars['PAGE']->value['debug']){?>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
    <?php }else{ ?>
    
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <?php }?>
  </body>
</html>
<?php }} ?>
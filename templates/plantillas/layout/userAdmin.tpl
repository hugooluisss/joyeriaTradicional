<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>.:: {$PAGE.empresaAcronimo} ::.</title>
		<base href="{$PAGE.url}index.php" target="_top">
		<!--<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}front-end/style.less?m={rand()}" />-->
		<link rel="stylesheet" href="{$PAGE.ruta}front-end/style.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/ionicons.min.css">
	</head>
	<body class="userConfig">
		<nav class="menu-principal fixed">
			<div class="barraNegra">&nbsp;</div>
			
			<div class="block left">
				<a href="welcome">
					<img src="{$PAGE.iconos}logo.png" class="logo"/>
					<img src="{$PAGE.iconos}nombre.png" class="hidden-xs" />
				</a>
			</div>
			
			<div class="block right">
				<form class="navbar-form" role="search">
					<div class="form-group text-right">
						<!--<input type="text" class="form-control search" placeholder="Search">-->
					</div>
					<img src="{$PAGE.iconos}iconCar.png" id="mnuProfile" />
				</form>
			</div>
		</nav>
		{include file=$PAGE.rutaModulos|cat:"modulos/front-end/menuPrincipal.tpl"}
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
				{if $PAGE.vista neq ''}
					{include file=$PAGE.vista}
				{/if}
			</div>
		</div>
		
		<!-- jQuery 2.1.4 -->
		<script src="{$PAGE.ruta}plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/jQueryUI/jquery-ui.css" />
		<!-- Bootstrap 3.3.5 -->
		<script src="{$PAGE.ruta}bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/bootstrap-select/css/bootstrap-select.min.css" />
		<script src="{$PAGE.ruta}plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
		<script src="{$PAGE.ruta}plugins/bootstrap-select/js/i18n/defaults-es_CL.min.js"></script>
	    
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
    	
    	<link rel="stylesheet" href="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.css">
		<script src="{$PAGE.ruta}plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!--<script src="{$PAGE.ruta}plugins/datatables/lenguaje/ES-mx.js"></script>-->
		<script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
    	
    	{foreach from=$PAGE.scriptsJS item=script}
			<script type="text/javascript" src="{$script}?m={rand()}"></script>
		{/foreach}
	</body>
</html>
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
	<body>
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
					{if $PAGE.sesion.perfil eq "cliente"}
						<img src="{$PAGE.iconos}iconCar.png" id="mnuProfile" />
					{else}
						<img src="{$PAGE.iconos}wholesale.png" id="mnuProfile" style="margin-top: 15px; cursor: pointer;"/>
					{/if}
				</form>
			</div>
		</nav>
		{include file=$PAGE.rutaModulos|cat:"modulos/front-end/menuPrincipal.tpl"}
		{if $PAGE.vista neq ''}
			{include file=$PAGE.vista}
		{/if}
		{if $PAGE.modulo neq 'welcome'}
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
			        	{foreach from=$nodosPrimerNivel item="row"}
			        		<div class="col-xs-6 col-sm-2 text-center">
			        			 <span class="product_link">
			        			 	<a href="{$row.url}">{$row.nombre}</a>
			        			 </span>
			        		</div>
						{/foreach}
					</div>
	        	</div>
			</div>
        {/if}
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
			{date("Y")} GORILLA GLASS &#8482;
		</div>
		<div id="footer">
			<div class="container text-center">
				{if $PAGE.sesion.perfil eq "cliente"}
					{if $vista neq ''}
						<b><a href="#" class="addProducto" identificador="{$itemId}" totalEtiquetas="{$etiquetas|@count}" onclick="javascript: return false;"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Click here to select the size and color</a></b>
					{else}
						<b>Choose a product</b>
					{/if}
				{else}
					<a href="retailLocator">Where to buy</a>
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
		<script src="{$PAGE.ruta}plugins/bootstrap-select/js/i18n/defaults-en_US.min.js"></script>
	    
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.3.1/less.min.js" type="text/javascript"></script>
    	
    	<link rel="stylesheet" href="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.css">
		<script src="{$PAGE.ruta}plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{$PAGE.ruta}plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="{$PAGE.ruta}plugins/datatables/lenguaje/ES-mx.js"></script>
		
		<script src="{$PAGE.ruta}plugins/sldr.js"></script>
    	
    	{foreach from=$PAGE.scriptsJS item=script}
			<script type="text/javascript" src="{$script}?m={rand()}"></script>
		{/foreach}
	</body>
</html>
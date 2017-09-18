<?php
#Home
$conf['welcome'] = array(
	'controlador' => 'home.php',
	'vista' => 'front-end/welcome.tpl',
	'descripcion' => 'El home inicial',
	'seguridad' => false,
	#'js' => array('carrito.class.js', 'pedido.class.js'),
	'jsTemplate' => array('welcome.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_HOME);

$conf['home'] = array(
	'controlador' => 'home.php',
	'vista' => 'front-end/home.tpl',
	'descripcion' => 'lista de productos',
	'seguridad' => false,
	'js' => array('carrito.class.js', 'pedido.class.js'),
	'jsTemplate' => array('home.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_HOME);
	
$conf['itemsElemento'] = array(
	'controlador' => 'home.php',
	'vista' => 'front-end/elementosCompra.tpl',
	'descripcion' => 'Las opciones de compra',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['productosPedidoCarrito'] = array(
	'controlador' => 'carrito.php',
	'vista' => 'front-end/productosCarrito.tpl',
	'descripcion' => 'Productos agregados a la compra',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['profile'] = array(
	'controlador' => 'userAdmin.php',
	'vista' => 'front-end/userAdmin/profile.tpl',
	'descripcion' => 'Datos del usuario',
	'seguridad' => true,
	'js' => array('cliente.class.js'),
	'jsTemplate' => array('profile.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_USER);
	
$conf['currentOrder'] = array(
	'controlador' => 'userAdmin.php',
	'vista' => 'front-end/userAdmin/currentOrder.tpl',
	'descripcion' => 'El estado del carrito',
	'seguridad' => true,
	'js' => array('carrito.class.js', 'pedido.class.js'),
	'jsTemplate' => array('currentOrder.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_USER);
	
$conf['orderHistory'] = array(
	'controlador' => 'userAdmin.php',
	'vista' => 'front-end/userAdmin/ordersHistory.tpl',
	'descripcion' => 'Historial de ordenes',
	'seguridad' => true,
	'js' => array('carrito.class.js'),
	'jsTemplate' => array('historyOrder.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_USER);
	
$conf['customPriceList'] = array(
	'controlador' => 'userAdmin.php',
	'vista' => 'front-end/userAdmin/customPriceList.tpl',
	'descripcion' => 'Definición de precios',
	'seguridad' => true,
	#'js' => array('carrito.class.js'),
	'jsTemplate' => array('customPrice.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_USER);
	
$conf['priceList'] = array(
	'controlador' => 'userAdmin.php',
	'vista' => 'front-end/userAdmin/priceList.tpl',
	'descripcion' => 'Definición de precios',
	'seguridad' => true,
	#'js' => array('carrito.class.js'),
	'jsTemplate' => array('priceList.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_USER);
	
$conf['retailLocator'] = array(
	#'controlador' => 'home.php',
	'vista' => 'front-end/retailLocator.tpl',
	'descripcion' => 'Puntos de las tiendas',
	'seguridad' => false,
	#'js' => array('carrito.class.js', 'pedido.class.js'),
	'jsTemplate' => array('menuPrincipal.js'),
	'capa' => LAYOUT_HOME);
	
$conf['contact'] = array(
	'controlador' => 'home.php',
	'vista' => 'front-end/contacto.tpl',
	'descripcion' => 'Contacto',
	'seguridad' => false,
	#'js' => array('carrito.class.js', 'pedido.class.js'),
	'jsTemplate' => array('menuPrincipal.js'),
	'capa' => LAYOUT_HOME);
	
$conf['chome'] = array(
	'controlador' => 'home.php',
	'descripcion' => 'controlador del home',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['signup'] = array(
	#'controlador' => 'signup.php',
	'vista' => 'front-end/signup.tpl',
	'descripcion' => 'Registro de clientes',
	'seguridad' => false,
	'slash' => true,
	'js' => array('cliente.class.js'),
	'jsTemplate' => array('registro.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_REGISTRO);
	
$conf['cuserAdmin'] = array(
	'controlador' => 'userAdmin.php',
	'descripcion' => 'Controlador para las acciones del usuario',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['placeOrder'] = array(
	'controlador' => 'userAdmin.php',
	'vista' => 'front-end/userAdmin/placeorder.tpl',
	'descripcion' => 'Contacto',
	'seguridad' => false,
	#'js' => array('carrito.class.js', 'pedido.class.js'),
	'jsTemplate' => array('placeOrder.js', 'menuPrincipal.js'),
	'capa' => LAYOUT_USER);
	
$conf['cuseradmin'] = $conf['cuserAdmin'];
?>
<?php
define('SISTEMA', 'Gorilla Glass');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_JSON', 'layout/json.tpl');
define('LAYOUT_HOME', 'layout/home.tpl');
define('LAYOUT_USER', 'layout/userAdmin.tpl');
define('LAYOUT_REGISTRO', 'layout/registro.tpl');

#Login y su controlador
$conf['inicio'] = array(
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');

$conf['logout'] = array(
	'controlador' => 'login.php',
	#'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['bienvenida'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/bienvenida.tpl',
	'descripcion' => 'Bienvenida al sistema',
	'seguridad' => true,
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Datos de usuario desde el panel*/
$conf['usuarioDatosPersonales'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/datosPersonales.tpl',
	'descripcion' => 'Cambiar datos personales',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('datosUsuario.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['panelPrincipal'] = array(
	'controlador' => 'panelPrincipal.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

#Productos
$conf['productos'] = array(
	'controlador' => 'productos.php',
	'vista' => 'productos/panel.tpl',
	'descripcion' => 'Administración de productos',
	'seguridad' => true,
	'js' => array('producto.class.js'),
	'jsTemplate' => array('productos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaProductos'] = array(
	'controlador' => 'productos.php',
	'vista' => 'productos/lista.tpl',
	'descripcion' => 'Lista de productos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cproductos'] = array(
	'controlador' => 'productos.php',
	'descripcion' => 'Controlador de productos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/* Estados */
$conf['estadoPedidos'] = array(
	'controlador' => 'estados.php',
	'vista' => 'estadoPedidos/panel.tpl',
	'descripcion' => 'Estado de los pedidos',
	'seguridad' => true,
	'js' => array('estado.class.js'),
	'jsTemplate' => array('estados.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listadoEstados'] = array(
	'controlador' => 'estados.php',
	'vista' => 'estadoPedidos/lista.tpl',
	'descripcion' => 'Lista de estados para los pedidos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cestados'] = array(
	'controlador' => 'estados.php',
	'descripcion' => 'Controlador de estados',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Clientes*/
$conf['clientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/panel.tpl',
	'descripcion' => 'Administración de clientes',
	'seguridad' => true,
	'js' => array('cliente.class.js'),
	'jsTemplate' => array('clientes.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaClientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/lista.tpl',
	'descripcion' => 'Lista de clientes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cclientes'] = array(
	'controlador' => 'clientes.php',
	'descripcion' => 'Controlador de clientes',
	'seguridad' => false,
	'slash' => true,
	'capa' => LAYOUT_AJAX);

/* Pedidos */
$conf['pedidos'] = array(
	'controlador' => 'pedidos.php',
	'vista' => 'pedidos/panel.tpl',
	'descripcion' => 'Administración de ventas',
	'seguridad' => true,
	'js' => array('pedido.class.js'),
	'jsTemplate' => array('pedidos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaPedidos'] = array(
	'controlador' => 'pedidos.php',
	'vista' => 'pedidos/lista.tpl',
	'descripcion' => 'Lista de ventas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cpedidos'] = array(
	'controlador' => 'pedidos.php',
	'descripcion' => 'Controlador de ventas',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['clientesPedido'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'pedidos/listaClientes.tpl',
	'descripcion' => 'Lista de clientes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['listaMovimientosPedido'] = array(
	'controlador' => 'pedidos.php',
	'vista' => 'pedidos/listaMovimientos.tpl',
	'descripcion' => 'Lista de movimientos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['productosPedido'] = array(
	'controlador' => 'productos.php',
	'vista' => 'pedidos/listaProductos.tpl',
	'descripcion' => 'Lista de productos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#Colores
$conf['colores'] = array(
	'controlador' => 'colores.php',
	'vista' => 'colores/panel.tpl',
	'descripcion' => 'Administración de colores',
	'seguridad' => true,
	'js' => array('color.class.js'),
	'jsTemplate' => array('colores.js'),
	'capa' => LAYOUT_DEFECTO);
$conf['listaColores'] = array(
	'controlador' => 'colores.php',
	'vista' => 'colores/lista.tpl',
	'descripcion' => 'Lista de colores',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ccolores'] = array(
	'controlador' => 'colores.php',
	'descripcion' => 'Controlador de colores',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#Texturas
$conf['texturas'] = array(
	'controlador' => 'texturas.php',
	'vista' => 'texturas/panel.tpl',
	'descripcion' => 'Administración de texturas',
	'seguridad' => true,
	'js' => array('textura.class.js'),
	'jsTemplate' => array('texturas.js'),
	'capa' => LAYOUT_DEFECTO);
$conf['listaTexturas'] = array(
	'controlador' => 'texturas.php',
	'vista' => 'texturas/lista.tpl',
	'descripcion' => 'Lista de texturas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ctexturas'] = array(
	'controlador' => 'texturas.php',
	'descripcion' => 'Controlador de texturas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#Tamaños
$conf['size'] = array(
	'controlador' => 'size.php',
	'vista' => 'size/panel.tpl',
	'descripcion' => 'Administración de size',
	'seguridad' => true,
	'js' => array('size.class.js'),
	'jsTemplate' => array('size.js'),
	'capa' => LAYOUT_DEFECTO);
$conf['listaSize'] = array(
	'controlador' => 'size.php',
	'vista' => 'size/lista.tpl',
	'descripcion' => 'Lista de size',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['csize'] = array(
	'controlador' => 'size.php',
	'descripcion' => 'Controlador de size',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['updateProductos'] = array(
	'controlador' => 'productos.php',
	#'vista' => 'pedidos/listaProductos.tpl',
	'descripcion' => 'Lista de productos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#paqueteria
$conf['paqueteria'] = array(
	'controlador' => 'paqueteria.php',
	'vista' => 'paqueteria/panel.tpl',
	'descripcion' => 'Administración de paqueteria',
	'seguridad' => true,
	'js' => array('paqueteria.class.js'),
	'jsTemplate' => array('paqueteria.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaPaqueteria'] = array(
	'controlador' => 'paqueteria.php',
	'vista' => 'paqueteria/lista.tpl',
	'descripcion' => 'Lista de size',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cpaqueteria'] = array(
	'controlador' => 'paqueteria.php',
	'descripcion' => 'Controlador de paqueteria',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

include_once("config/front-end.php");
?>
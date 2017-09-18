<?php
global $objModulo;
#hay que obtener todos los items que dependen del nodo padre
$db = TBase::conectaDB();
$rs = $db->Execute("select * from producto where idPadre = 0 and not idProducto = 0");
$datos = array();
while(!$rs->EOF){
	$rs->fields['url'] = "home/".$rs->fields['idProducto']."-".getURI($rs->fields['nombre'])."/";
	array_push($datos, $rs->fields);
	
	$rs->moveNext();
}

$smarty->assign("nodosPrimerNivel", $datos);

switch($objModulo->getId()){
	case 'home':
		$db = TBase::conectaDB();
		global $sesion;
		
		if($sesion['usuario'] <> ''){
			$rs = $db->Execute("select idPedido, idEstado from pedido where idCliente = ".$sesion['usuario']." order by idPedido desc limit 1");
			$smarty->assign("idPedido", ($rs->fields['idEstado'] == 1)?$rs->fields['idPedido']:"");
			$smarty->assign("cliente", $sesion['usuario']);
		}
		
		$padre = $_GET['id'] == ''?'0':$_GET['id'];
		$producto = new TProducto($padre);
		$smarty->assign("nombreItem", $producto->getNombre());
		$smarty->assign("itemId", $producto->getId());
		
		if ($producto->getId() <> 0 )
			$producto->addVisita();
		
		$productoPadre = new TProducto($producto->getPadre());
		if ($productoPadre->getPadre() == 0){
			$json = json_decode(file_get_contents("repositorio/etiquetas/etiquetas.json"));
			$clave = $productoPadre->getClave();
			if ($clave <> '')
				$smarty->assign("etiquetas", $json->$clave);
		}

		$directorio  = scandir("repositorio/productos/producto_".$producto->getId()."/");			
		$images = array();
		foreach($directorio as $file){
			if (!in_array($file, array("..", ".")))
				array_push($images, $file);
		}
		$smarty->assign("images", $images);
		
		if($producto->getVista() <> '')
			$smarty->assign("vista", $producto->getVista());
		else{
			switch($_COOKIE['ordenProductos']){
				case 'NEWEST':
					$orden = "order by idProducto desc";
					#setcookie("ordenProductos", "NEWEST");
					$_COOKIE['ordenProductos'] = "NEWEST";
				break;
				case 'MOST POPULAR': default:
					$orden = "order by visitas desc";
					$_COOKIE['ordenProductos'] = "MOST POPULAR";
				break;
			}
			
			$smarty->assign("ordenProductos", $_COOKIE['ordenProductos']);
			
			$rs = $db->Execute("select * from producto where idPadre = ".$padre." and not idProducto = 0 ".$orden);
			$datos = array();
			while(!$rs->EOF){
				$rs->fields['url'] = "home/".$rs->fields['idProducto']."-".getURI($rs->fields['nombre'])."/";
				
				$directorio  = scandir("repositorio/productos/producto_".$rs->fields['idProducto']."/");
				
				$rs->fields['img'] = array();
				foreach($directorio as $file){
					if (!in_array($file, array("..", ".")))
						array_push($rs->fields['img'], $file);
				}
					
				$rs->fields['json'] = json_encode($rs->fields);
				array_push($datos, $rs->fields);
				$rs->moveNext();
			}
			
			$smarty->assign("hijos", $datos);
		}
		#obtener la ruta del padre
		$datos = array();
		while($padre <> 0){
			$rs = $db->Execute("select idProducto, nombre, clave, idPadre from producto where idProducto = ".$padre);
			$padre = $rs->fields['idPadre'];
			array_push($datos, array(
				"url" => "home/".$rs->fields['idProducto']."-".getURI($rs->fields['nombre'])."/",
				"clave" => $rs->fields['clave'],
				"nombre" => $rs->fields['nombre']
			));
		}
		
		/*
		$rs = $db->Execute("select idProducto, nombre, clave, idPadre from producto where idProducto = ".$padre);
		array_push($datos, array(
			"url" => "home/".$rs->fields['idProducto']."-".getURI($rs->fields['nombre'])."/",
			"clave" => $rs->fields['clave'] == ''?'Home':$rs->fields['clave'],
			"nombre" => $rs->fields['nombre'] == ''?'Home':$rs->fields['nombre']
		));
		*/
		$smarty->assign("breadcrumb", array_reverse($datos));
		
		if (count($hijos) == 0){
			$padre = $_GET['id'] == ''?'0':$_GET['id'];
			$rs = $db->Execute("select * from producto where idProducto = ".$padre);
			
			$smarty->assign("item", $rs->fields);
		}
	break;
	case 'itemsElemento':
		$db = TBase::conectaDB();
		$datos = array();
		if (is_array($_POST['item']))
			$items = $_POST['item'];
		else
			$items = array($_POST['item']);
			
		foreach($items as $i => $item){
			$index = $_POST['index'];
			
			if ($index == $_POST['total'])
				$rs = $db->Execute("select a.*, b.precio, b.nombre as nombreAdd, b.clave from producto a join articulo b using(idProducto) where idPadre = ".$item." and not idProducto = 0 order by a.clave");
			else
				$rs = $db->Execute("select * from producto where idPadre = ".$item." and not idProducto = 0 order by clave");
				
			while(!$rs->EOF){
				$rs->fields["nombre2"] = substr($rs->fields['nombre'], 0, 10);
				$rs->fields["index"] = $index+1;
				$rs->fields['json'] = json_encode($rs->fields);
				array_push($datos, $rs->fields);
				$rs->moveNext();
			}
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("index", $index);
		$smarty->assign("etiquetas", $_POST['total']);
		//echo json_encode($datos);
	break;
	case 'placeOrder':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from paqueteria where visible = 1");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("listaPaqueteria", $datos);
	break;
	case 'chome':
		switch($objModulo->getAction()){
			case 'setOrden':
				#setcookie("ordenProductos", $_POST['orden'], time() + 3600);
				$_COOKIE['ordenProductos'] = $_POST['orden'];
			break;
		}
	break;
}
?>
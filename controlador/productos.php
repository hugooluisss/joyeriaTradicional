<?php
global $objModulo;
$contador = 1;
switch($objModulo->getId()){
	case 'productos':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from color order by nombre");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("colores", $datos);
		
		$rs = $db->Execute("select * from size order by nombre");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("tamanos", $datos);
		
		$rs = $db->Execute("select * from textura order by nombre");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("texturas", $datos);
	break;
	case 'listaProductos':
		$db = TBase::conectaDB();
		$padre = $_POST['padre'] == ''?0:$_POST['padre'];
		$precio = $_POST['precio'] == ''?0:$_POST['precio']; 
		$nivel = $_POST['nivel'] == ''?1:$_POST['nivel'];
		
		$rs = $db->Execute("select * from producto where idPadre = ".$padre." and not idPadre = idProducto order by clave");
		$datos = array();
		while(!$rs->EOF){
			$rs2 = $db->Execute("select count(*) as total from producto where idPadre = ".$rs->fields['idProducto']);
			$rs->fields['hijos'] = $rs2->fields['total'] > 0;
			$rs->fields['venta'] = sprintf("%.2f", $precio + $rs->fields['precio']);
			$rs->fields['ventaPapa'] = sprintf("%.2f", $precio);
			$rs->fields['nivel'] = $nivel+1;
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("productos", $datos);
		$smarty->assign("padre", $padre);
		$smarty->assign("nivel", $nivel);
	break;
	case 'productosPedido':
		#primero obtengo los que son último nodo
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select * from articulo");
		$datos = array();
		while(!$rs->EOF){
			/*$producto = new TProducto($rs->fields['idProducto']);
			$rs->fields['nombre'] = $producto->getNombreCompleto();
			$rs->fields['clave'] = $producto->getClaveCompleta();
			$rs->fields['precio'] = sprintf("%.2f", $producto->getPrecioCompleto());
			*/
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cproductos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TProducto;
				
				$obj->setId($_POST['id']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setPrecio($_POST['precio']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setPadre($_POST['padre']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'addMasiva':
				foreach(json_decode($_POST['items']) as $item){
					$obj = new TProducto;
					
					$obj->setClave($item->clave);
					$obj->setNombre($item->nombre);
					$obj->setPrecio($item->precio);
					$obj->setDescripcion($item->descripcion);
					$obj->setPadre($_POST['padre']);
					
					$obj->guardar();
				}
				
				echo json_encode(array("band" => true));
			break;
			case 'del':
				$obj = new TProducto($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'upload':
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 && $_GET['producto'] <> ''){
					$carpeta = "repositorio/productos/producto_".$_GET['producto']."/";
					if (!file_exists($carpeta))
						mkdir($carpeta, 0755);
									
					if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta.$_FILES['upl']['name'])){
						chmod($carpeta.$_FILES['upl']['name'], 0755);
						echo '{"status":"success"}';
						exit;
					}
				}
				
				echo '{"status":"error"}';
			break;
			case 'uploadXLS':
				$result = array("status" => "error");
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
					$carpeta = "repositorio/catalogo.xls";
									
					if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta)){
						chmod($carpeta, 0755);
						$result = array("status" => "success");
						exit;
					}
				}
				
				echo json_encode($result);
			break;
			case 'getImagenes':
				$archivos = array();
				$directorio  = scandir("repositorio/productos/producto_".$_POST['id']."/");
				
				foreach($directorio as $file){
					if (!in_array($file, array("..", ".")))
						array_push($archivos, $file);
				}
				
				echo json_encode($archivos);
			break;
			case 'delfile':	
				$ruta = "repositorio/productos/producto_".$_POST['producto']."/".$_POST['archivo'];
				
				$band = unlink($ruta)?true:false;
				
				echo json_encode(array("band" => $band));
			break;
			case 'clonar':
				echo json_encode(array("band" => clonar($_POST['copiar'], $_POST['en'])));
			break;
			case 'updateProductos': #crea el catálogo de productos
				$db = TBase::conectaDB();
				$db->Execute("delete from articulo");
				
				$colores = array();
				$rs = $db->Execute("select * from color");
				while(!$rs->EOF){
					array_push($colores, $rs->fields['clave']);
					$rs->moveNext();
				}
				
				$rs = $db->Execute("select * from producto where idProducto not in (select idPadre from producto)");
				$buffer = array();
				$cont = 0;
				
				while(!$rs->EOF){
					$producto = $rs->fields;
					$precio = $rs->fields['precio'];
					$nombre = $rs->fields['nombre'];
					$clave = $rs->fields['clave'];
					$nombre2 = "";
					
					if (!in_array($clave, $colores)){
						$nombre2 = $rs->fields['nombre'];
					}
					
					while($producto['idProducto'] <> $producto['idPadre']){
						if (!isset($buffer[$producto['idPadre']])){
							$rs2 = $db->Execute("select * from producto where idProducto = ".$producto['idPadre']);
							if (!$rs2->EOF)
								$buffer[$rs2->fields['idProducto']] = $rs2->fields;
						}
						
						$producto = $buffer[$producto['idPadre']];
						if ($producto['idProducto'] <> 0){
							$nombre = $producto['nombre'].($nombre == ''?"":", ").$nombre;
							$clave = $producto['clave'].($clave == ''?"":"-").$clave;
							$precio += $producto['precio'];
							
							if (!in_array($producto['clave'], $colores))
								$nombre2 = $producto['nombre'].($nombre2 == ''?"":", ").$nombre2;
						}
					}
					$db->Execute("insert into articulo(idProducto, clave, nombre, descripcion, descripcion2, precio) value (".$rs->fields['idProducto'].", '".$clave."', '".$nombre."', '".$rs->fields['descripcion']."', '".$nombre2."', ".$precio.")");
					$rs->moveNext();
					$cont++;
				}
				
				echo json_encode(array("total" => $cont));
			break;
			case 'getVista':
				$producto = new TProducto($_POST['id']);
				
				echo $producto->getVista();
			break;
			case 'setVista':
				$producto = new TProducto($_POST['id']);				
				echo json_encode(array("band" => $producto->setVista($_POST['html'])));
			break;
			/*
			default:
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idProducto from producto where idProducto between 25668 and 32558 order by idProducto desc");
				
				while(!$rs->EOF){
					$sql = "delete from producto where idProducto = ".$rs->fields['idProducto'].";\n";
					echo $sql;
					$rs->moveNext();
				}
			break;*/
		}
	break;
}

function recursionNodos($padre, $total = 0){
	$db = TBase::conectaDB();
	global $contador;
	$rs = $db->Execute("select * from producto where idPadre = ".$padre." and not idPadre = idProducto order by clave");
	
	if ($rs->EOF)
		return null;
	else{
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['contador'] = $contador++;
			$rs->fields['total'] = sprintf("%0.2f", $total + $rs->fields['precio']);
			$rs->fields['json'] = json_encode($rs->fields);
			
			#$rs->fields['hijos'] = recursionNodos($rs->fields['idProducto'], $total + $rs->fields['precio']);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		return $datos;
	}

}

function clonar($copiar = '', $en = ''){
	if ($copiar == '') return false;
	if ($en == '') return false;
	
	$db = TBase::conectaDB();
	$rs = $db->Execute("select * from producto where idPadre = ".$copiar);
	
	while(!$rs->EOF){
		if ($en == $rs->fields['idProducto']) return false;
		
		$obj = new TProducto;
					
		$obj->setClave($rs->fields['clave']);
		$obj->setNombre($rs->fields['nombre']);
		$obj->setPrecio($rs->fields['precio']);
		$obj->setDescripcion($rs->fields['descripcion']);
		$obj->setPadre($en);
		
		if (!$obj->guardar())
			return false;
		
		if (!clonar($rs->fields['idProducto'], $obj->getId()))
			return false;
		
		$rs->moveNext();
	}
	
	return true;
}
?>
<?php
global $objModulo;

switch($objModulo->getId()){
	case 'pedidos':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from estadopedido");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("estados", $datos);
		
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
	case 'listaPedidos':
		$db = TBase::conectaDB();
		global $userSesion;
		if ($_POST['ocultar'] == "true"){
			$rs = $db->Execute("select a.*, b.*, c.color, c.nombre as estado, d.idPaqueteria, d.codigo, d.comentario as comentarioEnvio from pedido a join cliente b using(idCliente) join estadopedido c using(idEstado) left join envio d using(idPedido) where not idEstado = 1");
		}else
			$rs = $db->Execute("select a.*, b.*, c.color, c.nombre as estado, d.idPaqueteria, d.codigo, d.comentario as comentarioEnvio from pedido a join cliente b using(idCliente) join estadopedido c using(idEstado) left join envio d using(idPedido)");
		$datos = array();
		while(!$rs->EOF){
			$rs2 = $db->Execute("select * from envio where idPedido = ".$rs->fields['idPedido']);
			$rs->fields['codigo'] = $rs2->fields['codigo'];
			$rs->fields['comentario'] = "";
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
	break;
	case 'listaMovimientosPedido':
		$db = TBase::conectaDB();
		global $userSesion;
		$rs = $db->Execute("select * from movpedido where idPedido = ".$_POST['pedido']);
		$objPedido = new TPedido($_POST['pedido']);
		
		$datos = array();
		$precio = 0;
		while(!$rs->EOF){
			$rs->fields['json']	= json_encode($rs->fields);
			$precio +=  $rs->fields['precio'];
			array_push($datos, $rs->fields);
			
			$rs->moveNext();
		}

		$smarty->assign("lista", $datos);
		$smarty->assign("pedido", $objPedido);
		
		$smarty->assign("subtotal", sprintf("%.2f", $precio));
		
		if ($precio <= 500){
			$descuento = 0;
			$etiquetaDescuento = "0";
		}elseif ($precio <= 1000){
			$descuento = $precio * 0.05;
			$etiquetaDescuento = "5";
		}elseif ($precio <= 1500){
			$descuento = $precio * 0.1;
			$etiquetaDescuento = "10";
		}else{
			$descuento = $precio * 0.15;
			$etiquetaDescuento = "15";
		}
			
		$smarty->assign("descuento", sprintf("%.2f", $descuento));
		$smarty->assign("total", sprintf("%.2f", $precio - $descuento));
		
		$smarty->assign("etiquetaDescuento", $etiquetaDescuento);
	break;
	case 'cpedidos':
		switch($objModulo->getAction()){
			case 'guardar':
				$obj = new TPedido($_POST['id']);
				global $userSesion;
				global $sesion;
				$obj->setFecha($_POST['fecha']);
				$obj->cliente->setId($_POST['cliente']);
				
				if ($_POST['id'] == ''){
					if($sesion['perfil'] == 'cliente')
						$obj->usuario->setId(15);
					else
						$obj->usuario->setId($_POST['usuario'] == ''?$userSesion->getId():$_POST['usuario']);
				}
				
				if ($obj->guardar())
					echo json_encode(array("band" => true, "id" => $obj->getId()));
				else
					echo json_encode(array("band" => false, "mensaje" => "No se guardó"));
			break;
			case 'addMovimiento':
				$obj = new TMovimiento($_POST['id']);
				
				$obj->setPedido($_POST['pedido']);
				$obj->setClave($_POST['clave']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setCantidad($_POST['cantidad']);
				$obj->setPrecio($_POST['precio'] * $_POST['cantidad']);
				$obj->setDescuento($_POST['descuento']);
				
				if ($obj->guardar() == true)
					echo json_encode(array("band" => true));
				else
					echo json_encode(array("band" => false, "mensaje" => "No se guardó"));
			break;
			case 'del':
				$obj = new TPedido($_POST['id']);
				
				if ($obj->eliminar())
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'delMovimiento':
				$obj = new TMovimiento();
				$band = true;
				foreach(explode(",", $_POST['id']) as $el){
					$obj->setId($el);
					
					$band = $obj->eliminar()?$band:false;
				}
				
				if ($band)
					echo json_encode(array("band" => "true"));
				else
					echo json_encode(array("band" => "false"));
			break;
			case 'cambiarEstado':
				$obj = new TPedido($_POST['id']);
				$obj->estado->setId($_POST['estado']);
				
				if ($obj->guardar())
					echo json_encode(array("band" => true, "id" => $obj->getId()));
				else
					echo json_encode(array("band" => false));
			break;
			case 'imprimir':
				#se genera el documento pdf
				global $userSesion;
				require_once(getcwd()."/repositorio/pdf/pedido.php");
				$pedido = $_POST['pedido'];
				$db = TBase::conectaDB();
				
				if ($pedido == ''){
					global $userSesion;
					$rs = $db->Execute("select idPedido, idEstado from pedido where idCliente = ".$sesion['usuario']." order by idPedido desc limit 1;");
					$pedido = $rs->fields['idEstado'] == 1?$rs->fields['idPedido']:"";
				}
				
				$pdf = new RPedido($pedido);
				$pdf->generar();
				
				echo json_encode(array("band" => true, "documento" => $pdf->output()));
			break;
			case 'setEnvio':
				$obj = new TPedido($_POST['id']);
				$paqueteria = new TPaqueteria($_POST['paqueteria']);
				
				if($obj->setCodigoEnvio($_POST['paqueteria'], $_POST['codigo'], $_POST['comentario'], $paqueteria->getCosto())){
					$obj->setEstado($_POST['estado']);
					echo json_encode(array("band" => $obj->guardar()));
				}else
					echo json_encode(array("band" => false));
			break;
		}
	break;
}
?>
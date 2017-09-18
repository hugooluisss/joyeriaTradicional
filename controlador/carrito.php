<?php
global $objModulo;
switch($objModulo->getId()){
	case 'productosPedidoCarrito':
		if ($_POST['idPedido']){
			$db = TBase::conectaDB();
			$rs = $db->Execute("select * from movpedido where idPedido = ".$_POST['idPedido']);
			$precio = 0;
			$datos = array();
			while(!$rs->EOF){
				$precio +=  $rs->fields['precio'];
				$rs->fields['json'] = json_encode($rs->fields);
				
				array_push($datos, $rs->fields);
				$rs->moveNext();
			}
			
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
		}else
			$datos = array();
		
		$smarty->assign("lista", $datos);
	break;
	case 'cestados':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TEstado();
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setColor($_POST['color']);
				
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TEstado($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
};
?>
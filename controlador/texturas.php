<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaTexturas':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from textura");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'ctexturas':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TTextura();
				
				$obj->setId($_POST['id']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setPrecio($_POST['precio']);
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TTextura($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'validaClave':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idTextura from textura where clave = '".$_POST['txtClave']."' and not idTextura = '".$_POST['id']."'");
				
				echo $rs->EOF?"true":"false";
			break;
		}
	break;
}
?>
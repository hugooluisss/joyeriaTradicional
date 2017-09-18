<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaPaqueteria':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from paqueteria where visible = 1");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cpaqueteria':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPaqueteria();
				
				$obj->setId($_POST['id']);
				$obj->setURL($_POST['url']);
				$obj->setNombre($_POST['nombre']);
				$obj->setCosto($_POST['costo']);

				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPaqueteria($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>
<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaSize':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from size order by clave");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'csize':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TSize();
				
				$obj->setId($_POST['id']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setPrecio($_POST['precio']);
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TSize($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'validaClave':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idSize from size where clave = '".$_POST['txtClave']."' and not idSize = '".$_POST['id']."'");
				
				echo $rs->EOF?"true":"false";
			break;
		}
	break;
}
?>
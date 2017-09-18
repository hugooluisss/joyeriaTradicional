<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaColores':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from color");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'ccolores':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TColor();
				
				$obj->setId($_POST['id']);
				$obj->setClave($_POST['clave']);
				$obj->setNombre($_POST['nombre']);
				$obj->setCodigo($_POST['codigo']);
				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TColor($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
			case 'validaClave':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idColor from color where clave = '".$_POST['txtClave']."' and not idColor = '".$_POST['id']."'");
				
				echo $rs->EOF?"true":"false";
			break;
			case 'upload':
				if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 && $_GET['color'] <> ''){
					$carpeta = "repositorio/colores/";
					if (!file_exists($carpeta))
						mkdir($carpeta, 0755);
					
					$ext = explode(".", $_FILES['upl']['name']);
					$ext = $ext[count($ext)-1];
					
					if (in_array(strtolower($ext), array('jpg', 'png'))){
						if(move_uploaded_file($_FILES['upl']['tmp_name'], $carpeta."color_".$_GET['color'].".jpg")){
							chmod($carpeta."color_".$_GET['color'].".".$ext, 0755);
							echo '{"status":"success"}';
							exit;
						}
					}
				}
				
				echo '{"status":"error"}';
			break;
		}
	break;
}
?>
<?php
global $objModulo;

switch($objModulo->getId()){
	case 'profile':
		global $sesion;
		if ($sesion['perfil'] == "cliente")
			$smarty->assign("cliente", new TCliente($sesion['usuario']));
		else
		$smarty->assign("cliente", new TCliente());
	break;
	case 'currentOrder':
		global $sesion;
		$db = TBase::conectaDB();
		
		if($sesion['usuario'] <> ''){
			$rs = $db->Execute("select idPedido, idEstado from pedido where idCliente = ".$sesion['usuario']." order by idPedido desc limit 1");
		
			$smarty->assign("idPedido", ($rs->fields['idEstado'] == 1)?$rs->fields['idPedido']:"");
			$smarty->assign("cliente", $sesion['usuario']);
			
			if ($sesion['perfil'] == "cliente")
				$smarty->assign("clienteObj", new TCliente($sesion['usuario']));
		}
	break;
	case 'orderHistory':
		global $sesion;
		$db = TBase::conectaDB();
		
		$datos = array();
		if($sesion['perfil'] == 'cliente'){
			$rs = $db->Execute("select idPedido, fecha, sum(precio) as subtotal, c.*, c.nombre as estado, d.codigo, e.nombre as paqueteria, e.url from pedido a join movpedido b using(idPedido) join estadopedido c using(idEstado) left join envio d using(idPedido) left join paqueteria e using(idPaqueteria) where idCliente = ".$sesion['usuario']." group by idPedido order by fecha desc");
			
			while(!$rs->EOF){
				$precio = $rs->fields['subtotal'];
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
				
				$rs->fields['subtotal'] -= $descuento;
				array_push($datos, $rs->fields);
				$rs->moveNext();
			}
		}
		
		$smarty->assign("ordenes", $datos);
	break;
	case 'priceList':
		$db = TBase::conectaDB();
		$multiplicador = 1;
		$colores = array();
		$rs = $db->Execute("select * from color");
		
		while(!$rs->EOF){
			array_push($colores, $rs->fields['clave']);
			$rs->moveNext();
		}
		
		global $sesion;
		$smarty->assign("cliente", $sesion);
				
		$rs = $db->Execute("select * from articulo group by clave");
		$datos = array();
		while(!$rs->EOF){
			$codigo = "";
			#$principal = explode("-", $rs->fields["clave"]);
			#$principal = $principal[0];
			foreach(explode("-", $rs->fields["clave"]) as $code){
				if (!in_array($code, $colores))
					$codigo .= ($codigo == ''?'':'-').$code;
			}
			
			$rs->fields['clave'] = $codigo;
			$rs->fields["precio"] *= $multiplicador;
			#$rs->fields["madre"] = $principal;
			
			$datos[$rs->fields['clave']] = $rs->fields;
			#array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'placeOrder':
		global $sesion;
		$db = TBase::conectaDB();
		
		if($sesion['usuario'] <> ''){
			$rs = $db->Execute("select idPedido, idEstado from pedido where idCliente = ".$sesion['usuario']." order by idPedido desc limit 1");
		
			$smarty->assign("idPedido", ($rs->fields['idEstado'] == 1)?$rs->fields['idPedido']:"");
			$smarty->assign("cliente", $sesion['usuario']);
			
			if ($sesion['perfil'] == "cliente")
				$smarty->assign("clienteObj", new TCliente($sesion['usuario']));
				
				
			$rs = $db->Execute("select * from movpedido where idPedido = ".$rs->fields['idPedido']);
			$precio = 0;
			//$datos = array();
			while(!$rs->EOF){
				$precio +=  $rs->fields['precio'];
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
		}
		
		$rs = $db->Execute("select * from paqueteria where visible = 1");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("listaPaqueteria", $datos);
		$smarty->assign("comentarios", $_GET['comentario']);
		$smarty->assign("band", $_POST['band']);
	break;
	case 'cuserAdmin':
	case 'cuseradmin':
		switch($objModulo->getAction()){
			case 'multiplicador': default:
				$db = TBase::conectaDB();
				$multiplicador = $_POST['multiplicador'] == ''?1:$_POST['multiplicador'];
				$colores = array();
				$rs = $db->Execute("select * from color");
				
				while(!$rs->EOF){
					array_push($colores, $rs->fields['clave']);
					$rs->moveNext();
				}
				
				$rs = $db->Execute("select * from articulo group by clave");
				$datos = array();
				while(!$rs->EOF){
					$codigo = "";
					foreach(explode("-", $rs->fields["clave"]) as $code){
						if (!in_array($code, $colores))
							$codigo .= ($codigo == ''?'':'-').$code;
					}
					
					$rs->fields['clave'] = $codigo;
					$rs->fields["precio"] *= $multiplicador;
					$datos[$rs->fields['clave']] = $rs->fields;
					#array_push($datos, $rs->fields);
					$rs->moveNext();
				}
				
				$rs = $db->Execute("select * from producto where idPadre = 0 and not idProducto = 0");
				$madres = array();
				while(!$rs->EOF){
					$madres[$rs->fields['clave']] = $rs->fields;
					$rs->moveNext();
				}
				
				require_once(getcwd()."/repositorio/pdf/productos.php");
				$pdf = new RProductos($madres);
				ksort($datos);
				
				$pdf->generar($datos);
				if($objModulo->getAction() == '')
					$pdf->Output2();
				else
					$smarty->assign("json", array("band" => true, "documento" => $pdf->output()));
			break;
			case 'placeOrder':
				#$db = TBase::conectaDB();
				$comentario = $_POST['cargo'] == 1?"Yes, please wait until I approve the final invoice before charging and shipping my order":("No. Please charge the card you have on file and ship my order as soon as possible. The last four digits of the card I am authorizing you to charge are ".$_POST['tarjeta']);
				$paqueteria = new TPaqueteria($_POST['paqueteria']);
				
				$obj = new TPedido($_POST['pedido']);
				$smarty->assign("json", array("band" => $obj->setCodigoEnvio($_POST['paqueteria'], '', $comentario, $paqueteria->getCosto())));
				
				$db = TBase::conectaDB();
				global $sesion;
				global $ini;
				require_once(getcwd()."/repositorio/pdf/pedido.php");
				$rs = $db->Execute("select idPedido, idEstado from pedido where idCliente = ".$sesion['usuario']." order by idPedido desc limit 1");
				
				$pedido = new TPedido($rs->fields['idPedido']);
				$pedido->estado->setId(2);
				$pedido->setFecha(date("Y-m-d"));
				$pedido->setComentario($_POST['comentarios']);
				
				
				$rsPed = $db->Execute("select * from movpedido where idPedido = ".$rs->fields['idPedido']);
				$precio = 0;
				//$datos = array();
				while(!$rsPed->EOF){
					$precio +=  $rsPed->fields['precio'];
					$rsPed->moveNext();
				}
				
				if ($precio < 100){
					$pedido->setExtra(15);
				}
				
				
				$pedido->guardar();
				
				$pdf = new RPedido(($rs->fields['idEstado'] == 1)?$rs->fields['idPedido']:"");
				$pdf->generar();
				$archivo = $pdf->output();
				//$obj->setId($_POST['id']);
				
				$obj = new TCliente($sesion['usuario']);
				$datos = array();
				$datos['cliente.nombre'] = $obj->getNombre();
				$datos['sitio.url'] = $ini["sistema"]["urlmail"];
				$datos['sitio.nombre'] = $ini["sistema"]["nombreEmpresa"];
				$datos['sitio.emailcontacto'] = $ini["mail"]["user"];
				$datos['cliente.email'] = $obj->getEmail();
				$datos['cliente.pass'] = $obj->getPass();
				
				$datos['orden.comentario'] = $_POST['comentarios'];
				
				$auxEnvio = $db->Execute("select comentario from envio where idPedido = ".$pedido->getId());
				$datos['comentarios'] = $auxEnvio->fields['comentario'];
				
				$email = new TMail;
				$cuerpo = utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/setOrden.html"), $datos));
				$subject = utf8_decode("Your order: ".$obj->getRazonSocial()." ".$pedido->getId()." ".$pedido->getFecha());
				$random_hash = md5(date('r', time())); 
				
				//$headers   = array();
				$headers = "MIME-Version: 1.0;\r\n";
				$headers .= "From: GorillaGlass <".$ini['mail']['user'].">;\r\n";
				$headers .= "Reply-To: <".$ini['mail']['user'].">;\r\n";
				$headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
				
				$adjuntos = chunk_split(base64_encode(file_get_contents($archivo))); 
		
				$salto = "\r";
				
				$msg = "--PHP-mixed-".$random_hash.$salto;
				$msg .= 'Content-Type: multipart/alternative; boundary="PHP-alt-'.$random_hash.'"'.$salto; 
				$msg .= '--PHP-alt-'.$random_hash.$salto;
				$msg .= 'Content-Type: text/html; charset="iso-8859-1"'.$salto;
				$msg .= 'Content-Transfer-Encoding: 7bit'.$salto.$salto;
				$msg .= $cuerpo.$salto;
		
				$msg .= '--PHP-alt-'.$random_hash.'--'.$salto;
				$cuerpo = $msg;
				$cuerpo = utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/setOrdenAdmin.html"), $datos));
				$msg .= '--PHP-mixed-'.$random_hash.$salto;
		
				$msg .= 'Content-Type: application/x-pdf; name="'.$obj->getRazonSocial()."_".$pedido->getId()."_".$pedido->getFecha().'.pdf"'.$salto;
				$msg .= 'Content-Transfer-Encoding: base64'.$salto;
				$msg .= 'Content-Disposition: attachment'.$salto;
		
				$msg .= $adjuntos;
				$msg .= '--PHP-mixed-'.$random_hash.'--'.$salto;
				
				$emailBand = imap_mail($obj->getEmail(), $subject, $msg, $headers);
				#$emailBand = imap_mail("hugooluisss@gmail.com", $subject, $msg, $headers);
				
				$pdf = new RPedido(($rs->fields['idEstado'] == 1)?$rs->fields['idPedido']:"", true);
				$pdf->generar();
				$archivo = $pdf->output();
				
				
				$cuerpo = utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/setOrdenAdmin.html"), $datos));
				$msg = "";
				$msg .= '--PHP-mixed-'.$random_hash.$salto;
				
				$msg .= 'Content-Type: multipart/alternative; boundary="PHP-alt-'.$random_hash.'"'.$salto; 
				$msg .= '--PHP-alt-'.$random_hash.$salto;
				$msg .= 'Content-Type: text/html; charset="iso-8859-1"'.$salto;
				$msg .= 'Content-Transfer-Encoding: 7bit'.$salto.$salto;
				$msg .= $cuerpo.$salto;
				$msg .= '--PHP-alt-'.$random_hash.'--'.$salto;
				$msg .= '--PHP-mixed-'.$random_hash.$salto;
		
				$msg .= 'Content-Type: application/x-pdf; name="'.$obj->getRazonSocial()."_".$pedido->getId()."_".$pedido->getFecha().'.pdf"'.$salto;
				$msg .= 'Content-Transfer-Encoding: base64'.$salto;
				$msg .= 'Content-Disposition: attachment'.$salto;
				
				$adjuntos = chunk_split(base64_encode(file_get_contents($archivo))); 
				$msg .= $adjuntos;
				$msg .= '--PHP-mixed-'.$random_hash.'--'.$salto;
				$emailBand = imap_mail("sales@getgorilla.com", $subject, $msg, $headers);
				#$emailBand = imap_mail("hugooluisss@gmail.com", $subject, $msg, $headers);
			break;
		}
	break;
}
?>
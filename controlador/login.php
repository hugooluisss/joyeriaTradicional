<?php
global $objModulo;

switch($objModulo->getId()){
	case 'logout':
		unset($_SESSION['usuario']);
		session_destroy();
		
		header('Location: index.php');
	break;
	default:
		switch($objModulo->getAction()){
			case 'login': case 'validarCredenciales':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idCliente, pass from cliente where upper(email) = upper('".$_POST['usuario']."') and estado = 'A'");
				$result = array('band' => false, 'mensaje' => 'Error al consultar los datos');
				
				if($rs->EOF)
					$result = array('band' => false, 'mensaje' => 'El usuario no existe'); 
				elseif($rs->fields['pass'] <> md5($_POST['pass']))
					$result = array('band' => false, 'mensaje' => 'Contraseña inválida');
				else{
					$obj = new TCliente($rs->fields['idCliente']);
					if ($obj->getId() == '')
						$result = array('band' => false, 'mensaje' => 'Acceso denegado', 'tipo' => "cliente");
					else
						$result = array('band' => true);
				}
				
				if($result['band']){
					$obj = new TCliente($rs->fields['idCliente']);
					$sesion['usuario'] = $obj->getId();
					$sesion['perfil'] = "cliente";
					$_SESSION[SISTEMA] = $sesion;
				}
				
				
				if ($rs->EOF){
					$rs = $db->Execute("select idUsuario, pass from usuario where upper(email) = upper('".$_POST['usuario']."')");
					
					$result = array('band' => false, 'mensaje' => 'Error al consultar los datos');
					if($rs->EOF)
						$result = array('band' => false, 'mensaje' => 'El usuario no existe'); 
					elseif($rs->fields['pass'] <> md5($_POST['pass']))
						$result = array('band' => false, 'mensaje' => 'Contraseña inválida');
					else{
						$obj = new TUsuario($rs->fields['idUsuario']);
						if ($obj->getId() == '')
							$result = array('band' => false, 'mensaje' => 'Acceso denegado');
						else
							$result = array('band' => true);
					}
						
					
					if($result['band']){
						$obj = new TUsuario($rs->fields['idUsuario']);
						$sesion['usuario'] = $obj->getId();
						$sesion['perfil'] = "sistema";
						$_SESSION[SISTEMA] = $sesion;
					}
				}
				
				$result['datos'] = $sesion;
				echo json_encode($result);
			break;
			case 'resetPass':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idCliente from cliente where upper(email) = upper('".$_POST['usuario']."')");
				if ($rs->fields['idCliente'] == '')
					$result = array('band' => false);
				else{
					$cliente = new TCliente($rs->fields['idCliente']);
					$pass = "reset".rand(1, 9999);
					$cliente->setPass(md5($pass));
					
					if($cliente->guardar()){
						global $ini;
						$datos = array();
						$datos['cliente.nombre'] = $cliente->getNombre();
						$datos['cliente.pass'] = $pass;
							
						$email = new TMail;
						$message = utf8_decode($email->construyeMail(file_get_contents("repositorio/mail/resetPass.html"), $datos));
						$subject = "Change password request";
						
						$headers   = array();
						$headers = "MIME-Version: 1.0;\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1;\r\n";
						$headers .= "From: GorillaGlass <".$ini['mail']['user'].">;\r\n";
						$headers .= "Reply-To: <".$ini['mail']['user'].">;\r\n";
						#$headers .= "Subject: Bienvenido;\r\n";
						#$headers .= "X-Mailer: PHP/".phpversion().";\r\n";  
						#$headers .= "Content-Transfer-Encoding: 8bit;\r\n";  
						
						//$emailBand = $email->send();
						#$emailBand = imap_mail("hugooluisss@gmail.com", $subject, $message, $headers);
						$emailBand = imap_mail($cliente->getEmail(), $subject, $message, $headers);
						$result = array('band' => $emailBand);
					}else
						$result = array('band' => false);
				}
				echo json_encode($result);
			break;
			case 'logout':
				$_SESSION[SISTEMA] = array();
				session_destroy();
				
				header ("Location: index.php");
			break;
			case 'changePass':
				if ($sesion['perfil'] == 'sistema')
					$obj = new TUsuario($sesion['usuario']);
				else
					$obj = new TCliente($sesion['usuario']);
					
				$obj->setPass(md5($_POST['pass']));
				echo json_encode(array("band" => $obj->guardar()));
			break;
		}
	break;
}
?>
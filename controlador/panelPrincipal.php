<?php
global $objModulo;
switch($objModulo->getId()){
	case 'panelPrincipal':
		global $sesion;
		
		if ($sesion['perfil'] == "cliente")
			header('Location: welcome');
	break;
}
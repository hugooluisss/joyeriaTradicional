<?php
/**
* TPlantilla
* O tambien conocida como layout
* @author     Hugo Luis Santiago Altamirano hugooluisss@gmail.com
* @license    openSource
* @version    1.0, 28/agosto/2012
**/
class TModulo{
	private $idModulo;
	private $categoria;
	private $seguridad;
	private $vista;
	private $controlador;
	private $capa;
	private $slash;
	
	public function TModulo($id = null){
		$this->setId($id);
		
		return true;
	}
	
	public function setId($id = null){
		if ($id == '')
			return false;

		global $conf;
		if (count($conf[$id]) == 0) return false;
		$this->idModulo = $id;
		$this->categoria = $conf[$id]["categoria"] == ''?"Sin especificar":$conf[$id]["categoria"];
		$this->seguridad = $conf[$id]["seguridad"];
		$this->scriptsJS = array();
		$this->slash = $conf[$id]["slash"] == ''?false:$conf[$id]["slash"];
		
		if (isset($conf[$id]['js'])){
			foreach($conf[$id]['js'] as $key => $val)
				$conf[$id]['js'][$key] = "javascript/".$val;
			$this->scriptsJS = array_merge($this->scriptsJS, $conf[$id]['js']);
		}
		
		if (isset($conf[$id]['jsTemplate'])){
			foreach($conf[$id]['jsTemplate'] as $key => $val)
				$conf[$id]['jsTemplate'][$key] = "templates/javascript/".$val;
			$this->scriptsJS = array_merge($this->scriptsJS, $conf[$id]['jsTemplate']);
		}
			
		if ($conf[$id]["vista"] <> '') $this->setVista($conf[$id]["vista"]);
		if ($conf[$id]["controlador"] <> '') $this->setControlador($conf[$id]["controlador"]);
		$this->setCapa($conf[$id]["capa"]);
		
		return true;
	}
	
	public function getScriptsJS(){
		if ($this->idModulo == '')
			return '';
			
		return $this->scriptsJS;
	}
	
	public function requiereSeguridad(){
		if ($this->idModulo == '')
			return false;
		
		if ($_POST['movil'] == 1) return false;
		
		return $this->seguridad === true or $this->seguridad == 1;
	}
	
	private function setVista($ruta){
		unset($this->vista);
		$this->vista = 'modulos/'.$ruta;
		
		return true;
	}
	
	public function getRutaVista(){
		if (isset($this->vista))
			return $this->vista;
		
		return '';
	}
	
	public function getCategoria(){
		return $this->categoria;
	}
	
	private function setControlador($ruta){
		unset($this->controlador);
		$this->controlador = $ruta;
		
		return true;
	}
	
	public function getRutaControlador(){
		if (isset($this->controlador))
			return $this->controlador;
		
		return '';
	}
	
	private function setCapa($ruta){
		unset($this->capa);
		$this->capa = $ruta;
		
		return true;
	}
	
	public function getRutaCapa(){
		if (isset($this->capa))
			#if ($_POST['movil'] == 1 and $_POST['json'] == true)
			if ($_POST['json'] == true)
				return LAYOUT_JSON;
			else
				return $this->capa;
		
		return '';
	}
	
	public function getId(){
		return $this->idModulo;
	}
	
	public function getAction(){
		return $_POST['action'] == ''?$_GET['action']:$_POST['action'];
	}
	
	public function getDebugSeguridad(){
		return $this->debugSeg == false?false:true;
	}
	
	public function slash(){
		return $this->slash;
	}
}
<?php
/**
* TPaqueteria
* Opciones de paqueteria
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TPaqueteria{
	private $idPaqueteria;
	private $url;
	private $nombre;
	private $costo;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPaqueteria($id = ''){
		$this->setId($id);		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from paqueteria where idPaqueteria = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idPaqueteria;
	}
	
	/**
	* Establece la url
	*
	* @autor Hugo
	* @access public
	* @param string $val Clave
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setURL($val = ""){
		$this->url = $val;
		return true;
	}
	
	/**
	* Retorna la url
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getURL(){
		return $this->url;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Nombre
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ""){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Establece el costo
	*
	* @autor Hugo
	* @access public
	* @param float $val valor
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCosto($val = 0){
		$this->costo = $val;
		return true;
	}
	
	/**
	* Retorna el costo
	*
	* @autor Hugo
	* @access public
	* @return float costo
	*/
	
	public function getCosto(){
		return $this->costo;
	}
	
	/**
	* Guarda los datos en la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO paqueteria(url) VALUES('".$this->getURL()."');");
			if (!$rs) return false;
				
			$this->idPaqueteria = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE paqueteria
			SET
				url = '".$this->getURL()."',
				nombre = '".$this->getNombre()."',
				costo = ".$this->getCosto()."
			WHERE idPaqueteria = ".$this->getId());
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("update paqueteria set visible = 0 where idPaqueteria = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>
<?php
/**
* TSize
* Tamaños
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TSize{
	private $idSize;
	private $clave;
	private $nombre;
	private $precio;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TSize($id = ''){
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
		$rs = $db->Execute("select * from size where idSize = ".$id);
		
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
		return $this->idSize;
	}
	
	/**
	* Establece la clave
	*
	* @autor Hugo
	* @access public
	* @param string $val Clave
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setClave($val = ""){
		$this->clave = $val;
		return true;
	}
	
	/**
	* Retorna la clave
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getClave(){
		return $this->clave;
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
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param decimal $val precio
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio($val = 0){
		$this->precio = $val;
		return true;
	}
	
	/**
	* Retorna el precio
	*
	* @autor Hugo
	* @access public
	* @return float precio
	*/
	
	public function getPrecio(){
		return $this->precio;
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
			$rs = $db->Execute("INSERT INTO size(clave, nombre) VALUES('".$this->getClave()."', '".$this->getNombre()."');");
			if (!$rs) return false;
				
			$this->idSize = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE size
			SET
				clave = '".$this->getClave()."',
				nombre = '".$this->getNombre()."',
				precio = ".$this->getPrecio()."
			WHERE idSize = ".$this->getId());
			
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
		$rs = $db->Execute("delete from size where idSize = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>
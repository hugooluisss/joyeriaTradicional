<?php
/**
* TColor
* Colores
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/
class TColor{
	private $idColor;
	private $clave;
	private $nombre;
	private $color;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TColor($id = ''){
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
		$rs = $db->Execute("select * from color where idColor = ".$id);
		
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
		return $this->idColor;
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
	* Establece el valor del código hexadecimal
	*
	* @autor Hugo
	* @access public
	* @param string $val Código
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCodigo($val = '#000000'){
		$this->codigo = $val;
		return true;
	}
	
	/**
	* Retorna el código hexadecimal del color
	*
	* @autor Hugo
	* @access public
	* @return string Código
	*/
	
	public function getCodigo(){
		return $this->codigo;
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
			$rs = $db->Execute("INSERT INTO color(clave, nombre) VALUES('".$this->getClave()."', '".$this->getNombre()."');");
			if (!$rs) return false;
				
			$this->idColor = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE color
			SET
				clave = '".$this->getClave()."',
				nombre = '".$this->getNombre()."',
				codigo = '".$this->getCodigo()."'
			WHERE idColor = ".$this->getId());
			
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
		$rs = $db->Execute("delete from color where idColor = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>
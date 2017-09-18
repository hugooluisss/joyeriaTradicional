<?php
/**
* TProducto
* Productos definidos en base a sus categorias
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TProducto{
	private $idProducto;
	private $idPadre;
	private $nombre;
	private $descripcion;
	private $html;
	private $visita;
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TProducto($id = ''){
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
		$rs = $db->Execute("select * from producto left join vista using(idProducto) where idProducto = ".$id);
		
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
		return $this->idProducto;
	}
	
	/**
	* Establece el identificador del padre
	*
	* @autor Hugo
	* @access public
	* @param int $id Padre
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPadre($val = 0){
		$this->idPadre = $val;
		return true;
	}
	
	/**
	* Retorna el identificador del padre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPadre(){
		return $this->idPadre;
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
	* Retorna el nombre
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
	* Establece la descripcion
	*
	* @autor Hugo
	* @access public
	* @param string $val Descripción
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcion($val = ""){
		$this->descripcion = $val;
		return true;
	}
	
	/**
	* Retorna la descripcion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param float $val precio
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
	* @return float Texto
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
		if ($this->getPadre() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO producto(idPadre) VALUES('".$this->getPadre()."');");
			if (!$rs) return false;
				
			$this->idProducto = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE producto
			SET
				nombre = '".$this->getNombre()."',
				clave = '".$this->getClave()."',
				precio = ".$this->getPrecio().",
				descripcion = '".$this->getDescripcion()."'
			WHERE idProducto = ".$this->getId());
			
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
		$rs = $db->Execute("delete from producto where idProducto = ".$this->getId());
		
		return $rs?true:false;
	}
	
	/**
	* Obtiene el nombre real del producto
	*
	* @autor Hugo
	* @access public
	* @return string Nombre
	*/
	
	public function getNombreCompleto(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$id = $this->getId();
		$nombre = '';
		$band = true;
		do{
			$rs = $db->Execute("select nombre, idPadre from producto where idProducto = ".$id);
			$nombre = $rs->fields['nombre']." ".$nombre;
		
			if ($rs->fields['idPadre'] == '' or $rs->fields['idPadre'] == 0)
				return $nombre;
			else
				$id = $rs->fields['idPadre'];
				
		}while(true);
		
		return $rs?true:false;
	}
	
	/**
	* Obtiene la clave real del producto
	*
	* @autor Hugo
	* @access public
	* @return string Clave
	*/
	
	public function getClaveCompleta(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$id = $this->getId();
		$nombre = '';
		$band = true;
		do{
			$rs = $db->Execute("select clave, idPadre from producto where idProducto = ".$id);
			$nombre = $rs->fields['clave'].($nombre == ''?'':'-').$nombre;
		
			if ($rs->fields['idPadre'] == '' or $rs->fields['idPadre'] == 0)
				return $nombre;
			else
				$id = $rs->fields['idPadre'];
				
		}while(true);
		
		return $rs?true:false;
	}
	
	/**
	* Obtiene El precio final
	*
	* @autor Hugo
	* @access public
	* @return float Precio
	*/
	
	public function getPrecioCompleto(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$id = $this->getId();
		$precio = 0;
		$band = true;
		
		do{
			$rs = $db->Execute("select precio, idPadre from producto where idProducto = ".$id);
			$precio += $rs->fields['precio'];
		
			if ($rs->fields['idPadre'] == '' or $rs->fields['idPadre'] == 0)
				return $precio;
			else
				$id = $rs->fields['idPadre'];
				
		}while(true);
		
		return $rs?true:false;
	}
	
	/**
	* Guarda los datos en la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setVista($html = ''){
		if ($this->getId() == '') return false;
		
		#ahora se borra
		$db = TBase::conectaDB();
		$db->Execute("delete from vista where idProducto = ".$this->getId());
		
		if ($html <> ''){
			$rs = $db->Execute("INSERT INTO vista(idProducto, html) VALUES(".$this->getId().", '".$html."');");
			if (!$rs) return false;
		}		
					
		return true;
	}
	
	/**
	* Obtiene el código de la vista
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function getVista($html = ''){
		if ($this->getId() == '') return false;
		
		#ahora se borra
		$db = TBase::conectaDB();
		$rs = $db->Execute("select html from vista where idProducto = ".$this->getId());
		
		return $rs->fields['html'];
	}
	
	/**
	* Incrementa el número de visitas
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addVisita(){
		if ($this->getId() == '') return false;
		
		#ahora se borra
		$db = TBase::conectaDB();
		$rs = $db->Execute("update producto set visitas = visitas + 1 where idProducto = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>
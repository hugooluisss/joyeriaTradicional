<?php
/**
* TCliente
* Clientes
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TCliente{
	private $idCliente;
	private $nombre;
	private $email;
	private $rfc;
	private $direccion;
	private $razonsocial;
	private $localidad;
	private $tel;
	private $cel;
	private $observaciones;
	private $sitioweb;
	private $estado;
	private $pass;
	private $street;
	private $city;
	private $state;
	private $zip;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TCliente($id = ''){
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
		$rs = $db->Execute("select * from cliente where idCliente = ".$id);
		
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
		return $this->idCliente;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ''){
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
	* Establece el email
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ''){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna el email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Establece el rfc
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRFC($val = ''){
		$this->rfc = $val;
		return true;
	}
	
	/**
	* Retorna el rfc
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRFC(){
		return $this->rfc;
	}
	
	/**
	* Establece la direccion
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDireccion($val = ''){
		$this->direccion = $val;
		return true;
	}
	
	/**
	* Retorna la direccion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDireccion(){
		return $this->direccion;
	}
	
	/**
	* Establece la razón social
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setRazonSocial($val = ''){
		$this->razonsocial = $val;
		return true;
	}
	
	/**
	* Retorna la razón social
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getRazonSocial(){
		return $this->razonsocial;
	}
	
	
	/**
	* Establece la localidad
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setLocalidad($val = ''){
		$this->localidad = $val;
		return true;
	}
	
	/**
	* Retorna la localidad
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getLocalidad(){
		return $this->localidad;
	}
	
	/**
	* Establece el teléfono
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ''){
		$this->tel = $val;
		return true;
	}
	
	/**
	* Retorna el teléfono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->tel;
	}
	
	/**
	* Establece el celular
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCelular($val = ''){
		$this->cel = $val;
		return true;
	}
	
	/**
	* Retorna el celular
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCelular(){
		return $this->cel;
	}
	
	/**
	* Establece las observaciones
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setObservaciones($val = ''){
		$this->observaciones = $val;
		return true;
	}
	
	/**
	* Retorna las observaciones
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getObservaciones(){
		return $this->observaciones;
	}
	
	/**
	* Establece el sitio web
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSitioWeb($val = ''){
		$this->sitioweb = $val;
		return true;
	}
	
	/**
	* Retorna la dirección del sitio web
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getSitioWeb(){
		return $this->sitioweb;
	}
	
	/**
	* Establece el tipo (fisica o moral)
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTipo($val = 'F'){
		$this->tipo = $val;
		return true;
	}
	
	/**
	* Retorna el tipo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTipo(){
		return $this->tipo;
	}
	
	/**
	* Establece el estado
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEstado($val = 'R'){
		$this->estado = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEstado(){
		return $this->estado == ''?'R':$this->estado;
	}
	
	/**
	* Establece su contraseña
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPass($val = ''){
		$this->pass = $val;
		return true;
	}
	
	/**
	* Retorna el estado
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPass(){
		return $this->pass;
	}
	
	/**
	* Establece street
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setStreet($val = ''){
		$this->street = $val;
		return true;
	}
	
	/**
	* Retorna street
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getStreet(){
		return $this->street;
	}
	
	/**
	* Establece city
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCity($val = ''){
		$this->city = $val;
		return true;
	}
	
	/**
	* Retorna city
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getCity(){
		return $this->city;
	}
	
	/**
	* Establece state
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setState($val = ''){
		$this->state = $val;
		return true;
	}
	
	/**
	* Retorna state
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getState(){
		return $this->state;
	}
	
	/**
	* Establece zip
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setZip($val = ''){
		$this->zip = $val;
		return true;
	}
	
	/**
	* Retorna zip
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getZip(){
		return $this->zip;
	}
		
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO cliente(nombre) VALUES('".$this->getNombre()."');");
			if (!$rs) return false;
				
			$this->idCliente = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE cliente
			SET
				nombre = '".mysql_real_escape_string($this->getNombre())."',
				direccion = '".mysql_real_escape_string($this->getDireccion())."',
				email = '".$this->getEmail()."',
				rfc = '".$this->getRFC()."',
				razonsocial = '".mysql_real_escape_string($this->getRazonSocial())."',
				localidad = '".mysql_real_escape_string($this->getLocalidad())."',
				tel = '".$this->getTelefono()."',
				cel = '".$this->getCelular()."',
				observaciones = '".mysql_real_escape_string($this->getObservaciones())."',
				sitioweb = '".$this->getSitioWeb()."',
				tipo = '".$this->getTipo()."',
				estado = '".mysql_real_escape_string($this->getEstado())."',
				pass = '".$this->getPass()."',
				street = '".mysql_real_escape_string($this->getStreet())."',
				city = '".mysql_real_escape_string($this->getCity())."',
				state = '".mysql_real_escape_string($this->getState())."',
				zip = '".$this->getZip()."'
			WHERE idCliente = ".$this->getId());
			
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
		$rs = $db->Execute("delete from cliente where idCliente = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>
<?php
//require_once('Image_Barcode-1.1.0/Barcode.php');
/*
 * Created on 11/02/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class RPedido extends tFPDF{
	private $cotizacion;
	private $showCodigo;
	
	public function RPedido($id, $codigo = false){
		$this->pedido = new TPedido($id);
		
		parent::tFPDF('P', 'mm', array(187, 239));
		$this->AddFont('Sans','', 'DejaVuSans.ttf', true);
		$this->AddFont('Sans','B', 'DejaVuSans-Bold.ttf', true);
		$this->AddFont('Sans','U', 'DejaVuSans-Oblique.ttf', true);
		$this->AddFont('Sans','BU', 'DejaVuSans-BoldOblique.ttf', true);
		$this->cleanFiles();
		$this->SetAutoPageBreak(false, 0);
		//$this->formatoFondo = $formatoFondo;
		$this->AliasNbPages();
		$this->showCodigo = $codigo;
	}	
	
	public function AddPage(){
		parent::AddPage();
		
		$this->SetFont('Arial', 'B', 10);
		$this->Image('repositorio/img/orden.jpg', 0, 0, 190, 240);
		$this->SetXY(140, 32);
		$this->Cell(0, 5, $this->pedido->getFecha(), 0, 0, 'C');
		$this->SetXY(140, 40);
		$this->SetFont('Arial', '', 10);
		if ($this->showCodigo or true)
			$this->Cell(0, 5, "Purchase order: #".$this->pedido->getId(), 0, 0, 'C');
		$this->SetFont('Arial', 'B', 10);
		$this->SetXY(35, 41);
		$this->Cell(0, 5, utf8_decode(strtoupper($this->pedido->cliente->getRazonSocial(). ' - '.$this->pedido->cliente->getNombre())));
		
		$this->SetXY(10, 69);
	}
	
	public function generar($id = ''){
		if ($id <> '')
			$this->pedido = new TPedido($id);
			
		$this->AddPage();
		$this->SetFont('Arial', '', 8);
		$ancho = 3.4;
		$total = 0;
		$cont = 0;
		#for($x = 0 ; $x < 20; $x ++)
		foreach($this->pedido->movimientos as $mov){
			$this->SetFont('Arial', '', 8);
			$this->Cell(1, $ancho, "");
			if ($this->showCodigo and false){
				$this->Cell(27, $ancho, $mov->getClave());
				$this->Cell(97, $ancho, $mov->getDescripcion());
			}else{
				$this->Cell(124, $ancho, $mov->getDescripcion());
			}
			$this->Cell(12, $ancho, $mov->getCantidad(), 0, 0, 'R');
			$this->Cell(12.5, $ancho, sprintf("$ %.2f", $mov->getPrecio() / $mov->getCantidad()), 0, 0, 'R');
			$this->Cell(19, $ancho, $mov->getPrecio(), 0, 0, 'R');
			$total += $mov->getPrecio();
			$this->Ln($ancho);
			$cont++;
			if ($cont % 38 == 0){
				$this->Ln($ancho/2);
				$this->SetFont('Arial', 'B', 11);
				$this->Cell(0, $ancho, "--------", 0, 0, 'R');
				$this->AddPage();
				$this->SetFont('Arial', '', 5);
			}
		}
		
		$this->Ln($ancho);
		
		$this->Cell(1, $ancho, "");
		$this->Cell(27, $ancho, "");
		$this->Cell(97, $ancho, "Subtotal");
		$this->Cell(12, $ancho, "", 0, 0, 'R');
		$this->Cell(12.5, $ancho, "", 0, 0, 'R');
		$this->Cell(19, $ancho, sprintf("$ %.2f", $total), 0, 0, 'R');
		$this->Ln($ancho);
		
		$descuento = 0;
		if ($total < 500)
			$descuento = 0;
		elseif($total < 1000)
			$descuento = .05;
		elseif($total < 2000)
			$descuento = 0.1;
		else
			$descuento = 0.15;
			
		if ($descuento > 0){
			if ($cont % 38 == 0){
				$this->Ln($ancho/2);
				$this->SetFont('Arial', 'B', 11);
				$this->Cell(0, $ancho, "--------", 0, 0, 'R');
				$this->AddPage();
				$this->SetFont('Arial', '', 5);
			}
			
			$this->Cell(1, $ancho, "");
			$this->Cell(27, $ancho, "Dis ".($descuento * 100)."%");
			$this->Cell(97, $ancho, "Discount ".($descuento * 100)."%");
			$this->Cell(12, $ancho, "", 0, 0, 'R');
			$this->Cell(12.5, $ancho, "-".($descuento * 100)."%", 0, 0, 'R');
			$this->Cell(19, $ancho, sprintf("$ %.2f", $total * $descuento), 0, 0, 'R');
			$total -= $total * $descuento;
			$this->Ln($ancho);
		}
		
		$db = TBase::conectaDB();
		
		if ($this->pedido->getId() <> ''){
			$rs = $db->Execute("select a.*, b.nombre from envio a join paqueteria b using(idPaqueteria) where idPedido = ".$this->pedido->getId());
			if(!$rs->EOF and $rs->fields['costo'] > 0){
				$this->Cell(1, $ancho, "");
				$this->Cell(27, $ancho, "");
				$this->Cell(97, $ancho, "Shipping ".$rs->fields['nombre']);
				$this->Cell(12, $ancho, "", 0, 0, 'R');
				$this->Cell(12.5, $ancho, "", 0, 0, 'R');
				$this->Cell(19, $ancho, sprintf("$ %.2f", $rs->fields['costo']), 0, 0, 'R');
				$this->Ln($ancho);
				
				$total += $rs->fields['costo'];
			}
		}
		
		if ($this->pedido->getExtra() > 0){
			$this->Cell(1, $ancho, "");
			$this->Cell(27, $ancho, "");
			$this->Cell(97, $ancho, "Small order fee");
			$this->Cell(12, $ancho, "", 0, 0, 'R');
			$this->Cell(12.5, $ancho, "", 0, 0, 'R');
			$this->Cell(19, $ancho, sprintf("$ %.2f", $this->pedido->getExtra()), 0, 0, 'R');
			$total += $this->pedido->getExtra();
			$this->Ln($ancho);
		}
		
		$this->SetFont('Arial', 'B', 11);
		$this->SetXY(140, 200);
		$this->Cell(0, $ancho, sprintf("$ %.2f", $total), 0, 0, 'R');
		
		$this->AddPage();
		$this->SetFont('Arial', '', 8);
		$this->SetY(70);
		$this->Cell(27, 5, utf8_decode(" Comments: ")); $this->Ln(5);
		$this->MultiCell(27, 5, utf8_decode($this->pedido->getComentario()));
	}
		
	private function cleanFiles(){
    	$t = time();
    	$dir = "temporal";
    	$h = opendir($dir);
    	while($file=readdir($h)){
        	if(substr($file,0,3)=='tmp' && substr($file,-4)=='.pdf'){
            	$path = $dir.'/'.$file;
            	if($t-filemtime($path)>3600)
                	@unlink($path);
        	}
    	}
    	closedir($h);
	}
	
	public function Output(){
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.pdf');
		$file .= '.pdf';
		parent::Output($file, 'F');
		chmod($file, 0555);
		//header('Location: temporal/'.$file);
		
		return $file;
	}
	
	function Footer(){
		// Go to 1.5 cm from bottom
		$this->SetY(-15);
		// Select Arial italic 8
		$this->SetFont('Arial','I',8);
		// Print centered page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
	}
}
?>
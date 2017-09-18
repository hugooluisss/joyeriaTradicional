<?php
//require_once('Image_Barcode-1.1.0/Barcode.php');
/*
 * Created on 11/02/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class RProductos extends tFPDF{
	private $cotizacion;
	private $showCodigo;
	
	public function RProductos($madres, $codigo = false){
		parent::tFPDF('P', 'mm', array(187, 239));
		$this->AddFont('Sans','', 'DejaVuSans.ttf', true);
		$this->AddFont('Sans','B', 'DejaVuSans-Bold.ttf', true);
		$this->AddFont('Sans','U', 'DejaVuSans-Oblique.ttf', true);
		$this->AddFont('Sans','BU', 'DejaVuSans-BoldOblique.ttf', true);
		$this->cleanFiles();
		$this->SetAutoPageBreak(false, 0);
		$this->formatoFondo = $formatoFondo;
		$this->AliasNbPages();
		
		$this->madres = $madres;
		$this->showCodigo = $codigo;
	}	
	
	public function AddPage(){
		parent::AddPage();
		
		$this->SetFont('Arial', 'B', 11);
		$this->Image('repositorio/img/logo.jpg', 76, 5, 25, 25);
		$this->SetXY(95, 20);
		$this->Ln(1);
		#$this->Cell(0, 5, "GorillaGlass", 0, 0, 'C');
		$this->SetFont('Arial', 'B', 6);
		$this->Ln(5);
		$this->Cell(50, 5, "DATE: ".date("Y-m-d"), 0, 0, 'L');
		
		$this->Cell(0, 5, utf8_decode(("Wholesale price list")), 0, 0, 'R');
		
		$this->SetXY(10, 33);
		$ancho = 4;
		$this->SetTextColor(255, 255, 255);
		$this->Cell(27, $ancho, "CODE", 1, 0, 'C', true);
		$this->Cell(101, $ancho, "DESCRIPTION", 1, 0, 'C', true);
		$this->SetFont('Arial', 'B', 4);
		$this->Cell(19.5, $ancho, "PRICE PER PIECE (USD)", 1, 0, 'C', true);
		$this->Cell(19.5, $ancho, "PRICE PER PAIR (USD)", 1, 1, 'C', true);
		$this->SetTextColor(0, 0, 0);
		$this->SetFont('Arial', '', 7);
	}
	
	public function generar($productos = ''){
		#$this->AddPage();
		$this->SetFont('Arial', '', 7);
		$ancho = 3.4;
		$total = 0;
		$cont = 0;
		$madre = '';
		$bufClave = "";
		
		foreach($productos as $producto){
			$clave = explode("-", $producto["clave"]);
			$otraClave = $clave[1];
			$clave = $clave[0];
			if ($madre <> $clave){
				$madre = $clave;
				$this->Cell(0, $ancho, "", "T");
				
				$this->AddPage();
				$this->SetFillColor(255);
				$this->Rect(0, 30, 255, 60, "F");
				$this->SetFillColor(0);
				#$this->Image('repositorio/img/logo.jpg', 43, 25, 100, 100);
				$this->SetFont('Arial', 'B', 25);
				$this->Ln(60);
				$this->Cell(0, $ancho, "Gorilla Glass wholesale price list.", 0, 0, 'C');
				$this->SetFont('Arial', 'B', 20);
				$this->SetXY(0, 120);
				$this->Ln(5);
				$this->Cell(0, $ancho, $this->madres[$madre]['nombre'], 0, 0, 'C');
				
				$this->SetFont('Arial', '', 7);
				$cont = 0;
				$this->AddPage();
				$bufClave = "";
			}else if ($otraClave <> $bufClave and $bufClave <> ""){
				$this->Cell(0, 2, "", "TB", 1, 'C');
				$bufClave = $otraClave;
			}else{
				$bufClave = $otraClave;
			
				$this->Cell(27, $ancho, $this->showCodigo?$producto["clave"]:"", "LR");
				$this->Cell(101, $ancho, $producto["descripcion2"], 'R');
				$this->Cell(19.5, $ancho, sprintf("%.2f", $producto["precio"]), 'R', 0, 'R');
				
				#$clave = explode("-", $producto["clave"]);
				if(in_array($clave, array("P", "W", "E", "F")))
					$this->Cell(19.5, $ancho, sprintf("%.2f", $producto["precio"] * 2), 'R', 0, 'R');
				else
					$this->Cell(19.5, $ancho, "", 'R', 0, 'R');
					
				$this->Ln($ancho);
				$cont++;
				if ($cont % 53 == 0){
					$this->Cell(0, $ancho, "", "T");
					
					$this->Ln($ancho/2);
					$this->AddPage();
				}
			}
		}
		
		if ($cont % 53 <> 0)
			$this->Cell(0, $ancho, "", "T");
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
	
	public function Output2(){
		parent::Output("PriceList.pdf", 'I');
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
<?php
	include("../compruebo.php");
	require '../fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/logo3.png', 10, 10, 50 );
			$this->SetFont('Helvetica','B',18);
			$this->SetTextColor(184,10,10);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode("Historia Clínica"),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>
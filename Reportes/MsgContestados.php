<?php
    //include("../compruebo.php");
	require '../fpdf/fpdf.php';
   require '../Conexion.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			//$this->Image('../img/manzana.png', 10, 10, 50 );
			$this->SetFont('Helvetica','B',18);
			$this->SetTextColor(184,10,10);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode("Mensajes Contestados"),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
    }
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();
    
    
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(70,5,utf8_decode("Id: "),1,1,'L');

        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(95,6,'Autor ',1,0,'C',1);
        $pdf->Cell(95,6,'Datos de Contacto ',1,1,'C',1);
        $pdf->Cell(95,6,utf8_decode("Mariana"),1,0,'C');
        $pdf->Cell(95,6,utf8_decode("marianalizz001@hotmail.com , 4951031560"),1,1,'C');
        $pdf->Cell(190,6,'Mensaje ',1,1,'L',1);
        $pdf->Cell(190,6,utf8_decode("Hola"),1,1,'L');
        $pdf->Cell(110,6,utf8_decode('Respondió'),1,0,'C',1);
        $pdf->Cell(40,6,'Recibido',1,0,'C',1);
        $pdf->Cell(40,6,'Respuesta ',1,1,'C',1);
        $pdf->Ln();
        $pdf->Ln();
    
	$pdf->Output();
?>
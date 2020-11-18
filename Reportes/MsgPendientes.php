<?php
    include("../compruebo.php");
	require '../fpdf/fpdf.php';
    require '../Conexion.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/logo3.png', 10, 10, 50 );
			$this->SetFont('Helvetica','B',18);
			$this->SetTextColor(184,10,10);
			$this->Cell(30);
			$this->Cell(120,10,utf8_decode("Mensajes Pendientes"),0,0,'C');
            $this->Ln(20);
            
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
    }
    


    $query = $bd->Mensaje->find();
	
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(232,232,232);


    foreach($query as $row){
        if ($row['visto'] == '0'){
            $pdf->SetTextColor(0,0,0);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(70,5,utf8_decode("Id: " .$row['_id']),1,1,'L');

            $pdf->SetFillColor(232,232,232);
            $pdf->Cell(95,6,'Autor ',1,0,'C',1);
            $pdf->Cell(95,6,'Datos de Contacto ',1,1,'C',1);
            $pdf->Cell(95,6,utf8_decode($row['nombre']." ".$row['apPat']." ".$row['apMat']),1,0,'C');
            $pdf->Cell(95,6,utf8_decode($row['correo']."  " . $row['telefono']),1,1,'C');
            $pdf->Cell(190,6,'Mensaje ',1,1,'L',1);
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(190,10,utf8_decode($row['mensaje']),1,1,'L');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(95,6,utf8_decode('Fecha en que se envió'),1,0,'C',1);
            $pdf->Cell(95,6,utf8_decode($row['f_enviado']),1,0,'C');

            $pdf->Ln();
            $pdf->Ln();
        }
    }
    
	$pdf->Output();
?>
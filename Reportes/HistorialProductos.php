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
			$this->Cell(120,10,utf8_decode("Historial Inventario"),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
    }

    $query = $bd->Historial_inventario.find();

    $pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(232,232,232);

    foreach($query as $row){
		$pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(232,232,232);

		$pdf->Cell(50,6,'Usuario ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($row['nombre']),1,1,'L');

		$pdf->Cell(50,6,'Producto ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($row['producto']),1,1,'L');
		
        $pdf->Cell(50,6,'Fecha Modificacion ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['fecha']),1,1,'L');

        $pdf->Cell(50,6,'Existencia Nueva ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['en']),1,1,'L');

        $pdf->Cell(50,6,'Existencia Anterior ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['ea']),1,1,'L');

        $pdf->Cell(50,6,'Precio Nuevo',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['pn']),1,1,'L');

        $pdf->Cell(50,6,'Precio Anterior',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['pa']),1,1,'L');

        $pdf->Ln();

    }
	$pdf->Output();
?>
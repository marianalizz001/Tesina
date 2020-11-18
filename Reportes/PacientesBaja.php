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
			$this->Cell(120,10,utf8_decode("Baja de Pacientes"),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
    }
    

    $query = "SELECT tipo_usuario, usuario, f_alta, f_baja, nombre, apPat, apMat, f_nac, genero, calle, no_ext, no_int, colonia, cp, correo,
     telefono FROM usuario WHERE tipo_usuario = 'P' and f_baja != 'NULL' " ;
	
    $resultado = mysqli_query($conexion, $query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();
    
    while($row = $resultado->fetch_assoc()){
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(232,232,232);

        $pdf->Cell(50,6,'Usuario ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['usuario']),1,1,'L');

        $pdf->Cell(50,6,'Fecha de alta ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);

        $pdf->Cell(140,6,utf8_decode($row['f_alta']),1,1,'L');

        $pdf->Cell(50,6,'Fecha de baja ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['f_baja']),1,1,'L');

        $pdf->Cell(50,6,'Nombre ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['nombre']." ".$row['apPat']." ". $row['apMat']),1,1,'L');

        $pdf->Cell(50,6,'Fecha de Nacimiento ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['f_nac']),1,1,'L');

        $pdf->Cell(50,6,'Genero ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($row['genero'] == 'F') $pdf->Cell(140,6,utf8_decode('Femenino'),1,1,'L');
        if ($row['genero'] == 'M') $pdf->Cell(140,6,utf8_decode('Masculino'),1,1,'L');
        
        $pdf->Cell(50,6,'Correo ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['correo']),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Teléfono '),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['telefono']),1,1,'L');

        $pdf->Cell(50,6,'Domicilio ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($row['calle']. " ". $row['no_ext']. "". $row['no_int']." ". $row['colonia']. " " . $row['cp']),1,1,'L');
        
        $pdf->Ln();
    }
    
	$pdf->Output();
?>
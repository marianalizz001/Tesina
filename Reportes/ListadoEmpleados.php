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
			$this->Cell(120,10,utf8_decode("Listado de Empleados"),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
    }
    
    $consulta = $bd->Usuario->find(
        [
            'tipo_usuario' => 'E',
            'f_baja' => array('$exists' => false)
        ]
        );

   /* $query = "SELECT tipo_usuario, usuario, f_alta, rfc, salario, nombre, apPat, apMat, f_nac, genero, calle, no_ext, no_int, colonia, cp, correo,
     telefono FROM usuario WHERE tipo_usuario = 'E'";
	
    $resultado = mysqli_query($conexion, $query);*/
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();
    
    foreach($consulta as $act ){
        $idUsuario = $act['_id'];
        $usuario = $act['usuario'];
        $nombre = $act['nombre'];
        $apPat = $act['apPat'];
        $apMat = $act['apMat'];
        $genero = $act['genero'];
        $correo = $act['correo'];
        $f_nac = $act['f_nac'];
        $telefono = $act['telefono'];
        $rfc = $act['rfc'];
        $salario = $act['salario'];

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $pdf->SetFillColor(232,232,232);

        $pdf->Cell(50,6,'Usuario ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($usuario),1,1,'L');

        $pdf->Cell(50,6,'Salario ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($salario),1,1,'L');

        $pdf->Cell(50,6,'RFC ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($rfc),1,1,'L');

        $pdf->Cell(50,6,'Nombre ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($nombre." ".$apPat." ". $apMat),1,1,'L');

        $pdf->Cell(50,6,'Fecha de Nacimiento ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($f_nac),1,1,'L');

        $pdf->Cell(50,6,'Genero ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($genero == "F") $pdf->Cell(140,6,utf8_decode('Femenino'),1,1,'L');
        if ($genero == "M") $pdf->Cell(140,6,utf8_decode('Masculino'),1,1,'L');
        
        $pdf->Cell(50,6,'Correo ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($correo),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Teléfono '),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($telefono),1,1,'L');
        
        $pdf->Ln();
    }
    
	$pdf->Output();
?>
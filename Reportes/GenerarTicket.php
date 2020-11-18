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
            $this->Cell(80,10,utf8_decode("Ticket"),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
    }
    //$idUsuario = $_POST['idUsuario'];
    $idUsuario = $_SESSION['id'];
    $idCita = $_POST['idCita'];

    
    $cita =(string)$idCita;

    $consulta = $bd->Cita->find([
        '_id' => new \MongoDB\BSON\ObjectID($idCita)
    ]);

    $consulta2 = $bd->Pagos->find([
        'Cita_idCita' => $cita
    ]);

    $consulta3 = $bd->Usuario->find([
        '_id' => new \MongoDB\BSON\ObjectID($idUsuario)
    ]);


    //$query="select a.idPago,a.fecha,a.monto,b.nombre as nombrePac,b.title,c.nombre as nombreEmp from pagos a, cita b,usuario c where b.id=$idCita and a.cita_idCita=b.id and c.idUsuario=$idUsuario";
    //$resultado = mysqli_query($conexion, $query);

    $pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFillColor(232,232,232);
    $pdf->Cell(90,6,'Av. Las Americas #903 Int. 15 ',0,0,'C');
    $pdf->Ln();
    $pdf->Cell(90,6,'Centro Medico Las Americas Aguascalientes ',0,0,'C');
    $pdf->Ln();
    $pdf->Cell(90,6,utf8_decode('Teléfono: 449 180 51 34 '),0,0,'C');
    $pdf->Ln();

    $pdf->Cell(90,6,utf8_decode('-------------------------------------------------------------'),0,0,'C');
    $pdf->Ln();
    foreach($consulta as $act){
        foreach($consulta2 as $act2){
            foreach($consulta3 as $act3){


		$pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

		$pdf->Cell(40,7,'Fecha y Hora: ',0,0,'C',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(50,7,utf8_decode($act2['fecha']),0,0,'C',1);

        $pdf->Ln();
        $pdf->Cell(40,7,utf8_decode('Le atendió: '),0,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(50,7,utf8_decode($act3['nombre']." ".$act3['apPat']),0,0,'C',1);
        $pdf->Ln();
        $pdf->Cell(90,6,utf8_decode('-------------------------------------------------------------'),0,0,'C');

        $pdf->Ln();
        $pdf->Cell(40,7,utf8_decode('Paciente: '),0,0,'C',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(50,7,utf8_decode($act['nombre']),0,0,'C',1);
        $pdf->Ln();
        $pdf->Cell(90,6,utf8_decode('-------------------------------------------------------------'),0,0,'C');

        $pdf->Ln();
        $pdf->Cell(50,7,'Procedimiento ',0,0,'L');
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(1,7,utf8_decode("|"),0,0,'C');
        $pdf->Cell(40,7,utf8_decode("Total"),0,0,'R');
        $pdf->Ln();
        $pdf->Cell(90,6,utf8_decode('-------------------------------------------------------------'),0,0,'C');
        $pdf->Ln();
        $pdf->Cell(50,7,utf8_decode($act['title']),0,0,'L');
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(1,7,utf8_decode("|"),0,0,'C');
		$pdf->Cell(40,7,utf8_decode("$".$act2['monto'].".00"),0,0,'R');
        
        $pdf->Ln();
        $pdf->Cell(90,6,utf8_decode('-------------------------------------------------------------'),0,0,'C');
        $pdf->Ln();
            }
        }

    }

    $pdf->Cell(90,6,utf8_decode('¡Gracias por confiarnos'),0,0,'C');
    $pdf->Ln();
    $pdf->Cell(90,6,utf8_decode('TU SONRISA! '),0,0,'C');
    $pdf->Ln();
	$pdf->Output();
?>
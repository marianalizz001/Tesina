<?php
	include 'plantilla_g.php';
    require '../Conexion.php';

	$id = $_REQUEST['idUsuario'];
	$id_cita = $_REQUEST['idCita'];

    $query = $bd->Paciente->find(
        [
            '_id' => new \MongoDB\BSON\ObjectID($id)
        ]
    );
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
    $pdf->AddPage();

    foreach ($query as $row){

        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(45,5,utf8_decode("DATOS PERSONALES"),0,1,'C');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

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
	}

	$query = $bd->Cita->find(
        [
            '_id' => new \MongoDB\BSON\ObjectID($id_cita)
        ]
    );


	foreach ($query as $row){

		$seguimiento = $row['seguimiento'];
		$EvaluaciónAntropométrica = $seguimiento->EvaluaciónAntropométrica;
		$Valores = $seguimiento->Valores;
		$Tratamiento = $seguimiento->Tratamiento;
		$obj = json_decode($EvaluaciónAntropométrica);


		$pdf->Ln();
		$pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(69,5,utf8_decode("EVALUACIÓN ANTROPOMÉTRICA"),0,1,'C');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','B',12);
		

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

		$pdf->Cell(50,6,utf8_decode('Fecha:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'fecha'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Peso Actual:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'peso_actual'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Peso Ideal:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'peso_ideal'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Peso Habitual:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'peso_habitual'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Complexión:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'complex'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Talla:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'talla'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('IMC:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'imc'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Cin/Cad:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'icc'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Grasa Cor:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'g_corporal'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Masa Corporal:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'m_muscular'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Grasa Visceral:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'g_visceral'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Edad metabólica:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'edad_met'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('C. Muñeca:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'c_muneca'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('C. Cadera:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'c_cadera'}),1,1,'L');
		

		$pdf->Cell(50,6,utf8_decode('C. Cintura:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'c_cintura'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('C. Brazo:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'c_brazo'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('C. Pierna:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'c_pierna'}),1,1,'L');


		$pdf->Ln();
		$pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(50,5,utf8_decode("CÁLCULO DE CALORIAS"),0,1,'C');
		$pdf->Ln();
		
		$obj = json_decode($Tratamiento);

        $pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','B',12);
		
		$pdf->Cell(50,6,utf8_decode('Hidratos de Carbono:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'hidratos'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('Proteínas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'proteinas'}),1,1,'L');
		
		$pdf->Cell(50,6,utf8_decode('Lípidos:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'lipidos'}),1,1,'L');

		$pdf->Ln();
		$pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(50,5,utf8_decode("CONSIDERACIONES GEERALES"),0,1,'C');
		$pdf->Ln();
		
		$obj = json_decode($Tratamiento);

        $pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','B',12);

		
		$pdf->Cell(50,6,utf8_decode('Verduras:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'verduras'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('Frutas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'frutas'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('Cereales:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'cereales'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('Lguminosas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'leguminosas'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('AOA:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'aoa'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('Lácteos:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'lacteos'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('Grasas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'grasas'}),1,1,'L');

		$pdf->Cell(50,6,utf8_decode('Azúcares:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
		$pdf->Cell(140,6,utf8_decode($obj->{'azucar'}),1,1,'L');

		$pdf->Ln();
		$pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(70,5,utf8_decode("CONSIDERACIONES ESPECIFICAS"),0,1,'C');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial','B',12);

	
		$pdf->Cell(50,6,utf8_decode($obj->{'consideraciones'}),1,1,'L');
	


        $pdf->AddPage(); 
    }
	
	$pdf->Output();
?>
<?php
	include 'plantilla.php';
    require '../Conexion.php';

    $id = $_REQUEST['idUsuario'];

    $query = $bd->Usuario->find(
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

        $pdf->Cell(50,6,'Domicilio ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);

        $domicilio = $row['direccion'];
        $calle = $domicilio->calle;
        $no_ext = $domicilio->no_ext;
        $colonia = $domicilio->colonia;
        $cp = $domicilio->cp;

        $pdf->Cell(140,6,utf8_decode($calle. " ". $no_ext. " ". $colonia. " " . $cp),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Referido por '),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);

        $detalle = $row['detalle_paciente'];
        $referido = $detalle->referido;
        $mot_consulta = $detalle->mot_consulta;
        $ult_consulta = $detalle->ult_consulta;
        $contacto = $detalle->contacto_emergencia;
        
        $cont_nombre = $contacto->nombre;
        $cont_apPat = $contacto->apPat;
        $cont_apMat = $contacto->apMat;
        $cont_tel = $contacto->telefono;

        $pdf->Cell(140,6,utf8_decode($referido),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Motivo de consulta '),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($mot_consulta),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Última consulta dental'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($ult_consulta),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Contacto emergencia'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($cont_nombre. " ". $cont_apPat. " ". $cont_apMat ." - ". $cont_tel),1,1,'L');
        
        $pdf->Ln();
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(82,5,utf8_decode("ANTECEDENTES HEREDO-FAMILIARES"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

        $obj = json_decode($row['AntecedentesHeredoFamiliares']);

        $pdf->Cell(50,6,utf8_decode('Alergias'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'alergias'} == "Si"){
            $pdf->Cell(140,6,utf8_decode($obj->{'alergias_q'}),1,0,'L');
            $pdf->Ln();
        }else
            $pdf->Cell(140,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Enf. Cardiológicas'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'cardiologicas'} == "Si"){
            $pdf->Cell(140,6,utf8_decode($obj->{'cardiologicas_q'}),1,0,'L');
            $pdf->Ln();
        }else
            $pdf->Cell(140,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Hipertensión Arterial'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'hipertension'} == "Si"){
            $pdf->Cell(140,6,utf8_decode($obj->{'hipertension_q'}),1,0,'L');
            $pdf->Ln();
        }else
            $pdf->Cell(140,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Enf. Oncológicas'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'oncologicas'} == "Si"){
            $pdf->Cell(140,6,utf8_decode($obj->{'oncologicas_q'}),1,0,'L');
            $pdf->Ln();
        }else
            $pdf->Cell(140,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Diabetes'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'diabetes'} == "Si"){
            $pdf->Cell(140,6,utf8_decode($obj->{'diabetes_q'}),1,0,'L');
            $pdf->Ln();
        }else
            $pdf->Cell(140,6,utf8_decode("No"),1,1,'L');
        
           
        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("ANTECEDENTES PERSONALES NO PATALÓGICOS"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

        $obj = json_decode($row['AntecedentesPersonalesNoPatológicos']);

        $pdf->Cell(135,6,utf8_decode('¿Cuanta su hogar con todos los servicios básicos de urbanidad?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'servicios_basicos'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Su baño personal es diario?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'bano_personal'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        
        $pdf->Cell(135,6,utf8_decode('¿Cepilla sus dientes? (Veces por día)'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'cepillar_dientes'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'cepillar_dientes_esp'}." veces"),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        
        $pdf->Cell(135,6,utf8_decode('¿Utiliza enjuague bucal?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'enjuage_bucal'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Utiliza hilo dental?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'hilo_dental'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        
        $pdf->Cell(135,6,utf8_decode('¿Realiza actividad física? (Horas por semana)'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'act_fisica'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'act_fisica_esp'}." horas"),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Ha consumido o consume drogas?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'drogas'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'drogras_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        
        $pdf->Cell(135,6,utf8_decode('¿Fuma? (Cigarrillos por día)'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'fuma'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'fuma_esp'}). "cigarros",1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        
        $pdf->Cell(135,6,utf8_decode('¿Consume bebidas alcohólicas? (Frecuencia y Cantidad)'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'alcohol'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'alcohol_esp'}). "cigarros",1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        
        $pdf->Cell(135,6,utf8_decode('¿Tatuajes?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'tatuajes'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'tatuajes_esp'}). "tatuajes",1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Esquema de inmunización completo?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'vacunas'} == "Si")
            $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        
        if ($row['genero'] == 'F'){
            $pdf->Cell(135,6,utf8_decode('¿Está embarazada? (Semanas)?'),1,0,'L',1);
            $pdf->SetFillColor(232,232,232);
            if ($obj->{'embarazada'} == "Si")
                $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'embarazada_esp'}). "semanas",1,1,'L');
            else
                $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

            $pdf->Cell(135,6,utf8_decode('¿Está amamantando?'),1,0,'L',1);
            $pdf->SetFillColor(232,232,232);
            if ($obj->{'embarazada'} == "Si")
                $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
            else
                $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        }

        if ($row['f_nac'] < '2002-01-01'){
            $pdf->Cell(135,6,utf8_decode('¿Uso de anticonceptivos?'),1,0,'L',1);
            $pdf->SetFillColor(232,232,232);
            if ($obj->{'anticonceptivos'} == "Si")
                $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
            else
                $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');
        }

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("ANTECEDENTES PERSONALES PATALÓGICOS"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

        $obj = json_decode($row['AntecedentesPersonalesPatológicos']);
        
        $pdf->Cell(135,6,utf8_decode('¿Ha sido hospitalizado o intervenido quirúrgicamente?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'hospitalizado'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'hospitalizado_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Se encuentra bajo algún tratamiento médico?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'tratamiento'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'tratamiento_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Alergia a alguna sustancia, anestesia o medicamento?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'anestesia'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'anestesia_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece enfermedades de la sangre?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'sangre'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'sangre_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Algún golpe que le haya dejado una secuela?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'secuela'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'secuela_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece hipo/hipertensión arterial?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'hipertension'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'hipertension_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece alguna enfermedad del corazón?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'corazon'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'corazon_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece alguna enfermedad respiratoria?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'respiratoria'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'respiratoria_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece convulsiones?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'convulsiones'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'convulsiones_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece hepatitis?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'hepatitis'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'hepatitis_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece de VIH/SIDA?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'vih'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'vih_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece tuberculosis?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'tuberculosis'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'tuberculosis_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece alguna enfermedad en los riñores?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'rinones'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'rinones_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Padece otra enfermedad no mencionada?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'nomencionada'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'nomencionada_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Ha necesitado alguna transfusión sanguínea?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'transfusion'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'transfusion_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('¿Está tomando algún medicamento?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        if ($obj->{'medicamento'} == "S")
            $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'medicamento_esp'}),1,1,'L');
        else
            $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Observaciones'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'observaciones'}),1,1,'L');

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("EXPLORACIÓN FÍSICA"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $obj = json_decode($row['ExploraciónFisica']);

        $pdf->Cell(50,6,utf8_decode('Tipo de dentición:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'denticion'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Clasificación de angle:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'angle'}),1,1,'L');

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("EXÁMENES COMPLEMENTARIOS"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $obj = json_decode($row['ExamenesComplementarios']);

        $pdf->Cell(50,6,utf8_decode('Laboratorio:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'laboratorio'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Descripción:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'descripcion'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Tipo'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'tipo'}),1,1,'L');

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("CONCLUSIÓN DIAGNÓSTICA"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $obj = json_decode($row['ConclusionDiagnóstica']);

        $pdf->Cell(50,6,utf8_decode('Estado de salud'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'salud'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Conductual'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'conducta'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Enfermedad actual'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'enfermedad_actual'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Pronóstico'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'pronostico'}),1,1,'L');
        $pdf->Ln();

        $pdf->AddPage(); 

        $pdf->Image('carta.png',10,20,200);
    }
	
	$pdf->Output();
?>
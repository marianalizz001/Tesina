<?php
	include 'plantilla.php';
    require '../Conexion.php';

    $id = $_REQUEST['idUsuario'];

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

        $pdf->Cell(50,6,'Domicilio ',1,0,'L',1);
        $pdf->SetFillColor(232,232,232);

        $domicilio = $row['direccion'];
        $calle = $domicilio->calle;
        $no_ext = $domicilio->no_ext;
        $colonia = $domicilio->colonia;
        $cp = $domicilio->cp;

        $HistorialClinico = $row['HistorialClinico'];
        $AntecedentesHeredoFamiliares = $HistorialClinico->AntecedentesHeredoFamiliares;
        $AntecedentesPersonalesNoPatológicos = $HistorialClinico->AntecedentesPersonalesNOPatológicos;
        $AntecedentesPersonalesPatológicos = $HistorialClinico->AntecedentesPersonalesPatológicos;
        $EvaluacionClinica = $HistorialClinico->EvaluaciónClínica;
        $EvaluaciónDietética = $HistorialClinico->EvaluaciónDietética;
        $EvaluaciónBiométrica = $HistorialClinico->EvaluaciónBiométrica;


        $pdf->Cell(140,6,utf8_decode($calle. " ". $no_ext. " ". $colonia. " " . $cp),1,1,'L');

        
        $pdf->Ln();
        $pdf->SetFillColor(232,232,232);
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(82,5,utf8_decode("ANTECEDENTES HEREDO-FAMILIARES"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);

        $obj = json_decode($AntecedentesHeredoFamiliares);

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

        $obj = json_decode($AntecedentesPersonalesNoPatológicos);

        $pdf->Cell(135,6,utf8_decode('¿Cuantos litros de agua consume?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'agua_litros'}." litros"),1,1,'L');

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

            $pdf->Cell(135,6,utf8_decode('¿Embarazos Previos?'),1,0,'L',1);
                $pdf->SetFillColor(232,232,232);
                if ($obj->{'embarazos'} == "Si")
                    $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'embarazos_esp'}). "embarazos",1,1,'L');
                else
                    $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

            $pdf->Cell(135,6,utf8_decode('¿Nacieron a termino?'),1,0,'L',1);
            $pdf->SetFillColor(232,232,232);
                if ($obj->{'termino'} == "Si")
                    $pdf->Cell(55,6,utf8_decode("Si"),1,1,'L');
                else
                    $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

            $pdf->Cell(135,6,utf8_decode('¿Complicaciones?'),1,0,'L',1);
                $pdf->SetFillColor(232,232,232);
                if ($obj->{'complicaciones'} == "Si")
                    $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'complicaciones_esp'}). "" ,1,1,'L');
                else
                    $pdf->Cell(55,6,utf8_decode("No"),1,1,'L');

            /*$pdf->Cell(135,6,utf8_decode('Tipo de parto:'),1,0,'L',1);
                $pdf->SetFillColor(232,232,232);
                $pdf->Cell(55,6,utf8_decode($obj->{'nat_o_ces'}),1,1,'L');*/

        }

        if ($row['f_nac'] < '2002-01-01'){
            $pdf->Cell(135,6,utf8_decode('¿Uso de anticonceptivos?'),1,0,'L',1);
            $pdf->SetFillColor(232,232,232);
            if ($obj->{'metodo_anticonceptivo'} == "Si")
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

        $obj = json_decode($AntecedentesPersonalesPatológicos);
        
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

        
            $pdf->Cell(135,6,utf8_decode('¿Sufre de intolerancia a la lactosa?'),1,0,'L',1);
            $pdf->SetFillColor(232,232,232);
            if ($obj->{'intolerancia'} == "S")
                $pdf->Cell(55,6,utf8_decode("Si, " .$obj->{'intolerancia'}),1,1,'L');
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
        $obj = json_decode($EvaluacionClinica);

        $pdf->Cell(135,6,utf8_decode('Variación de peso:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'var_peso'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Posible motivo:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'motivo'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Cabello:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'cabello'}),1,1,'L');
        
        $pdf->Cell(135,6,utf8_decode('Ojos:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'ojos'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Boca:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'boca'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Cuello:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'cuello'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Torax:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'torax'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Abdomen:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'abdomen'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Extremidades superiores:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'ext_sup'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Extremidades inferiores:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'ext_inf'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Piel:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'Piel'}),1,1,'L');

        $pdf->Cell(135,6,utf8_decode('Uñas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(55,6,utf8_decode($obj->{'unas'}),1,1,'L');

        

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("EVALUACIÓN DIETÉTICA"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $obj = json_decode($EvaluaciónDietética);

        $pdf->Cell(50,6,utf8_decode('Desayuno:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'desayuno'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Colación M:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'colacion_m'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Comida:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'comida'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Colación V:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'colacion_v'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Cena:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'cena'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Antojitos:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'antojos'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Calorías aprox:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'calorias'}),1,1,'L');

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("ALIMENTOS MÁS FRECUENTES"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(50,6,utf8_decode('Verduras:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_verduras'}. " - " .$obj->{'verduras'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Frutas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_frutas'}. " - " .$obj->{'frutas'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Azúcares:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_azucar'}. " - " .$obj->{'azucar'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Lrguminosas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_leguminosas'}. " - " .$obj->{'leguminosas'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('POA:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_POA'}. " - " .$obj->{'POA'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Cereales:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_cereales'}. " - " .$obj->{'cereales'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Grasas:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_grasas'}. " - " .$obj->{'grasas'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Leche:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_leche'}. " - " .$obj->{'leche'}),1,1,'L');

        $pdf->Cell(50,6,utf8_decode('Verduras:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(140,6,utf8_decode($obj->{'num_verduras'}. " - " .$obj->{'verduras'}),1,1,'L');

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("HORARIO HABITUAL"),0,1,'L');
        $pdf->Ln();
        
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('¿A qué hora te levantas?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'levantas'}),1,1,'L');

        $pdf->Cell(75,6,utf8_decode('¿A qué hora te duermes?'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'duermes'}),1,1,'L');

        $pdf->Cell(75,6,utf8_decode('Horario de trabajo o escuela:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'inicio_horario_trabajo'}. " - " .$obj->{'fin_horario_trabajo'}),1,1,'L');

        $pdf->Cell(75,6,utf8_decode('Horario de comida familiar:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'horario_comida'}),1,1,'L');

        $pdf->Cell(75,6,utf8_decode('Horario de hacer ejercicio:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'horario_ejercicio'}),1,1,'L');

        $pdf->Cell(75,6,utf8_decode('Transporte:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'transporte'}),1,1,'L');

        $pdf->Cell(75,6,utf8_decode('Apoyo:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'apoyo'}),1,1,'L');

        $pdf->Cell(75,6,utf8_decode('Vives:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'vives'}),1,1,'L');

        $pdf->Ln();
        $pdf->SetTextColor(21,70,97);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(106,5,utf8_decode("EVALUACION BIOMETRICA"),0,1,'L');
        $pdf->Ln();

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Arial','B',12);
        $obj = json_decode($EvaluaciónBiométrica);


        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('Fecha:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'fecha'}),1,1,'L');

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('Glucosa (mg/dl):'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'glucosa'}),1,1,'L');

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('Colesterol (mg/dl):'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'colesterol'}),1,1,'L');

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('TGL:'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'TGL'}),1,1,'L');

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('Hb (mg/dl):'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'Hto'}),1,1,'L');


        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('HDL (mg/dl):'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'HDL'}),1,1,'L');

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('LDL (mg/dl):'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'LDL'}),1,1,'L');

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('PA (mmHg):'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'PA'}),1,1,'L');

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(75,6,utf8_decode('Latidos (por min):'),1,0,'L',1);
        $pdf->SetFillColor(232,232,232);
        $pdf->Cell(115,6,utf8_decode($obj->{'latidos'}),1,1,'L');

        $pdf->AddPage(); 
    }
	
	$pdf->Output();
?>
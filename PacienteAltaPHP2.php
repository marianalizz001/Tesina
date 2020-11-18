<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];

    $referido = $_REQUEST['referido'];
    $ultima_consulta = $_REQUEST['ultima_consulta'];
    $mot_consulta = $_REQUEST['mot_consulta'];
    $nombre = $_REQUEST['nombre'];
    $apPat = $_REQUEST['apPat'];
    $apMat = $_REQUEST['apMat'];
    $telefono = $_REQUEST['telefono'];

    $consulta = $bd->Usuario->updateOne(
        ['_id' => new \MongoDB\BSON\ObjectID($idUsuario)],
        ['$set' => [
            'detalle_paciente' => [
                'referido' => $referido,
                'mot_consulta' => $mot_consulta,
                'ult_consulta' => $ultima_consulta,
                'contacto_emergencia' => [
                    'nombre' => $nombre,
                    'apPat' => $apPat,
                    'apMat' => $apMat,
                    'telefono' => $telefono
                ]
            ]
        ]],
    );

    if($consulta->getModifiedCount() > 0){
        header('location: PacienteAlta3.php?idUsuario='.$idUsuario.'');
    }else{
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    } 
   
?>
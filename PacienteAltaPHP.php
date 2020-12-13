<?php
    include("Conexion.php");
    $genero = $_REQUEST['genero'];
    $f_nac = $_REQUEST['f_nac'];
    $nombre = $_REQUEST['nombre'];
    $apPat = $_REQUEST['apPat'];
    $apMat = $_REQUEST['apMat'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $calle = $_REQUEST['calle'];
    $no_ext = $_REQUEST['no_ext'];
    $cp = $_REQUEST['cp'];
    $colonia = $_REQUEST['colonia'];
    
    $consulta = $bd->Paciente->insertOne(
        [
            'nombre' => $nombre,
            'apPat' => $apPat,
            'apMat' => $apMat,
            'genero' => $genero,
            'f_nac' => $f_nac,
            'correo' => $correo,
            'telefono' => $telefono,
            'direccion' => [
                'calle' => $calle,
                'no_ext' => $no_ext,
                'colonia' => $colonia,
                'cp' => $cp
            ]
        ]
    );
    
    if($consulta->getInsertedCount() > 0){
        header('location: PacienteAlta2.php?correo='.$correo.'');
    }else{
        echo $conexion -> error;
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    } 
?>
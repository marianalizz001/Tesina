<?php
    include("Conexion.php");
    $nombre_temp = $_FILES[ 'archivo' ][ 'name' ];
    $tmp = $_FILES[ 'archivo' ][ 'tmp_name' ];
    $tipoFile = $_FILES['archivo']['type'];
    $folder = 'Usuarios/Fotos';
    $nombre_foto = utf8_decode($nombre_temp);
    
    $tipo_usuario = 'P';
    $usuario = $_REQUEST['usuario'];
    $passwd = $_REQUEST['passwd'];
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
    $rfc = $_REQUEST['rfc'];

    if(($tipoFile == "image/jpg" || $tipoFile == "image/png" || $tipoFile == "image/gif" || $tipoFile == "image/jpeg")){ 
        if(move_uploaded_file($tmp,$folder.'/'.$nombre_foto))
            echo "Se ha grabado correctamente el archivo"; 
        else
            $nombre_foto = "";
    }
    
    $consulta = $bd->Usuario->insertOne(
        [
            'tipo_usuario' => $tipo_usuario,
            'usuario' => $usuario,
            'passwd' => md5($passwd),
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
                'cp' => $cp],
            'foto' => $nombre_foto,
            'rfc' => $rfc
        ]
    );
    
    if($consulta->getInsertedCount() > 0){
        header('location: PacienteAlta2.php?usuario='.$usuario.'');
    }else{
        echo $conexion -> error;
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    } 
?>
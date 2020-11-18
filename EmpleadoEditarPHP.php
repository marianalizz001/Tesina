<?php

    include("Conexion.php");
    $idUsuario = $_REQUEST['idUsuario'];
    echo $idUsuario;
    $nombre = $_REQUEST['nombre'];
    $apPat = $_REQUEST['apPat'];
    $apMat = $_REQUEST['apMat'];
    $usuario = $_REQUEST['usuario'];
    $passwd = $_REQUEST['passwd'];
    $genero = $_REQUEST['genero'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $f_nac = $_REQUEST['f_nac'];
    $calle = $_REQUEST['calle'];
    $no_ext = $_REQUEST['no_ext'];
    $no_int = $_REQUEST['no_int'];
    $cp = $_REQUEST['cp'];
    $colonia = $_REQUEST['colonia'];
    $rfc = $_REQUEST['rfc'];
    $salario = $_REQUEST['salario'];
    $localidad = $_REQUEST['localidad'];


    $nombre_archivo = $_FILES[ 'archivo' ][ 'name' ];
    $tmp = $_FILES[ 'archivo' ][ 'tmp_name' ];
    $tipoFile = $_FILES['archivo']['type'];
    $folder = 'Usuarios/Fotos';
    $nombre_foto = utf8_decode($nombre_archivo);



    $nombre_cv = $_FILES[ 'curriculum' ][ 'name' ];
    $tmp_cv = $_FILES[ 'curriculum' ][ 'tmp_name' ];
    $tipoFile_cv = $_FILES['curriculum']['type'];
    $folder_cv = 'Empleados/Curriculums';
    $nombre_cv = utf8_decode($nombre_cv);


    if($nombre_cv != ""){
        if ($tipoFile_cv == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $tipoFile_cv == "application/pdf"){
            if(move_uploaded_file($tmp_cv,$folder_cv.'/'.$nombre_cv)){
                echo "Se ha grabado correctamente el archivo"; 
                $consulta= $conexion->prepare("UPDATE vista_usuario SET curriculum=? WHERE idUsuario=?");
                $consulta->bind_param('si', $nombre_cv, $idUsuario);
                if($consulta->execute()){
                        echo "si";
                }else{
                    echo "ERROOOOOOOOOOOOOOOR!";
                    echo $conexion -> error;
                }
            }else
                $nombre_cv = "";
        }
    }
    if ($nombre_foto != ""){

        if(($tipoFile == "image/jpg" || $tipoFile == "image/png" || $tipoFile == "image/gif" || $tipoFile == "image/jpeg")){ 
            if(move_uploaded_file($tmp,$folder.'/'.$nombre_foto)){
                echo "Se ha grabado correctamente el archivo"; 
                $consulta= $conexion->prepare("UPDATE vista_usuario SET foto=? WHERE idUsuario=?");
                $consulta->bind_param('si', $nombre_foto, $idUsuario);
                if($consulta->execute()){
                        echo "si";
                }else{
                    echo "ERROOOOOOOOOOOOOOOR!";
                    echo $conexion -> error;
                }
            }else
                $nombre_foto = "";
        }
    }

 	$consulta= $conexion->prepare("UPDATE vista_usuario SET nombre=?, apPat=?, apMat=?, usuario=?, passwd=?, genero=?, 
     correo=?, telefono=?, f_nac=?, calle=?, no_ext=?, no_int=?,cp=?, colonia=?, rfc=?, salario=?, localidades_idlocalidades=? WHERE idUsuario=?");
    $consulta->bind_param('sssssssssssssssssi', $nombre, $apPat, $apMat,$usuario, $passwd, $genero, $correo, $telefono,
                $f_nac, $calle, $no_ext, $no_int, $cp, $colonia, $rfc, $salario, $localidad, $idUsuario);

 	if($consulta->execute()){
			header('location: EmpleadoVer.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }
?>



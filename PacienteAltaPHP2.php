<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];
    $correo = $_REQUEST['correo'];    

    unset($_POST['btnEnviar']);
    unset($_POST['idUsuario']);
    unset($_POST['correo']);

    $var_json = json_encode($_POST);

    $consulta = $bd->Paciente->updateOne(
        ['_id' => new \MongoDB\BSON\ObjectID($idUsuario)],
        ['$set' => ['HistorialClinico.AntecedentesHeredoFamiliares' => $var_json]]
    );

    $cursor = $bd->Paciente->find();

        foreach ($cursor as $usuario) {
            if ($usuario['correo'] ==  $correo){
                
                $nombre = $usuario['nombre'] . " " . $usuario['apPat'] . " " . $usuario['apMat'];
                echo $nombre;
                $Citas = $bd->Cita->updateOne(
                    ['nombre' => $nombre],
                    ['$set' => ['Usuario_idUsuario' => new \MongoDB\BSON\ObjectID($idUsuario)]]
                );
                header('location: PacienteAlta3.php?idUsuario='.$idUsuario.'');
            }else {
                echo "<script language=JavaScript>alert('Hubo un error');</script>";
            }
        }

    
    
?>
<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];

    unset($_POST['btnEnviar']);
    unset($_POST['idUsuario']);
    $titulo->parte = "Antecedentes Heredo Familiares";
    $var_json = json_encode($_POST);

    $consulta = $bd->Paciente->updateOne(
        ['_id' => new \MongoDB\BSON\ObjectID($idUsuario)],
        ['$set' => ['HistorialClinico' => ['AntecedentesHeredoFamiliares' => $var_json]]]
    );

    if ($consulta->getModifiedCount() > 0) {
        header('location: PacienteAlta3.php?idUsuario='.$idUsuario.'');
    } else {
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    }
?>
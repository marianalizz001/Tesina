<?php
    include("Conexion.php");
    
    $idUsuario = $_REQUEST['idUsuario'];

    unset($_POST['btnEnviar']);
    unset($_POST['idUsuario']);
    $var_json = json_encode($_POST);

    $consulta = $bd->Usuario->updateOne(
        ['_id' => new \MongoDB\BSON\ObjectID($idUsuario)],
        ['$set' => ['AntecedentesPersonalesPatológicos' => $var_json]]
    );

    if ($consulta->getModifiedCount() > 0) {
        header('location: PacienteAlta6.php?idUsuario='.$idUsuario.'');
    } else {
        echo "<script language=JavaScript>alert('Hubo un error');</script>";

    }
?>
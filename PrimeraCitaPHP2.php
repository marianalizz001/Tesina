<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    include("Conexion.php");
    
    $idUsuario = $_POST['idUsuario'];
    $idCita = $_POST['idCita'];

    unset($_POST['btnEnviar']);
    unset($_POST['idUsuario']);
    $var_json = json_encode($_POST);

    $consulta = $bd->Cita->updateOne(
        ['_id' => new \MongoDB\BSON\ObjectID($idCita)],
        ['$set' => ['seguimiento.Valores' => $var_json]]
    );

    if ($consulta->getModifiedCount() > 0) {
        header('location: PrimeraCita3.php?idCita='.$idCita.'');
    } else {
        echo "<script language=JavaScript>alert('Hubo un error');</script>";
    }
?>
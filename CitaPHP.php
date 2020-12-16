<?php
session_start();
include ('Conexion.php');

$id = $_GET['id'];

$consulta = $bd->Cita->find(['_id' => new \MongoDB\BSON\ObjectID($id)]);
foreach ($consulta as $act){
    $id = $act['_id'];
    $title = $act['title'];
    echo $title;
    
    if ($title == "Primera Cita"){
        header('Location: PrimeraCita.php?'.$id);    
    }else{
        header('Location: Cita.php?'.$id);    
    }
}
?>
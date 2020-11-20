<?php
     require_once __DIR__ . "/vendor/autoload.php";

     $conexion = new MongoDB\Client('mongodb+srv://Karen:Aloha98@cluster0-rzcxc.mongodb.net/Nutricion?retryWrites=true&w=majority');
     $bd = $conexion->selectDatabase('Nutricion');
?>
<?php
/*
     require_once __DIR__ . "/vendor/autoload.php";
     $conexion = new MongoDB\Client('mongodb://localhost:27020');

     $bd = $conexion->selectDatabase('Consultorio');
     */
?>
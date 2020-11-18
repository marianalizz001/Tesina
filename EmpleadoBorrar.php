<?php
    $idUsuario = $_GET['idUsuario'];
    include('Conexion.php');

    $fecha = date("Y-m-d");

    $consulta= $conexion->prepare("UPDATE vista_usuario SET f_baja=? WHERE idUsuario=?");
    $consulta->bind_param('ss', $fecha, $idUsuario);

 	if($consulta->execute()){
			header('location: EmpleadoVer.php');
 	}else{
		echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }

?>
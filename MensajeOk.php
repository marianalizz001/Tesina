<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    session_start(); 
    include("Conexion.php");
    $id_usuario = $_SESSION['id'];

    $id_mensaje = $_GET['id_mensaje'];

    $time = time();
    $fecha = date('Y-m-d', $time);
    
    $cursor = $bd->Mensaje->updateOne(
        [ '_id' => new \MongoDB\BSON\ObjectID($id_mensaje)],
        [ '$set' => [ 
            'visto' => '1',
            'f_respuesta' => $fecha,
            'usuario_id_usuario' => $id_usuario
        ]]
    );

    $cant =  $cursor->getModifiedCount();
    if ($cant > 0){
        header('location: mensajes.php');
    }else{
        ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "No se ha podido cambiar estatus",   
                        type: "error",    
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Intentar de nuevo",   
                        closeOnConfirm: false}, 
    
                        function(isConfirm){   
                            if (isConfirm) {     
                                window.location.href = "mensajes.php";
                            }
                        });
                });
                </script>
        <?php
    }

    
    /*
    $consulta =  $conexion->prepare("UPDATE mensaje SET visto='1', f_respuesta= '$fecha', usuario_id_usuario='$id_usuario' WHERE id_mensaje=?");
    $consulta->bind_param("i", $id_mensaje);
                      
    if($consulta->execute()){
        header('location: mensajes.php');
    }else{
    
        echo "ERROOOOOOOOOOOOOOOR!";
        echo $conexion -> error;
    }*/

?>

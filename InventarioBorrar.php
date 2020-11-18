<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
    session_start();
    include('Conexion.php');

    $idUsuario= $_SESSION['id'];
    $idProducto = $_REQUEST['idProducto'];
    $consulta= $bd->Producto->updateOne(
        ['_id'=> new \MongoDB\BSON\ObjectID($idProducto)],
        ['$set' => ['activo'=> '0']]
    );
    /*$consulta = $bd->Producto->deleteOne(
        ['_id' => new \MongoDB\BSON\ObjectID($idProducto)]
    );
    */

    if($consulta->getModifiedCount() != 0){
    //if($consulta->getDeletedCount() != 0){
        $consulta2 = $bd->Historial_inventario->insertOne(
            [
                'tipo' => 'B',
                'Usuario_idUsuario' => $idUsuario,
                'fecha_modificacion' => date('c'),
                'producto_idProducto' => new \MongoDB\BSON\ObjectID($idProducto)
            ]
        );
        if($consulta2->getInsertedCount()>0){
            ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Bien!",   
                        text: "Se han guardado los datos",   
                        type: "success",    
                        confirmButtonColor: "#696565",   
                        confirmButtonText: "Ok",   
                        closeOnConfirm: false}, 

                        function(isConfirm){   
                            if (isConfirm) {     
                                window.location.href = "InventarioVer.php";
                            }
                        });
                });
                </script>
            <?php 
        }else{
            echo "No se inserto en el historial";
        }
 	}else{	
        ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "No se han actualizado los datos",   
                        type: "error",    
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Intentar de nuevo",   
                        closeOnConfirm: false}, 
    
                        function(isConfirm){   
                            if (isConfirm) {     
                                window.location.href = "javascript:window.history.back()";
                            }
                        });
                });
                </script>
            <?php
 	}

?>
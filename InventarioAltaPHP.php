<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    session_start();
    include('Conexion.php');

    $nombre = $_REQUEST['nombre-producto'];
    $precio = $_REQUEST['precio'];
    $existencia = $_REQUEST['existencia'];
    $idUsuario = $_SESSION['id']; 
    $fecha = date('c'); 
    $activo = '1';
     
    $consulta = $bd->Producto->insertOne(
        [
            'nombre' => $nombre,
            'precio' => $precio,
            'existencia' => $existencia,
            'Usuario_idUsuario' => $idUsuario,
            'fecha' => $fecha,
            'activo' => $activo

        ]
    );
    
 	if($consulta->getInsertedCount()>0){
        $cons = $bd->Producto->find([
            'nombre' => $nombre,
            'fecha' => $fecha
        ]);

        foreach($cons as $act){
            {
                $id_producto = $act['_id'];
            }
        }
        $consulta2 = $bd->Historial_inventario->insertOne(
            [
                'tipo' => 'A',
                'Usuario_idUsuario' => $idUsuario,
                'fecha_modificacion' => $fecha,
                'producto_idProducto' => $id_producto,
                'existencia_nueva'=>$existencia,
                'precio_nuevo' => $precio
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
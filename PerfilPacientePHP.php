<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    include("Conexion.php");
    $idUsuario = $_REQUEST['idUsuario'];
    $telefono = $_REQUEST['telefono'];
    $calle = $_REQUEST['calle'];
    $no_ext = $_REQUEST['no_ext'];
    $cp = $_REQUEST['cp'];
    $colonia = $_REQUEST['colonia'];

    $consulta2 = $bd->Paciente->updateOne(
        ['_id' => new \MongoDB\BSON\ObjectID($idUsuario)],
        ['$set' => [
            'telefono' => $telefono,
            'direccion.calle' => $calle,
            'direccion.no_ext' => $no_ext,
            'direccion.colonia' => $colonia,
            'direccion.cp' => $cp
        ]],
    );

 	if($consulta2->getModifiedCount() > 0){
        ?>
            <script>
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se han actualizado los datos",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "javascript:window.history.back()";
                        }
                    });
            });
            </script>
            <?php
 	}else{
		?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Atención!",   
                        text: "Ningún dato se ha modificado",   
                        type: "warning",    
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Aceptar",   
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


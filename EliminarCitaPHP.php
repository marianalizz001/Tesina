<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    session_start();
    include ('Conexion.php');

	$idCita= $_REQUEST['id'];

        $consulta = $bd->Cita->deleteOne(
            ['_id' => new \MongoDB\BSON\ObjectID($idCita)]
        );    
		if($consulta->getDeletedCount() > 0){
			?>
            <script>
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se ha eliminado la cita",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "EditarCita.php";
                        }
                    });
            });
            </script>
        <?php 
		} else{
            ?>
            <script>
			jQuery(function() {
                swal({   
                    title: "¡Error!",   
                    text: "No se pudo eliminar la cita",   
                    type: "error",    
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Intentar de nuevo",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "EditarCita.php";
                        }
                    });
            });
            </script>
            <?php 
		}
       

?>

 	
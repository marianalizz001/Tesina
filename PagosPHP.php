<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    include('Conexion.php');
    $idCita=$_POST['idCita'];
    $idUsuario=$_POST['idUsuario'];
    $monto=$_REQUEST['monto'];
    $fecha=date('d-m-Y H:i:s');

 	//$consulta= $conexion->prepare("insert into pagos(cita_idCita,usuario_idUsuario,fecha,monto) values ($idCita,$idUsuario,now(),$monto)");
     $consulta = $bd->Pagos->insertOne(
        [
            'Cita_idCita' => $idCita,
            'Usuario_idUsuario' => $idUsuario,
            'fecha' => $fecha,
            'monto' => $monto
        ]
    );
 	if($consulta->getInsertedCount() > 0){
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
                            window.location.href = "PacienteVer.php";
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
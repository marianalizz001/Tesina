<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    include('Conexion.php');
    $nombre = $_REQUEST['nombre'];
        
    $instruccion = ("ALTER TABLE usuario DROP $nombre");
    
    $consulta = $conexion->prepare($instruccion);
    if($consulta->execute()){
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
                            window.location.href = "AtributoEliminar.php";
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
                text: "No se ha guardado la información",   
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

<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    include("Conexion.php");
    
    $idUsuario = $_POST['idUsuario'];
    $idCita = $_POST['idCita'];

    unset($_POST['btnEnviar']);
    unset($_POST['idUsuario']);
    $var_json = json_encode($_POST);

    $sql = "UPDATE cita SET odontograma = '$var_json' WHERE id = $idCita";

    if (mysqli_query($conexion, $sql)) {
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
    } else {
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
                         window.location.href = "PacienteAlta.php";
                    }
                });
         });
        </script>
     <?php
    }

    mysqli_close($conexion);
?>
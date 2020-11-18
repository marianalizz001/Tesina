<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
        include('Conexion.php');
        if(isset($_REQUEST['usuario'])){
            $user = $_REQUEST['usuario'];
            $clave = md5($_REQUEST['clave']);
            
            $cursor = $bd->Usuario->find();

            foreach ($cursor as $usuario) {
                if ($usuario['usuario'] ==  $user and $usuario['passwd'] == $clave){
                    session_start();
                    $_SESSION['id']= $usuario['_id'];
                    $_SESSION['usuario']= $usuario['usuario'];
                    $_SESSION['tipo']= $usuario['tipo_usuario'];
                    $_SESSION['nombre']= $usuario['nombre']; 
                    $_SESSION['apPat']= $usuario['apPat'];
                    $_SESSION['apMat']= $usuario['apMat'];
                    $_SESSION['log'] = true;
                    $_SESSION['genero'] = $usuario['genero'];
                    $_SESSION['f_nac'] = $usuario['f_nac'];
                    $_SESSION['correo'] = $usuario['correo'];
                    $_SESSION['telefono'] = $usuario['telefono'];
                    # $_SESSION['foto'] = $usuario['foto'];
                    $_SESSION['especialidad'] = $usuario['especialidad'];
                    $_SESSION['cedula'] = $usuario['cedula'];
                    $_SESSION['foto'] = "Usuarios/Fotos/".$usuario['foto'];
                    $_SESSION['curriculum'] = "Empleados/Curriculums/".$usuario['curriculum'];
                    echo "Si entre";
                    header('location: Inicio.php'); 

                }else{
                    ?>
                        <script>
                        jQuery(function() {
                            swal({   
                                title: "¡Error!",   
                                text: "Los datos son incorrectos",   
                                type: "error",    
                                confirmButtonColor: "#DD6B55",   
                                confirmButtonText: "Intentar de nuevo",   
                                closeOnConfirm: false}, 

                                function(isConfirm){   
                                    if (isConfirm) {     
                                        window.location.href = "login.php";
                                    }
                                });
                        });
                        </script>
                    <?php
                }
            };

            
        }
?>
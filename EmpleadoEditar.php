<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Anton|Dosis:400,800" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/style.css">
     
    <title>Dra.YazminNajera | Perfil</title>

    <?php include("navbar.php"); ?>
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
        });
    </script>

  </head>

<body>
    <br>
    <?php
    include('Conexion.php');
    $temp = $_GET['idUsuario'];

    $instruccion = $bd->Usuario->find(
        [
            '_id' => new \MongoDB\BSON\ObjectID($temp)
        ]
    );
    
   foreach ($instruccion as $act){
        $idUsuario = $act['_id'];
        $tipo = $act['tipo_usuario'];
        $usuario = $act['usuario'];
        $nombre = $act['nombre'];
        $apPat = $act['apPat'];
        $apMat = $act['apMat'];
        $genero = $act['genero'];
        $f_nac = $act['f_nac'];
        $correo = $act['correo'];
        $telefono = $act['telefono'];
        
        $domicilio = $act['direccion'];
        $calle = $domicilio->calle;
        $no_ext = $domicilio->no_ext;
        $colonia = $domicilio->colonia;
        $cp = $domicilio->cp;

        $foto = "Usuarios/Fotos/".$act['foto'];
        $rfc = $act['rfc'];
        $salario = $act['salario'];
        $curriculum = "Empleados/Curriculums/".$act['curriculum'];
?>  

<div class style="padding-left: 100px; padding-right: 200px;"> 
    <div class="row">
    <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="CambiarPasswd.php" method="post">
                    <div class="form-group">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Nueva Contraseña: </p>
                        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                        <input type="password" class="form-control"  name="passwd" required>
                    </div>     
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input  class = "btn btn-success" type="submit" value="Aceptar" name = "btnEnviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
     </div>

    <div class="card mb-3 mx-auto" style="max-width: 80%;">
    <div class="row no-gutters">
        <div class="col-md-4">
        <form action="PerfilUsuarioPHP.php" method="post" enctype="multipart/form-data">
            <?php
                if ($foto == "Usuarios/Fotos/")
                    echo '<img src="img/perfil.png" class="card-img" alt="...">';
                else
                    echo '<img src='.$foto.' class="card-img" alt="...">'; 
            ?>
            <input type="file" class="form-control" id="foto" name="archivo">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <strong><h2 class="card-title"><?php echo $nombre. " ". $apPat. " ". $apMat;?></h2></strong>
            <p class="card-text">

                <small>Usuario: </small> <strong><?php echo $nombre; ?> </strong> <br>
                <small>Fecha de nacimiento: </small> <strong><?php echo $f_nac; ?> </strong> <br>
                <small>Género: </small> <strong> <?php  if ($genero == 'F') echo 'Femenino'; else echo 'Masculino';?> </strong><br>
                <small>RFC: </small> <strong><?php echo $rfc; ?> </strong> <br>
                <small>Salario: </small> <strong><?php echo $salario; ?> </strong> <br>
                <small>Curriculum: </small>
                    <?php
                        if ($curriculum == "Empleados/Curriculums/")
                            echo 'No hay archivo<br>';
                        else
                            echo '<a href='.$curriculum.' target="_blank">Descargar</a><br>';
                    ?>
                <?php } ?>

            </p>

                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Correo: </p>
                        <input type="email" class="form-control" id="correo" name="correo" required value="<?php echo $correo;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Teléfono: </p>
                        <input type="tel" pattern="[0-9]{10}" class="form-control" id="telefono" name="telefono" required value="<?php echo $telefono;?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-sm-6 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Fraccionamiento: </p>
                        <input type="text" class="form-control" id="colonia" name="colonia" required value="<?php echo $colonia;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Calle: </p>
                        <input type="text" class="form-control" id="calle" name="calle" required value="<?php echo $calle;?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">No. ext: </p>
                        <input type="text" class="form-control" id="no_ext" name="no_ext" required value="<?php echo $no_ext;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Cp: </p>
                        <input type="number" class="form-control" id="cp" name="cp" required value="<?php echo $cp;?>">
                    </div>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-warning"  id="myBtn">Cambiar contraseña</button>
                    <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar">
                </div>
            </form>

        </div>
        </div>
        </div>
        </div>
                           
    <script src="js/jquery.slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
<?php include("footer.php"); ?>

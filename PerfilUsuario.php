<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="img/favicon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Anton|Dosis:400,800" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />

<link rel="stylesheet" href="css/style.css">

<title>NutriciónVida</title>

<br>
<?php
    include ('Conexion.php');
?>
</head>

<body>
<?php include("navbar.php"); ?>

<br><br>

    <br>
    <?php
    $temp = $_SESSION['id'];
    $cursor = $bd->Usuario->find(['_id' => $temp]);

    foreach ($cursor as $datos) {
      $idUsuario = $datos['_id'];
      $tipo = $datos['tipo_usuario'];
      $usuario = $datos['usuario'];
      $contraseña = $datos['passwd'];
      $nombre = $datos['nombre'];
      $apPat = $datos['apPat'];
      $apMat = $datos['apMat'];
      $genero = $datos['genero'];
      $f_nac = $datos['f_nac'];
      $correo = $datos['correo'];
      $telefono = $datos['telefono'];

      $domicilio = $datos['direccion'];
      $calle = $domicilio->calle;
      $no_ext = $domicilio->no_ext;
      $colonia = $domicilio->colonia;
      $cp = $domicilio->cp;

      $foto = "Usuarios/Fotos/".$datos['foto'];

      $rfc = $datos['rfc']; 
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
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Contraseña Actual: </p>
                        <input type="hidden" name="contraseña" value="<?php echo $contraseña; ?>">
                        <input type="password" class="form-control"  name="passwd_antigua" required>
                    </div>

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
                <small>Usuario: </small> <strong><?php echo $usuario; ?> </strong> <br>
                <small>Fecha de nacimiento: </small> <strong><?php echo $f_nac; ?> </strong> <br>
                <small>Género: </small> <strong> <?php  if ($genero == 'F') echo 'Femenino'; else echo 'Masculino';?> </strong><br>
            </p>

                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(220,86,72);">Correo: </p>
                        <input type="email" class="form-control" id="correo" name="correo" required value="<?php echo $correo;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(220,86,72);">Teléfono: </p>
                        <input type="number" class="form-control" id="telefono" name="telefono" required value="<?php echo $telefono;?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    
                    <div class="form-group col-sm-6 col-md-6">
                        <p style="font-size:20px;color: rgba(220,86,72);">Fraccionamiento: </p>
                        <input type="text" class="form-control" id="colonia" name="colonia" required value="<?php echo $colonia;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(220,86,72);">Calle: </p>
                        <input type="text" class="form-control" id="calle" name="calle" required value="<?php echo $calle;?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(220,86,72);">No. ext: </p>
                        <input type="text" class="form-control" id="no_ext" name="no_ext" required value="<?php echo $no_ext;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(220,86,72);">Cp: </p>
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
        <?php } ?>
    <script src="js/jquery.slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
<script type="text/javascript">
      $(document).ready(function(){
      $("#myBtn").click(function(){
          $("#myModal").modal();
      });
      });
  </script>
</html>
<?php include("footer.php"); ?>

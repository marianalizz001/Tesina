
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
     
    <title>Dra.YazminNajera | Home</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
<br><br><br>
<?php
  $temp = $_SESSION['id'];
  $cursor = $bd->Usuario->find(['_id' => $temp]);
  foreach ($cursor as $usuario) {
    $idUsuario = $usuario['_id'];
    $correo = $usuario['correo'];
    $telefono = $usuario['telefono'];
    $foto = $usuario['foto'];
    $foto = "Usuarios/Fotos/".$usuario['foto'];

?>
<section id="login" class="mb-3 mt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 mx-auto">
          <div class="card mb-3" style="max-width: 840px;" id="div-general">
            <div class="row no-gutters">
              <div class="col-md-4">
              <?php
                if ($foto == "Usuarios/Fotos/")
                  echo '<img src="img/perfil.png" class="card-img" alt="...">';
                else
                  echo '<img src='.$foto.' class="card-img" alt="...">';
              ?>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <?php if ($_SESSION['genero'] == 'F'){?>
                     <h3 class="card-title">¡Bienvenida <strong><?php echo $_SESSION['nombre']; ?></strong>!</h3><br>
                  <?php } ?>

                  <?php if ($_SESSION['genero'] == 'M'){?>
                     <h3 class="card-title">¡Bienvenido <strong><?php echo $_SESSION['nombre']; ?></strong>!</h3><br>
                  <?php } ?>
                  <p class="card-text">
                    <i class="far fa-user" id="icon"></i> Nombre: <?php echo ($_SESSION['nombre']) . " " . ($_SESSION['apPat']) . " " . ($_SESSION['apMat']) ;?><br><br>
                    <i class="fas fa-mobile-alt" id="icon"></i> Teléfono: <?php echo ($telefono);?> <br><br>
                    <i class="far fa-envelope" id="icon"></i> Correo: <?php echo $correo; ?><br><br>
                  </p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
</section>
<br><br>
</body>
  
</html>
<?php } include("footer.php"); ?>

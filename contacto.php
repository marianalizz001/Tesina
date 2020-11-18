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
    <link href="css/sweetalert.css" rel="stylesheet">


    <title>Dra.YazminNajera | Contacto</title>

    <?php include("navbar.php"); ?>
    <br>

</head>

<body>
<div class="container" id="registro">
  <div class="row">
    <div class="col-12" id="barra_servicio">
        <A class="h2 align-middle text-center" name="servicios" id="servicio">Queremos ayudarle, contacte con nosotros</A>
    </div>
  </div>
  <div class="container-fluid">
    <br><br>
    <form action="contactoPHP.php" method="post">
    <p class="h4"> Déjenos sus datos </p><br>
      <div class="row">
        <div class="col-sm-6 col-md-2">
          <label for="nombre" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre: </label>
        </div>
        <div class="col-sm-6 col-md-2">
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="col-sm-6 col-md-2">
          <label for="apPat" style="font-size:20px;color: rgba(144, 12, 52);"> Apellido Paterno: </label>
        </div>
        <div class="col-sm-6 col-md-2">
          <input type="text" class="form-control" id="apPat" name="apPat" required>
        </div>

        <div class="col-sm-6 col-md-2">
          <label for="apMat" style="font-size:20px;color: rgba(144, 12, 52);"> Apellido Materno: </label>
        </div>
        <div class="col-sm-6 col-md-2">
          <input type="text" class="form-control" id="apMat" name="apMat">
        </div>
      </div>

      <div class="row" style="padding-top:20px;">
        <div class="col-sm-6 col-md-2">
          <label for="correo" style="font-size:20px;color: rgba(144, 12, 52);"> Correo: </label>
        </div>
        <div class="col-sm-12 col-md-5">
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="col-sm-6 col-md-2">
          <label for="telefono" style="font-size:20px;color: rgba(144, 12, 52);"> Teléfono: </label>
        </div>
        <div class="col-sm-12 col-md-3">
        <input type="tel" pattern="[0-9]{10}" class="form-control" id="telefono" name="telefono" required>
        </div>
      </div>
      <br><br>
      <p class="h4"> ¿En qué podemos ayudarle? </p><br>
      <div class="row" style="padding-top:10px;">
      
      <div class="col-sm-6 col-md-2">
          <label for="mensaje" style="font-size:20px;color: rgba(144, 12, 52);"> Mensaje: </label>
      </div>
        <div class="col-sm-12 col-md-10">
          <textarea class="form-control" name="mensaje" required rows="4" style="resize: none;" ></textarea>
        </div>
      </div>
        <br><br>

      <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar" style="padding-bottom:15px;">

    </form>
</div>
    <br><br>
</div>

</div>
    
</body>
</html>
<?php include("footer.php"); ?>

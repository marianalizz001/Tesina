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
     
    <title>Dra.YazminNajera | Atributo</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
<br><br>
<div class="container">
    <form action="AtributoAgregarPHP.php" method="post" enctype="multipart/form-data">
        <p class="h4"> Agregar Atributo</p><br><br>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-4">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre: </label>
                <input type="text" class="form-control" id="usuario" name="nombre" required>
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="tipo" style="font-size:20px;color: rgba(144, 12, 52);"> Valor permitido: </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" id="tipo" value="int" checked>
                    <label class="form-check-label" for="exampleRadios1"> Número </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" id="tipo" value="varchar(500)">
                    <label class="form-check-label" for="exampleRadios2">Texto</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" id="tipo" value="date">
                    <label class="form-check-label" for="exampleRadios3">Fecha</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo" id="tipo" value="blob">
                    <label class="form-check-label" for="exampleRadios4">Archivo</label>
                </div>
            </div>

        </div>
        <br>
        <div class="text-center">
            <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar">
        </div>
        <br><br><br><br><br><br><br><br>
    </form>
</div>

</body>
  
</html>
<?php include("footer.php"); ?>


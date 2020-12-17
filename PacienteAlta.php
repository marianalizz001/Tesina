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
     
    <title>Dra.YazminNajera | Paciente</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PacienteAltaPHP.php" method="post" enctype="multipart/form-data">
        <p class="h4"> Nuevo Paciente - <small>Datos Personales</small></p>
        <hr>
        
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-4">
                <label for="genero" style="font-size:20px;color: rgba(152, 37, 6);"> Género: </label><br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="genero" value="F">
                    <label class="form-check-label" for="exampleRadios1"> Femenino </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="genero" id="genero" value="M">
                    <label class="form-check-label" for="exampleRadios2">Masculino</label>
                </div>
            </div>

        </div>

        <div class="form-row mt-2">
            <div class="form-group col-sm-6 col-md-4">
                <label for="nombre" style="font-size:20px;color: rgba(152, 37, 6);"> Nombre(s): </label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="apPat" style="font-size:20px;color: rgba(152, 37, 6);"> Apellido Paterno: </label>
                <input type="text" class="form-control" id="apPat" name="apPat" required>
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="apMat" style="font-size:20px;color: rgba(152, 37, 6);"> Apellido Materno: </label>
                <input type="text" class="form-control" id="apMat" name="apMat">
            </div>

        </div>
        
        <div class="form-row mt-3">
            <div class="form-group col-sm-12 col-md-4">
                <label for="correo" style="font-size:20px;color: rgba(152, 37, 6);"> Correo: </label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="telefono" style="font-size:20px;color: rgba(152, 37, 6);"> Teléfono: </label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" id="telefono" name="telefono" required>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="f_nac" style="font-size:20px;color: rgba(152, 37, 6);"> Fecha Nacimiento: </label>
                <input type="date" class="form-control" id="f_nac" name="f_nac"  min="1930-01-01" max="2018-01-01" required>
            </div>
        </div>
        <p class="h4"> Nuevo Paciente - <small>Dirección</small></p>
        <hr>
        <div class="form-row mt-3">
            <div class="form-group col-sm-6 col-md-4">
                <label for="fraccionamiento" style="font-size:20px;color: rgba(152, 37, 6);"> Fraccionamiento: </label>
                <input type="text" class="form-control" id="colonia" name="colonia" required>
            </div>

            <div class="form-group col-sm-12 col-md-4">
                <label for="calle" style="font-size:20px;color: rgba(152, 37, 6);"> Calle: </label>
                <input type="text" class="form-control" id="calle" name="calle" required>
            </div>

            <div class="form-group col-sm-12 col-md-2">
                <label for="no_ext" style="font-size:20px;color: rgba(152, 37, 6);"> No.Ext: </label>
                <input type="text" class="form-control" id="no_ext" name="no_ext" required>
            </div>

            <div class="form-group col-sm-12 col-md-2">
                <label for="cp" style="font-size:20px;color: rgba(152, 37, 6);"> Cp: </label>
                <input type="number" class="form-control" id="cp" name="cp" required>
            </div>
        </div>

        <br>
        <div class="text-center">
            <input  class = "btn btn-success" type="submit" value="Siguiente" name = "btnEnviar">
        </div>
        <br>
    </form>
</div>
</body>
</html>
<?php include("footer.php"); ?>


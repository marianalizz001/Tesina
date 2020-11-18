

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
    <form action="PacienteAltaPHP8.php" method="post" enctype="multipart/form-data">
    <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Conclusión Diagnóstica</small></p>
        <hr>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-3">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Estado de salud general: </label>
                <select id="condicion" class="form-control" name="salud" required>
                        <option selected></option>
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                    </select>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Conductual: </label>
                <select id="condicion" class="form-control" name="conducta" required>
                        <option selected></option>
                        <option value="Bueno">Bueno</option>
                        <option value="Regular">Regular</option>
                        <option value="Malo">Malo</option>
                    </select>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> Enfermedad actual: </label>
                <input type="text" class="form-control" id="mot_consulta" name="enfermedad_actual">
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> Pronóstico: </label>
                <select id="condicion" class="form-control" name="pronostico" required>
                        <option selected></option>
                        <option value="Favorable">Favorable</option>
                        <option value="Desfavorable">Desfavorable</option>
                        <option value="Reservado">Reservado</option>
                </select>
            </div>

        </div>
       
<br>
        <div class="col-12 text-center">
            <input  class = "btn btn-success" type="submit" value="Siguiente" name = "btnEnviar">
        </div>
        <br>
    </form>
</div>
</body>
</html>
<?php include("footer.php"); ?>


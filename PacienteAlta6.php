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
    <form action="PacienteAltaPHP6.php" method="post" enctype="multipart/form-data">
        <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Exploración Física</small></p>
        <hr>
        
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Tipo de dentición: </label>
                <select id="condicion" class="form-control" name="denticion" required>
                        <option selected></option>
                        <option value="Temporal">Temporal</option>
                        <option value="Mixta">Mixta</option>
                        <option value="Permanente">Permanente</option>
                    </select>
            </div>

            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Clasificación de angle: </label>
                <select id="condicion" class="form-control" name="angle" required>
                        <option selected></option>
                        <option value="Clase I">Clase I</option>
                        <option value="Clase II">Clase II</option>
                        <option value="Clase III">Clase III</option>
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


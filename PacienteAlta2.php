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
    <?php
        $user = $_REQUEST['usuario'];

        $cursor = $bd->Usuario->find();

        foreach ($cursor as $usuario) {
            if ($usuario['usuario'] ==  $user){
                $idUsuario = $usuario['_id'];
            }
        }
    ?>

    <div class="container">
    <form action="PacienteAltaPHP2.php" method="post" enctype="multipart/form-data">
        <p class="h4"> Nuevo Paciente - <small>Datos Personales</small></p>
        <hr>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-8">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Referido por: </label>
                <input type="text" class="form-control" id="referido" name="referido">
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Última consulta dental: </label>
                <input type="date" class="form-control" id="ultima_consulta" name="ultima_consulta" min="1930-01-01" max="2020-07-03"required>
            </div>

            <div class="form-group col-sm-6 col-md-12">
                <label for="passwd" style="font-size:20px;color: rgba(144, 12, 52);"> Motivo de consulta: </label>
                <input type="text" class="form-control" id="mot_consulta" name="mot_consulta" required>
            </div>

        </div>

        <div class="form-row mt-2">
        <div class="col-12"><p class="h4"><small> Contacto de Emergencia </small></h4><br></div>
            <div class="form-group col-sm-6 col-md-3 mt-2">
                <label for="nombre" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre: </label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group col-sm-6 col-md-3 mt-2">
                <label for="apPat" style="font-size:20px;color: rgba(144, 12, 52);"> Apellido Paterno: </label>
                <input type="text" class="form-control" id="apPat" name="apPat" required>
            </div>

            <div class="form-group col-sm-6 col-md-3 mt-2">
                <label for="apMat" style="font-size:20px;color: rgba(144, 12, 52);"> Apellido Materno: </label>
                <input type="text" class="form-control" id="apMat" name="apMat">
            </div>

            <div class="form-group col-sm-12 col-md-3 mt-2">
                <label for="telefono" style="font-size:20px;color: rgba(144, 12, 52);"> Teléfono: </label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" id="telefono" name="telefono" required>
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


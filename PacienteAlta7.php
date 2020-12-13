

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
    <form action="PacienteAltaPHP7.php" method="post" enctype="multipart/form-data">
    <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Evaluación Biometrica</small></p>
        <hr>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-3">
                <label for="fecha" style="font-size:20px;color: rgba(144, 12, 52);"> Fecha: </label>
                <input type="datetime" class="form-control" name="fecha"  value="<?php date_default_timezone_set('America/Mexico_City'); echo date("d-m-Y");?>" readonly>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="glucosa" style="font-size:20px;color: rgba(144, 12, 52);"> Glucosa (mg/dl): </label>
                <input type="text" class="form-control" name="glucosa" required>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="colesterol" style="font-size:20px;color: rgba(144, 12, 52);"> Colesterol (mg/dl): </label>
                <input type="text" class="form-control" id="colesterol" name="colesterol" required>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="TGL" style="font-size:20px;color: rgba(144, 12, 52);"> TGL: </label>
                <input type="text" class="form-control" id="TGL" name="TGL" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="Hb" style="font-size:20px;color: rgba(144, 12, 52);"> Hb (mg/dl): </label>
                <input type="text" class="form-control" id="Hb" name="Hb" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="Hto" style="font-size:20px;color: rgba(144, 12, 52);"> Hto (mg/dl): </label>
                <input type="text" class="form-control" id="Hto" name="Hto" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="HDL" style="font-size:20px;color: rgba(144, 12, 52);"> HDL (mg/dl): </label>
                <input type="text" class="form-control" id="HDL" name="HDL" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="LDL" style="font-size:20px;color: rgba(144, 12, 52);"> LDL (mg/dl): </label>
                <input type="text" class="form-control" id="LDL" name="LDL" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="PA" style="font-size:20px;color: rgba(144, 12, 52);"> PA (mmHg): </label>
                <input type="text" class="form-control" id="PA" name="PA" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="latidos" style="font-size:20px;color: rgba(144, 12, 52);"> Latidos (por min): </label>
                <input type="text" class="form-control" id="latidos" name="latidos" required>
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


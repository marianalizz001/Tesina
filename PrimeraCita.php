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
     
    <title>Nutrición Vida| Primera Cita</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PrimeraCitaPHP.php" method="post" enctype="multipart/form-data">
    <?php $idUsuario = $_POST['idUsuario']; 
            $idCita=$_POST['idCita'];
        ?>

        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <input type="hidden" value="<?php echo $idCita;?>" name="idCita">
        <input type="hidden" value="<?php echo $idCita;?>" name="idCita">
        <p class="h4">Primera Cita - <small>Evaluación Antropométrica</small></p>
        <hr>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idCita;?>" name="idCita">
    
            <div class="form-group col-sm-6 col-md-2">
                <label for="fecha" style="font-size:20px;color: rgba(144, 12, 52);"> Fecha: </label>
                <input type="datetime" class="form-control" name="fecha"  value="<?php date_default_timezone_set('America/Mexico_City'); echo date("d-m-Y");?>" readonly>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="peso_actual" style="font-size:20px;color: rgba(144, 12, 52);"> Peso Actual (kg)</label>
                <input type="number" class="form-control" name="peso_actual" step=.01 min=0 required>
            </div>

            <div class="form-group col-sm-6 col-md-3">
                <label for="peso_habitual" style="font-size:20px;color: rgba(144, 12, 52);"> Peso Habitual (kg): </label>
                <input type="text" class="form-control" id="peso_habitual" name="peso_habitual" min=0 step=.01 required>
            </div>

            <div class="form-group col-sm-6 col-md-4">
                <label for="peso_ideal" style="font-size:20px;color: rgba(144, 12, 52);"> PESO IDEAL (kg): </label>
                <input type="text" class="form-control" id="peso_ideal" name="peso_habitual" min=0 step=.01 required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="complex" style="font-size:20px;color: rgba(144, 12, 52);"> Complexión: </label>
                <select id="complex" class="form-control" name="complex">
                    <option selected>Selecciona</option>
                    <option>Ectomorfo</option>
                    <option>Mesomorfo</option>
                    <option>Endomorfo</option>
                </select>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="talla" style="font-size:20px;color: rgba(144, 12, 52);"> Talla (cm): </label>
                <input type="number" class="form-control" id="talla" name="talla" step=.1 min=0 required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="imc" style="font-size:20px;color: rgba(144, 12, 52);"> IMC: </label>
                <input type="number" class="form-control" id="imc" name="imc" step=.01 min=0 required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="icc" style="font-size:20px;color: rgba(144, 12, 52);"> ICC: </label>
                <input type="number" class="form-control" id="icc" name="icc" step=.01 min=0 max=1 required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-3">
                <label for="g_corporal" style="font-size:20px;color: rgba(144, 12, 52);">Grasa Corporal(%): </label>
                <input type="text" class="form-control" id="g_corporal" name="g_corporal" min=0 max=100 required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="m_muscular" style="font-size:20px;color: rgba(144, 12, 52);">Masa muscular (kg): </label>
                <input type="text" class="form-control" id="m_muscular" name="m_muscular" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="g_visceral" style="font-size:20px;color: rgba(144, 12, 52);">Grasa visceral (%): </label>
                <input type="text" class="form-control" id="g_visceral" name="g_visceral" required>
            </div>
            <div class="form-group col-sm-6 col-md-3">
                <label for="edad_met" style="font-size:20px;color: rgba(144, 12, 52);">Edad metabolica: </label>
                <input type="text" class="form-control" id="edad_met" name="edad_met" required>
            </div>

        </div>
        <div class="form-row">
        <div class="form-group col-sm-0 col-md-1">
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <label for="c_muneca" style="font-size:20px;color: rgba(144, 12, 52);">C.Muñeca (cm): </label>
                <input type="text" class="form-control" id="c_muneca" name="c_muneca" min=0 max=100 required>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <label for="c_cadera" style="font-size:20px;color: rgba(144, 12, 52);">C. Cadera (cm): </label>
                <input type="text" class="form-control" id="c_cadera" name="c_cadera" required>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <label for="c_cintura" style="font-size:20px;color: rgba(144, 12, 52);">C. Cintura (cm): </label>
                <input type="text" class="form-control" id="c_cintura" name="c_cintura" required>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <label for="c_brazo" style="font-size:20px;color: rgba(144, 12, 52);">C. Brazo (cm): </label>
                <input type="text" class="form-control" id="c_brazo" name="c_brazo" required>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <label for="c_pierna" style="font-size:20px;color: rgba(144, 12, 52);">C. Pierna (cm): </label>
                <input type="text" class="form-control" id="c_pierna" name="c_pierna" required>
            </div>
            <div class="form-group col-sm-0 col-md-1">
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

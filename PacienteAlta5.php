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
    <form action="PacienteAltaPHP5.php" method="post" enctype="multipart/form-data">
        <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Evaluación Clínica</small></p>
        <hr>

        
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Variación de peso: </label>
                <select id="condicion" class="form-control" name="var_peso" required>
                        <option selected></option>
                        <option value="Aumento">Aumento</option>
                        <option value="Perdida">Perdida</option>
                    </select>
            </div>

            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Posible motivo: </label>
                <select id="condicion" class="form-control" name="motivo" required>
                        <option selected></option>
                        <option value="Voluntario">Voluntario</option>
                        <option value="Enfermedad">Enfermedad</option>
                        <option value="Otro">Otro</option>
                    </select>
            </div>

        </div>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Cabello: </label>
                <select id="condicion" class="form-control" name="cabello" required>
                        <option selected></option>
                        <option value="Reseco">Reseco</option>
                        <option value="Quebradizo">Quebradizo</option>
                        <option value="Despigmentado">Despigmentado</option>
                        <option value="Normal">Normal</option>
                        <option value="Desprendimiento_facil">Desprendimiento fácil</option>
                    </select>
            </div>

            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Ojos: </label>
                <select id="condicion" class="form-control" name="ojos" required>
                        <option selected></option>
                        <option value="Palidez Conjutival">Palidez Conjuntival</option>
                        <option value="Manchas de Bitot">Manchas de Bitot</option>
                        <option value="Cataratas">Cataratas</option>
                        <option value="Normal">Normal</option>
                    </select>
            </div>

        </div>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Boca: </label>
                <select id="condicion" class="form-control" name="boca" required>
                    <option selected></option>
                    <option value="Clase I">Glositis</option>
                    <option value="Clase II">Gingivitis</option>
                    <option value="Clase III">Queilosis</option>
                    <option value="Normal">Normal</option>
                </select>
            </div>
    
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Cuello: </label>
                <select id="condicion" class="form-control" name="cuello" required>
                        <option selected></option>
                        <option value="Acantosis">Acantosis</option>
                        <option value="Alteración en la Tiroides">Alteración en la Tiroides</option>
                        <option value="Normal">Normal</option>
                    </select>
            </div>

           

        </div>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Torax: </label>
                <select id="condicion" class="form-control" name="torax" required>
                        <option selected></option>
                        <option value="Alteraciones">Alteraciones</option>
                        <option value="Normal">Normal</option>
                    </select>
            </div>
    
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Abdomen: </label>
                <select id="condicion" class="form-control" name="abdomen" required>
                        <option selected></option>
                        <option value="Alteraciones">Alteraciones</option>
                        <option value="Normal">Normal</option>
                        <option value="Inflamacion">Inflamación</option>
                    </select>
            </div>

           

        </div>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
    
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Extremidades Superiores: </label>
                <select id="condicion" class="form-control" name="ext_sup" required>
                        <option selected></option> 
                        <option value="Alteraciones">Alteraciones</option>
                        <option value="Normal">Normal</option>
                    </select>
            </div>

            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Extremidades Inferiores: </label>
                <select id="condicion" class="form-control" name="ext_inf" required>
                        <option selected></option>
                        <option value="Alteraciones">Alteraciones</option>
                        <option value="Normal">Normal</option>
                    </select>
            </div>

            

        </div>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
            
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Piel: </label>
                <select id="condicion" class="form-control" name="Piel" required>
                        <option selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Piel gruesa">Piel gruesa</option>
                        <option value="Hematomas">Hematomas</option>
                        <option value="Hiperpigmentacion">Hiperpigmentacion</option>
                    </select>
            </div>
    
            <div class="form-group col-sm-6 col-md-6">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Uñas: </label>
                <select id="condicion" class="form-control" name="unas" required>
                        <option selected></option>
                        <option value="Normal">Normal</option>
                        <option value="Abombamiento">Abombamiento</option>
                        <option value="Leuconiquia">Leuconiquia</option>
                        <option value="Delgadas">Delgadas</option>
                        <option value="Uñas de acrilico">Uñas de acrilico</option>
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


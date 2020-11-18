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

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
    
    function habilitar(radio){
        if (radio == 5)
            document.getElementById("cepillar_dientes").style.visibility = "visible";
        if (radio == 6)
            document.getElementById("cepillar_dientes").style.visibility = "hidden";
        if (radio == 11)
            document.getElementById("act_fisica").style.visibility = "visible";
        if (radio == 12)
            document.getElementById("act_fisica").style.visibility = "hidden";
        if (radio == 13)
            document.getElementById("drogas").style.visibility = "visible";
        if (radio == 14)
            document.getElementById("drogas").style.visibility = "hidden";
        if (radio == 15)
            document.getElementById("fuma").style.visibility = "visible";
        if (radio == 16)
            document.getElementById("fuma").style.visibility = "hidden";
        if (radio == 17)
            document.getElementById("alcohol").style.visibility = "visible";
        if (radio == 18)
            document.getElementById("alcohol").style.visibility = "hidden";
        if (radio == 19)
            document.getElementById("tatuajes").style.visibility = "visible";
        if (radio == 20)
            document.getElementById("tatuajes").style.visibility = "hidden";
        if (radio == 23)
            document.getElementById("embarazada").style.visibility = "visible";
        if (radio == 24)
            document.getElementById("embarazada").style.visibility = "hidden";
    }
    </script>

  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PacienteAltaPHP4.php" method="post" enctype="multipart/form-data">
        <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Antecedentes Personales NO Patológicos</small></p>
        <hr>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Cuanta su hogar con todos los servicios básicos de urbanidad? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="servicios_basicos" value="Si">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="servicios_basicos" value="No" checked>
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Su baño personal es diario? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="bano_personal" value="Si" >
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="bano_personal" value="No" checked >
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Cepilla sus dientes <small>(Veces por día)</small>? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="cepillar_dientes" value="Si" onclick="habilitar(5)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="cepillar_dientes" value="No" checked onclick="habilitar(6)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="cepillar_dientes">
                <label for="quien">Especifique</label>
                <input type="text" name="cepillar_dientes_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Utiliza enjuague bucal? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="enjuage_bucal" value="Si" >
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="enjuage_bucal" value="No" checked>
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Utiliza hilo dental? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hilo_dental" value="Si" >
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hilo_dental" value="No" checked >
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Realiza actividad física? <small>(Horas por semana)</small></p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="act_fisica" value="Si" onclick="habilitar(11)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="act_fisica" value="No" checked onclick="habilitar(12)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="act_fisica">
                <label for="quien">Especifique</label>
                <input type="text" name="act_fisica_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Ha consumido o consume drogas? <small>(Cuál)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="drogas" value="Si" onclick="habilitar(13)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="drogas" value="No" checked onclick="habilitar(14)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="drogas">
                <label for="quien">Especifique</label>
                <input type="text" name="drogras_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Fuma? <small>(Cigarrillos por día)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="fuma" value="Si" onclick="habilitar(15)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="fuma" value="No" checked onclick="habilitar(16)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="fuma">
                <label for="quien">Especifique</label>
                <input type="text" name="fuma_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Consume bebidas alcohólicas? <small>(Frecuencia y Cantidad)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alcohol" value="Si" onclick="habilitar(17)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="alcohol" value="No" checked onclick="habilitar(18)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="alcohol">
                <label for="quien">Especifique</label>
                <input type="text" name="alcohol_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Tatuajes?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tatuajes" value="Si" onclick="habilitar(19)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tatuajes" value="No" checked onclick="habilitar(20)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="tatuajes">
                <label for="quien">¿Cuántos?</label>
                <input type="text" name="tatuajes_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Esquema de inmunización completo? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="vacunas" value="Si" >
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="vacunas" value="No" checked >
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Está embarazada? <small>(Semanas)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="embarazada" value="Si" onclick="habilitar(23)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="embarazada" value="No" checked onclick="habilitar(24)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="embarazada">
                <label for="quien">Especifique</label>
                <input type="text" name="embarazada_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Está amamantando? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="amamantando" value="Si" >
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="amamantando" value="No" checked>
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Uso de anticonceptivos?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="anticonceptivos" value="Si">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="anticonceptivos" value="No" checked >
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
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


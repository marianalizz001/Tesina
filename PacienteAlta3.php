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
        if (radio == 23)
            document.getElementById("embarazada").style.visibility = "visible";
        if (radio == 24)
            document.getElementById("embarazada").style.visibility = "hidden";
        if (radio == 25){
            document.getElementById("mujer").style.visibility = "visible";
            document.getElementById("mujer2").style.visibility = "visible";
            document.getElementById("mujer3").style.visibility = "visible";
            document.getElementById("mujer4").style.visibility = "visible";
        }
        if (radio == 26){
            document.getElementById("mujer").style.visibility = "hidden";
            document.getElementById("mujer2").style.visibility = "hidden";
            document.getElementById("mujer3").style.visibility = "hidden";
            document.getElementById("mujer4").style.visibility = "hidden";
        }
        if (radio == 27){
            document.getElementById("embarazos").style.visibility = "visible";
            document.getElementById("embarazos1").style.visibility = "visible";
            document.getElementById("embarazos2").style.visibility = "visible";
            document.getElementById("embarazos3").style.visibility = "visible";
        }
        if (radio == 28){
            document.getElementById("embarazos").style.visibility = "hidden";
            document.getElementById("embarazos1").style.visibility = "hidden";
            document.getElementById("embarazos2").style.visibility = "hidden";
            document.getElementById("embarazos3").style.visibility = "hidden";
        }
        if (radio == 29)
            document.getElementById("complicaciones").style.visibility = "visible";
        if (radio == 30)
            document.getElementById("complicaciones").style.visibility = "hidden";
    }
    </script>

  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PacienteAltaPHP3.php" method="post" enctype="multipart/form-data">
        <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Antecedentes Personales NO Patológicos</small></p>
        <hr>
        <!--Consumo de agua -->
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> Consumo de Agua <small>(Litros por día)</small> </p><br>
            </div>

            <div class="form-group col-sm-6 col-md-3" id="agua_litros">
                <input type="number" class="form-control" name="agua_litros"> 
            </div>
        </div>
        <!--Actividad Fisica -->
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
                <label for="quien">Especifique:</label>
                <input type="number" class="form-control" name="act_fisica_esp">
            </div>
        </div>
        <!--Drogas -->
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
                <label for="quien">Especifique:</label>
                <input type="text" class="form-control" name="drogras_esp">
            </div>
        </div>
        <!--Tabaquismo -->
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
                <label for="quien">Especifique:</label>
                <input type="text" class="form-control" name="fuma_esp">
            </div>
        </div>
        <!--Alcoholismo -->
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
                <label for="quien">Especifique:</label>
                <input type="text" class="form-control" name="alcohol_esp">
            </div>
        </div>
        <!-- En caso de ser mujer -->
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿MUJER? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="mujer" value="Si" onclick="habilitar(25)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="mujer" value="No" checked onclick="habilitar(26)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
        </div>
        <!-- Embarazada -->
        <div class="form-row" style="visibility: hidden;" id="mujer">
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
                <label for="quien">Especifique:</label>
                <input type="text" class="form-control" name="embarazada_esp">
            </div>
        </div>
        <!-- Amamantando -->
        <div class="form-row" style="visibility: hidden;" id="mujer2">
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
        <!-- Embarazos Previos -->
        <div class="form-row" style="visibility: hidden;" id="mujer3">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Embarazos Previos?<small>(¿Cuántos?)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="embarazos" value="Si" onclick="habilitar(27)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="embarazos" value="No" onclick="habilitar(28)" checked>
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="embarazos">
                <label for="quien">Especifique:</label>
                <input type="number" class="form-control" name="embarazos_esp">
            </div>
            
        </div>
        <!-- En caso de embarazos previos -->
        <!-- Llegaron a termino -->
        <div class="form-row" style="visibility: hidden;" id="embarazos1">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Nacieron a termino? </small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="termino" value="Si">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="termino" value="No" checked>
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            
        </div>
        <!-- Complicaciones -->
        <div class="form-row" style="visibility: hidden;" id="embarazos2">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Complicaciones? <small>(¿Cuáles?)</small> </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="complicaciones" value="Si" onclick="habilitar(29)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="complicaciones" value="No" checked onclick="habilitar(30)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="complicaciones">
                <label for="quien">Especifique:</label>
                <input type="text" class="form-control" name="complicaciones_esp">
            </div>
            
        </div>
        <!-- Natural o Cesarea -->
        <div class="form-row" style="visibility: hidden;" id="embarazos3">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Parto natural o cesárea?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="nat_o_ces" value="Natural" >
                    <label class="form-check-label" for="exampleRadios1"> Natural </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="nat_o_ces" value="Cesarea">
                    <label class="form-check-label" for="exampleRadios2"> Cesárea </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="nat_o_ces" value="Ambos">
                    <label class="form-check-label" for="exampleRadios2"> Ambos</label>
                </div>
            </div>
            
        </div>
          
        <!-- Anticonceptivos -->
        <div class="form-row" style="visibility: hidden;" id="mujer4">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5">Método Anticonceptivo</p><br>
                </div>
            <div class="form-group col-sm-6 col-md-3">
                <select id="metodo" class="form-control" name="metodo_anticonceptivo">
                    <option selected>Selecciona</option>
                    <option>Pildoras</option>
                    <option>Condón</option>
                    <option>DIU</option>
                    <option>SIU</option>
                    <option>Parche</option>
                    <option>Implante</option>
                    <option>Inyección</option>
                    <option>Ritmo</option>
                    <option>Esterilidad</option>
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


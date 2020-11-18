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
        if (radio == 1)
            document.getElementById("hospitalizado").style.visibility = "visible";
        if (radio == 2)
            document.getElementById("hospitalizado").style.visibility = "hidden";
        if (radio == 3)
            document.getElementById("tratamiento").style.visibility = "visible";
        if (radio == 4)
            document.getElementById("tratamiento").style.visibility = "hidden";
        if (radio == 5)
            document.getElementById("anestesia").style.visibility = "visible";
        if (radio == 6)
            document.getElementById("anestesia").style.visibility = "hidden";
        if (radio == 7)
            document.getElementById("sangre").style.visibility = "visible";
        if (radio == 8)
            document.getElementById("sangre").style.visibility = "hidden";
        if (radio == 9)
            document.getElementById("secuela").style.visibility = "visible";
        if (radio == 10)
            document.getElementById("secuela").style.visibility = "hidden";
        if (radio == 11)
            document.getElementById("hipertension").style.visibility = "visible";
        if (radio == 12)
            document.getElementById("hipertension").style.visibility = "hidden";
        if (radio == 13)
            document.getElementById("corazon").style.visibility = "visible";
        if (radio == 14)
            document.getElementById("corazon").style.visibility = "hidden";
        if (radio == 15)
            document.getElementById("respiratoria").style.visibility = "visible";
        if (radio == 16)
            document.getElementById("respiratoria").style.visibility = "hidden";
        if (radio == 17)
            document.getElementById("convulsiones").style.visibility = "visible";
        if (radio == 18)
            document.getElementById("convulsiones").style.visibility = "hidden";
        if (radio == 19)
            document.getElementById("hepatitis").style.visibility = "visible";
        if (radio == 20)
            document.getElementById("hepatitis").style.visibility = "hidden";
        if (radio == 21)
            document.getElementById("vih").style.visibility = "visible";
        if (radio == 22)
            document.getElementById("vih").style.visibility = "hidden";
        if (radio == 23)
            document.getElementById("tuberculosis").style.visibility = "visible";
        if (radio == 24)
            document.getElementById("tuberculosis").style.visibility = "hidden";
        if (radio == 25)
            document.getElementById("rinones").style.visibility = "visible";
        if (radio == 26)
            document.getElementById("rinones").style.visibility = "hidden";
        if (radio == 27)
            document.getElementById("nomencionada").style.visibility = "visible";
        if (radio == 28)
            document.getElementById("nomencionada").style.visibility = "hidden";
        if (radio == 29)
            document.getElementById("transfusion").style.visibility = "visible";
        if (radio == 30)
            document.getElementById("transfusion").style.visibility = "hidden";
        if (radio == 31)
            document.getElementById("medicamento").style.visibility = "visible";
        if (radio == 32)
            document.getElementById("medicamento").style.visibility = "hidden";
    }
    </script>

  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PacienteAltaPHP5.php" method="post" enctype="multipart/form-data">
        <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Antecedentes Personales Patológicos</small></p>
        <hr>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Ha sido hospitalizado o intervenido quirúrgicamente? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalizado" value="S" onclick="habilitar(1)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hospitalizado" value="N" checked  onclick="habilitar(2)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="hospitalizado">
                <label for="quien">Especifique</label>
                <input type="text" name="hospitalizado_esp" name="_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Se encuentra bajo algún tratamiento médico? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tratamiento" value="S" onclick="habilitar(3)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tratamiento" value="N" checked  onclick="habilitar(4)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="tratamiento">
                <label for="quien">Especifique</label>
                <input type="text" name="tratamiento_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Alergia a alguna sustancia, anestesia o medicamento? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="anestesia" value="S" onclick="habilitar(5)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="anestesia" value="N" checked  onclick="habilitar(6)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="anestesia">
                <label for="quien">Especifique</label>
                <input type="text" name="anestesia_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece enfermedades de la sangre? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" value="S" onclick="habilitar(7)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" value="N" checked  onclick="habilitar(8)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="sangre">
                <label for="quien">Especifique</label>
                <input type="text" name="sangre_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Algún golpe que le haya dejado una secuela? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="secuela" value="S" onclick="habilitar(9)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="secuela" value="N"  checked onclick="habilitar(10)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="secuela">
                <label for="quien">Especifique</label>
                <input type="text" name="secuela_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece hipo/hipertensión arterial?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hipertension" value="S" onclick="habilitar(11)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hipertension" value="N" checked  onclick="habilitar(12)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="hipertension">
                <label for="quien">Especifique</label>
                <input type="text" name="hipertension_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece alguna enfermedad del corazón? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="corazon" value="S" onclick="habilitar(13)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="corazon" value="N"  checked onclick="habilitar(14)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="corazon">
                <label for="quien">Especifique</label>
                <input type="text" name="corazon_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece alguna enfermedad respiratoria? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="respiratoria" value="S" onclick="habilitar(15)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="respiratoria" value="N"  checked onclick="habilitar(16)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="respiratoria">
                <label for="quien">Especifique</label>
                <input type="text" name="respiratoria_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece convulsiones?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="convulsiones" value="S" onclick="habilitar(17)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="convulsiones" value="N" checked  onclick="habilitar(18)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="convulsiones">
                <label for="quien">Especifique</label>
                <input type="text" name="convulsiones_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece hepatitis?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hepatitis" value="S" onclick="habilitar(19)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="hepatitis" value="N"  checked onclick="habilitar(20)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="hepatitis">
                <label for="quien">Especifique</label>
                <input type="text" name="hepatitis_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece de VIH/SIDA?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="vih" value="S" onclick="habilitar(21)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="vih" value="N" checked  onclick="habilitar(22)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="vih">
                <label for="quien">Especifique</label>
                <input type="text" name="vih_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece tuberculosis? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tuberculosis" value="S" onclick="habilitar(23)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="tuberculosis" value="N" checked  onclick="habilitar(24)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="tuberculosis">
                <label for="quien">Especifique</label>
                <input type="text" name="tuberculosis_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece alguna enfermedad en los riñores?  </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="rinones" value="S" onclick="habilitar(25)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="rinones" value="N" checked  onclick="habilitar(26)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="rinones">
                <label for="quien">Especifique</label>
                <input type="text" name="rinones_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Padece otra enfermedad no mencionada? </p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="nomencionada" value="S" onclick="habilitar(27)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="nomencionada" value="N"  checked onclick="habilitar(28)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="nomencionada">
                <label for="quien">Especifique</label>
                <input type="text" name="nomencionada_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Ha necesitado alguna transfusión sanguínea?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="transfusion" value="S" onclick="habilitar(29)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="transfusion" value="N"  checked onclick="habilitar(30)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="transfusion">
                <label for="quien">Especifique</label>
                <input type="text" name="transfusion_esp">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-7">
                <p class="h5"> ¿Está tomando algún medicamento?</p><br>
            </div>
            <div class="form-group col-sm-6 col-md-2">
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="medicamento" value="S" onclick="habilitar(31)">
                    <label class="form-check-label" for="exampleRadios1"> Si </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="medicamento" value="N" checked  onclick="habilitar(32)">
                    <label class="form-check-label" for="exampleRadios2"> No </label>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-3" style="visibility: hidden;" id="medicamento">
                <label for="quien">Especifique</label>
                <input type="text" name="medicamento_esp">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6 col-md-12">
                <p class="h5">*Observaciones:</p><br>
            </div>
            <div class="col-sm-12 col-md-12">
                <textarea class="form-control" name="observaciones"  rows="2" style="resize: none;" ></textarea>
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


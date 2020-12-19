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
     
    <title>Dra.YazminNajera | Home</title>

    <?php include("navbar.php"); ?>
    <br>
    <script type="text/javascript">
    
    function habilitar(radio){
        if (radio == 1)
            document.getElementById("valor").style.visibility = "hidden";
        if (radio == 2)
            document.getElementById("valor").style.visibility = "hidden";
        if (radio == 3)
            document.getElementById("valor").style.visibility = "visible";
    }
    </script>
  </head>

<body>
  
<br><br>
    <div class="container">
        <form action="PrimeraCitaPHP2.php" method="post">
        <?php
            $idCita = $_REQUEST['idCita'];
            $cursor2 = $bd->Cita->find([
                '_id' => new \MongoDB\BSON\ObjectID($idCita)
            ]);

            foreach ($cursor2 as $cita) {
                $Seguimiento = $cita['seguimiento'];
                $evaluacion = $Seguimiento->EvaluaciónAntropométrica;
                $obj = json_decode($evaluacion);
                $peso = $obj->{'peso_actual'};
                $talla =$obj->{'talla'};
                $idUsuario = $cita['Usuario_idUsuario'];
            }
            $cursor = $bd->Paciente->find([
                '_id' => new \MongoDB\BSON\ObjectID($idUsuario)
            ]);

            foreach ($cursor as $usuario) {
                $f_nac = $usuario['f_nac'];
                $sexo = $usuario['genero'];
            }
            //Encontrar edad
            list($ano,$mes,$dia) = explode("-",$f_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 && $mes_diferencia < 0){
                $ano_diferencia--; 
                }
                $edad=$ano_diferencia;

            if ($sexo=="F"){
                $resMifflin= ((9.99*$peso)+(6.25*$talla))-(4.92*$edad)-161;
                $resHarris = 655+(9.6*$peso)+(1.8*$talla)-(4.7*$edad);
                //echo $resMifflin;
            }else{
                $resMifflin= ((9.99*$peso)+(6.25*$talla))-(4.92*$edad)+5;
                $resHarris = 66+(13.7*$peso)+(5*$talla)-(6.8*$edad);
            }
            
        ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <input type="hidden" value="<?php echo $idCita;?>" name="idCita">
            <p class="h4">Cita - <small>Elección de Formula</small></p>
            <hr> 
            <p>A continuación se muestran los valores obtenidos por el sistema para las formulas de Mifflin y Harris-Benedict<br>si no está conforme con los resultados pulse el botón de otro para que pueda ingresar su propio valor</p>
            <div class="form-row">  
                <div class="form-group col-sm-6 col-md-6">
                    <p class="h4"><small> Mifflin - St Jeor = </small><?php echo $resMifflin; ?> (kcal)</p><br>
                    
                </div>
                <div class="form-group col-sm-6 col-md-6">
                    <p class="h4"><small> Harris - Benedict = </small><?php echo $resHarris; ?>(kcal)</p><br>
                </div>
            </div>
            <div class="form-row"> 
                <div class="form-group col-sm-6 col-md-4">
                    <label for="formula" style="font-size:20px;color: rgba(144, 12, 52);"> Selecciona la formula a utilizar </label><br>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="formula" value="<?php echo $resMifflin;?>" onclick="habilitar(1)" checked>
                        <label class="form-check-label" for="exampleRadios1"> Mifflin </label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="formula" value="<?php echo $resMifflin;?>" onclick="habilitar(2)">
                        <label class="form-check-label" for="exampleRadios2"> Harris </label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="formula" value="Otro" onclick="habilitar(3)">
                        <label class="form-check-label" for="exampleRadios2"> Otro </label>
                    </div>
                </div>
                <div class="form-group col-sm-6 col-md-8" style="visibility: hidden;" id="valor">
                        <label for="cual" style="font-size:20px;color: rgba(144, 12, 52);">Ingrese valor deseado</label><br>
                        <input type="text" name="formula_q" style="width: 500px;">
                 </div>
            </div> 
            <div class="col-12 text-center">
                <input  class = "btn btn-success" type="submit" value="Siguiente" name = "btnEnviar">
            </div>
            <br>
            
        </form>
    </div>
</body>
  
</html>
<?php include("footer.php"); ?>

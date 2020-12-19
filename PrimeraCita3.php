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
        <form action="PrimeraCitaPHP3.php" method="post">
        <?php
            $idCita = $_REQUEST['idCita'];
            $cursor2 = $bd->Cita->find([
                '_id' => new \MongoDB\BSON\ObjectID($idCita)
            ]);

            foreach ($cursor2 as $cita) {
                $Seguimiento = $cita['seguimiento'];
                $val = $Seguimiento->Valores;
                $obj = json_decode($val);
                $formula = $obj->{'formula'};
                if ($formula!=""){
                    $hc=(55*$formula/100);
                    $prot=(20*$formula/100);
                    $lip =(25*$formula/100);
                }else{
                    $formula = $obj->{'formula_q'};
                    $hc=(55*$formula/100);
                    $prot=(20*$formula/100);
                    $lip =(25*$formula/100);
                }
            }
            
            
        ?>
        <input type="hidden" value="<?php echo $idCita;?>" name="idCita">
        <input type="hidden" value="<?php echo $hc;?>" name="hidratos">
        <input type="hidden" value="<?php echo $prot;?>" name="proteinas">
        <input type="hidden" value="<?php echo $lip;?>" name="lipidos">
            <p class="h4">Cita - <small>Tratamiento Nutricional</small></p>
            <hr> 
            <p>Estos son los valores calculados por el sistema para el tratamiento:</p>
            <div class="form-row">  
                <div class="form-group col-sm-12 col-md-12">
                    <p class="h4"><small> Hidratos de Carbono = </small><?php echo $hc; ?> (kcal)</p><br>
                    
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <p class="h4"><small> Proteínas = </small><?php echo $prot; ?>(kcal)</p><br>
                </div>
                <div class="form-group col-sm-12 col-md-12">
                    <p class="h4"><small> Lípidos = </small><?php echo $lip; ?>(kcal)</p><br>
                </div>
            </div>
            <div class="form-row">
                <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
                
        
                <div class="form-group col-sm-4 col-md-3">
                    <label for="verduras" style="font-size:20px;color: rgba(144, 12, 52);"> Verduras: </label>
                    <textarea class="form-control" id="verduras" rows="6" name="verduras" style="resize:none"></textarea>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="frutas" style="font-size:20px;color: rgba(144, 12, 52);"> Frutas: </label>
                    <textarea class="form-control" id="frutas" rows="6" name="frutas" style="resize:none"></textarea>
                </div>
                <div class="form-group col-sm-4 col-md-3">
                    <label for="cereales" style="font-size:20px;color: rgba(144, 12, 52);"> Cereales: </label>
                    <textarea class="form-control" id="cereales" rows="6" name="cereales" style="resize:none"></textarea>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="leguminosas" style="font-size:20px;color: rgba(144, 12, 52);"> Leguminosas: </label>
                    <textarea class="form-control" id="leguminosas" rows="6" name="leguminosas" style="resize:none"></textarea>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="aoa" style="font-size:20px;color: rgba(144, 12, 52);"> Alimentos Origen Animal: </label>
                    <textarea class="form-control" id="aoa" rows="6" name="aoa" style="resize:none"></textarea>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="lacteos" style="font-size:20px;color: rgba(144, 12, 52);"> Lactéos: </label>
                    <textarea class="form-control" id="lacteos" rows="6" name="lacteos" style="resize:none"></textarea>
                </div>

                <div class="form-group col-sm-4 col-md-3">
                    <label for="grasas" style="font-size:20px;color: rgba(144, 12, 52);"> Grasas: </label>
                    <textarea class="form-control" id="grasas" rows="6" name="grasas" style="resize:none"></textarea>
                </div>
                <div class="form-group col-sm-4 col-md-3">
                    <label for="azucar" style="font-size:20px;color: rgba(144, 12, 52);"> Ázucares: </label>
                    <textarea class="form-control" id="azucar" rows="6" name="azucar" style="resize:none"></textarea>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-sm-12 col-md-12">
                    <label for="consideraciones" style="font-size:20px;color: rgba(144, 12, 52);"> Consideraciones: </label>
                    <textarea class="form-control" id="consideraciones" rows="6" name="consideraciones" style="resize:none"></textarea>
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

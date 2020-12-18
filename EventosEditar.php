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
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">

    <title>Dra.YazminNajera | Cita</title>

    <?php include("navbar.php"); ?>
    <br>

</head>

<body>
<br>
<?php
    include ('Conexion.php');
?>
<?php $id = $_REQUEST['id']; ?>
    <div class="container" id="registro">
        <div class="row">
            <div class="col-12" id="barra_servicio">
                <A class="h2 align-middle text-center" name="servicios" id="servicio">Editar Cita</A>
            </div>
        </div>
        <br><br>
        <?php
?>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-6">
                    <form action="EventosEditarPHP.php"  method="POST"  enctype="multipart/form-data">
                    <div class="form-group row">
                            <div class="col-6">
                            <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="idUsuario" id="idUsuario" >
                                <label for="nombre-paciente" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre del Usuario: </label>
                            </div>
                            <div class="col-6">
                            <?php
                            //Recupera el nombre de los pacientes
                            include ('Conexion.php');
                           $consulta = $bd->Cita->find([
                            '_id' => new \MongoDB\BSON\ObjectID($id)
                           ]);
                              foreach ($consulta as $act){
                                $id = $act['_id'];
                                $nombre = $act['nombre'];
                                $start = $act['start'];
                                $title = $act['title'];

                               // echo '<textarea  class="form-control" readonly="readonly" name="nombre" id="nombre" value="'.$nombre.'</textarea>';

                              }

                            ?>     
                            <input type="text" class="form-control" readonly="readonly"  name="nom_paciente" id="nom_paciente"  value="<?php echo $nombre ?>">      
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="fecha" style="font-size:20px;color: rgba(144, 12, 52);"> Fecha de la cita: </label>
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" name="fecha_cita" id="fecha_cita" min="2019-12-01" required value="<?php echo $start ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="hora" style="font-size:20px;color: rgba(144, 12, 52);"> Hora de la cita: </label>
                            </div>
                            <div class="col-6">
                            <input type="time" class="form-control" name="txtHora" id="txtHora" required value="<?php echo $start ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="titulo" style="font-size:20px;color: rgba(144, 12, 52);"> Tipo de Cita: </label>
                            </div>
                            <div class="col-6">
                            <select class="form-control" name="txtTitulo" id="txtTitulo" required >

                            <?php
                                if($title == "Primera Cita"){ ?>
                                <option selected value="Primera Cita">Primera Cita</option>
                                <option value="Seguimiento">Seguimiento</option>
                                    <?php
                                }else{
                                    ?>
                                    <option value="Primera Cita">Primera Cita</option>
                                    <option selected value="Seguimiento">Seguimiento</option>
                                    <?php
                                }
                            ?>

                        </select>

                            </div>
                        </div>
                        <br><br>
                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Editar Cita" name="btnEnviar">
                     
                    </form>
                    
                </div>
                <div class="col-6">
                        <img src="img/calendario.webp" alt="Calendario" width="300px">
                    </div>
            </div>

            <br><br><br>
            <br>
            <br>
            <br>
        </div>

    </div>

</body>

</html>
<?php include("footer.php"); ?>
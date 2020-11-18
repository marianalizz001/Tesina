
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
<?php
    include ('Conexion.php');
?>
    <div class="container" id="registro">
        <div class="row">
            <div class="col-12" id="barra_servicio">
                <A class="h2 align-middle text-center" name="servicios" id="servicio">Agendar Cita</A>
            </div>
        </div>
        <br><br>
        <?php
?>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-6">
                    <form action="EventosAgregar.php"  method="POST  enctype="multipart/form-data">
                    <div class="form-group row">
                            <div class="col-6">
                            <input type="hidden" value="" name="idUsuario" id="idUsuario" >
                                <label for="nombre-paciente" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre del Cliente: </label>
                            </div>
                            <div class="col-6">
                               <select class="form-control" name="nom_paciente" id="txtNombre">
                            <option value="Nuevo paciente"></option>
                            <?php
                            //Recupera el nombre de los pacientes
                            include ('Conexion.php');
                           $consulta = $bd->Usuario->find([
                            'tipo_usuario' => 'P'
                           ]);
                              foreach ($consulta as $act){
                                $id = $act['_id'];
                                $nombre = $act['nombre'];
                                $apPat = $act['apPat'];
                                $apMat = $act['apMat'];
                                echo '<option value="'.$nombre. " " .$apPat. " " .$apMat.'">'.$nombre. " " .$apPat. " " .$apMat.'</option>';

                              }

                            ?>           
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="fecha" style="font-size:20px;color: rgba(144, 12, 52);"> Fecha de la cita: </label>
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" name="fecha_cita" id="fecha_cita" min="2019-12-01" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="hora" style="font-size:20px;color: rgba(144, 12, 52);"> Hora de la cita: </label>
                            </div>
                            <div class="col-6">
                            <select class="form-control" name="txtHora" id="txtHora" required>
                                <option>10:00:00</option>
                                <option>11:00:00</option>
                                <option>16:00:00</option>
                                <option>17:00:00</option>
                                <option>18:00:00</option>
                                <option>19:00:00</option>
                            </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="titulo" style="font-size:20px;color: rgba(144, 12, 52);"> Servicios: </label>
                            </div>
                            <div class="col-6">
                            <select class="form-control" name="txtTitulo" id="txtHora" required >
                            <option>Ortodoncia</option>
                            <option>Protesis</option>
                            <option>Estetica dental</option>
                            <option>Higiene</option>
                            <option>Prevencion</option>
                            <option>Odontopediatria</option>
                            <option>Endodoncia</option>
                            <option>Peridoncia</option>
                            <option>Cirugia dental</option>
                            <option>Otros</option>
                        </select>

                            </div>
                        </div>
                        <br><br>
                        <input class="btn btn-success btn-lg btn-block" type="submit" value="Agendar Cita" name="btnEnviar">
                     
                    </form>
                    
                </div>
                <div class="col-6">
                        <img src="img/Diente.png" alt="Calendario" width="250px">
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
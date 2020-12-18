
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <script>
    function habilitar(radio){
        if (radio == 1){
            document.getElementById("nombre").style.visibility = "visible";
            document.getElementById("nombreBD").style.visibility = "hidden";
        }
            
        if (radio == 2){
            document.getElementById("nombre").style.visibility = "hidden";
            document.getElementById("nombreBD").style.visibility = "visible";
        }
    }
</script>
</head>

<body>
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
                    <form action="EventosAgregar.php"  method="POST"  enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="form-check-label" for="NuevoPac"> Nuevo Paciente </label>
                        </div>
                        <div class="form-group col-6">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="NuevoPac" value="Nuevo" onclick="habilitar(1)">
                                <label class="form-check-label" for="NuevoPac"> Si </label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="NuevoPac" value="Viejo" onclick="habilitar(2)">
                                <label class="form-check-label" for="NuevoPac"> No </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" id="nombreBD">
                            <div class="col-6">
                            <input type="hidden" value="" name="idUsuario" id="idUsuario" >
                                <label for="nombre-paciente" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre del Cliente: </label>
                            </div>
                            <div class="col-6">
                               <select class="form-control" name="nom_paciente" id="txtNombre" >
                               <option selected></option>
                            <?php
                            //Recupera el nombre de los pacientes
                            include ('Conexion.php');
                           $consulta = $bd->Paciente->find();
                              foreach ($consulta as $act){
                                $id = $act['_id'];
                                $nombre = $act['nombre'];
                                $apPat = $act['apPat'];
                                $apMat = $act['apMat'];
                                echo '<option value="'.$nombre. " " .$apPat. " " .$apMat.'">'.$nombre. " " .$apPat. " " .$apMat.'</option>';
                              }
                              
                            ?>           
                            </select>
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            </div>
                        </div>
                        <div class="form-group row" id= "nombre"  style="visibility : hidden;">
                            <div class="col-6">
                                <label for="nombre" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre Completo: </label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="nombre" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="fecha" style="font-size:20px;color: rgba(144, 12, 52);"> Fecha de la cita: </label>
                            </div>
                            <div class="col-6">
                                <input type="date" class="form-control" name="fecha_cita" id="fecha_cita" min="2020-12-01" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="hora" style="font-size:20px;color: rgba(144, 12, 52);"> Hora de la cita: </label>
                            </div>
                            <div class="col-6">
                            <input type="time" class="form-control" name="txtHora" id="txtHora" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="titulo" style="font-size:20px;color: rgba(144, 12, 52);"> Tipo de Cita: </label>
                            </div>
                            <div class="col-6">
                            <select class="form-control" name="txtTitulo" id="txtHora" required >
                            <option>Primera Cita</option>
                            <option>Seguimiento</option>
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
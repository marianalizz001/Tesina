
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
        });
    </script>

    <br>
    <?php
    include('Conexion.php');
    $temp = $_GET['idUsuario'];

    $instruccion = $bd->Paciente->find(
        [
            '_id' => new \MongoDB\BSON\ObjectID($temp)
        ]
    );
   foreach ($instruccion as $act){
        $idPaciente = $act['_id'];
        $nombre = $act['nombre'];
        $apPat = $act['apPat'];
        $apMat = $act['apMat'];
        $genero = $act['genero'];
        $f_nac = $act['f_nac'];
        $correo = $act['correo'];
        $telefono = $act['telefono'];
        #Direccion
        $domicilio = $act['direccion'];
        $calle = $domicilio->calle;
        $no_ext = $domicilio->no_ext;
        $colonia = $domicilio->colonia;
        $cp = $domicilio->cp;
?>  


    <div class="card mb-12 mx-auto" style="max-width: 50%;">
    <div class="row no-gutters">
        
        <form action="PerfilPacientePHP.php" method="post" enctype="multipart/form-data">
        <div class="col-md-12">
            <strong><h2 class="card-title"><?php echo $nombre. " ". $apPat. " ". $apMat;?></h2></strong>
            <p class="card-text">
                <small>Fecha de nacimiento: </small> <strong><?php echo $f_nac; ?> </strong> <br>
                <small>Género: </small> <strong> <?php  if ($genero == 'F') echo 'Femenino'; else echo 'Masculino';?> </strong><br>
                <small>Correo: </small> <strong><?php echo $correo; ?> </strong> <br>
            </p>

                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">
                <input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
                <div class="form-row">
                    
                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Teléfono: </p>
                        <input type="tel" pattern="[0-9]{10}" class="form-control" id="telefono" name="telefono" required value="<?php echo $telefono;?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-sm-6 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Fraccionamiento: </p>
                        <input type="text" class="form-control" id="colonia" name="colonia" required value="<?php echo $colonia;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Calle: </p>
                        <input type="text" class="form-control" id="calle" name="calle" required value="<?php echo $calle;?>">
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">No. ext: </p>
                        <input type="text" class="form-control" id="no_ext" name="no_ext" required value="<?php echo $no_ext;?>">
                    </div>

                    <div class="form-group col-sm-12 col-md-6">
                        <p style="font-size:20px;color: rgba(144, 12, 52);">Cp: </p>
                        <input type="number" class="form-control" id="cp" name="cp" required value="<?php echo $cp;?>">
                    </div>
                </div>

                <div class="text-center">
                    <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar">
                </div><br>
            </form>

        </div>
        </div>
        <?php } ?>
                           
    <script src="js/jquery.slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

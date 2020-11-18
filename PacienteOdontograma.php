

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
    <form action="PacienteAltaPHP9.php" method="post" enctype="multipart/form-data">
    <?php $idUsuario = $_POST['idUsuario']; 
            $idCita=$_POST['idCita'];

            $query = "SELECT odontograma FROM cita WHERE id = $idCita";
            $query = $bd->Cita->find(
                ['_id' => new \MongoDB\BSON\ObjectID($idCita)]
            );

            foreach($query as $row){
            $obj = json_decode($row['odontograma']);
            $once= $obj->{'11'};
            $doce= $obj->{'12'};
            $trece= $obj->{'13'};
            $catorce= $obj->{'14'};
            $quince= $obj->{'15'};
            $dieciseis= $obj->{'16'};
            $diecisiete= $obj->{'17'};
            $dieciocho= $obj->{'18'};

            $veintiuno= $obj->{'21'};
            $veintidos= $obj->{'22'};
            $veintitres= $obj->{'23'};
            $veinticuatro= $obj->{'24'};
            $veinticinco= $obj->{'25'};
            $veintiseis= $obj->{'26'};
            $veintisiete= $obj->{'27'};
            $veintiocho= $obj->{'28'};

            $cuarentayuno= $obj->{'41'};
            $cuarentaydos= $obj->{'42'};
            $cuarentaytres= $obj->{'43'};
            $cuarentaycuatro= $obj->{'44'};
            $cuarentaycinco= $obj->{'45'};
            $cuarentayseis= $obj->{'46'};
            $cuarentaysiete= $obj->{'47'};
            $cuarentayocho= $obj->{'48'};

            $treintayuno= $obj->{'31'};
            $treintaydos= $obj->{'32'};
            $treintaytres= $obj->{'33'};
            $treintaycuatro= $obj->{'34'};
            $treintaycinco= $obj->{'35'};
            $treintayseis= $obj->{'36'};
            $treintaysiete= $obj->{'37'};
            $treintayocho= $obj->{'38'};

            $generles= $obj->{'tratamiento_general'};

            }
        ?>

        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <input type="hidden" value="<?php echo $idCita;?>" name="idCita">
        <p class="h4"> Odontograma</p>
        <hr>
        <center><img src="img/odo_sup.png" class="img-fluid" alt="Responsive image"></center>
        <div class="table-responsive-sm">
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col" style="color: rgba(144, 12, 52);">ÓRGANO DENTARIO</th>
                <th scope="col">TRATAMIENTO</th>
                <th scope="col" style="color: rgba(144, 12, 52);">ÓRGANO DENTARIO</th>
                <th scope="col">TRATAMIENTO</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td> 11 (51)</td>
                    <td> <input type="text" class="form-control" id="referido" name="11" value="<?php echo $once; ?>"> </td>
                    <td> 21 (61)</td>
                    <td> <input type="text" class="form-control" id="referido" name="21" value="<?php echo $veintiuno; ?>"> </td>
                </tr>

                <tr>
                    <td> 12 (52)</td>
                    <td> <input type="text" class="form-control" id="referido" name="12" value="<?php echo $doce; ?>"> </td>
                    <td> 22 (63)</td>
                    <td> <input type="text" class="form-control" id="referido" name="22" value="<?php echo $veintidos; ?>"> </td>
                </tr>

                <tr>
                    <td> 13 (53)</td>
                    <td> <input type="text" class="form-control" id="referido" name="13" value="<?php echo $trece; ?>"> </td>
                    <td> 23 (63)</td>
                    <td> <input type="text" class="form-control" id="referido" name="23" value="<?php echo $veintitres; ?>"> </td>
                </tr>

                <tr>
                    <td> 14 (54)</td>
                    <td> <input type="text" class="form-control" id="referido" name="14" value="<?php echo $catorce; ?>"> </td>
                    <td> 24 (64)</td>
                    <td> <input type="text" class="form-control" id="referido" name="24" value="<?php echo $veinticuatro; ?>"> </td>
                </tr>

                <tr>
                    <td> 15 (55)</td>
                    <td> <input type="text" class="form-control" id="referido" name="15" value="<?php echo $quince; ?>"> </td>
                    <td> 25 (65)</td>
                    <td> <input type="text" class="form-control" id="referido" name="25" value="<?php echo $veinticinco; ?>"> </td>
                </tr>

                <tr>
                    <td> 16 </td>
                    <td> <input type="text" class="form-control" id="referido" name="16" value="<?php echo $dieciseis ?>"> </td>
                    <td> 26</td>
                    <td> <input type="text" class="form-control" id="referido" name="26" value="<?php echo $veintiseis; ?>"> </td>
                </tr>

                <tr>
                    <td> 17 </td>
                    <td> <input type="text" class="form-control" id="referido" name="17" value="<?php echo $diecisiete; ?>"> </td>
                    <td> 27</td>
                    <td> <input type="text" class="form-control" id="referido" name="27" value="<?php echo $veintisiete; ?>"> </td>
                </tr>

                <tr>
                    <td> 18</td>
                    <td> <input type="text" class="form-control" id="referido" name="18" value="<?php echo $dieciocho; ?>"> </td>
                    <td> 28</td>
                    <td> <input type="text" class="form-control" id="referido" name="28" value="<?php echo $veintiocho; ?>"> </td>
                </tr>
            </tbody>
        </table>    
        </div>


        <center><img src="img/odo_inf.png" class="img-fluid" alt="Responsive image"></center>
        <div class="table-responsive-sm">
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col" style="color: rgba(144, 12, 52);">ÓRGANO DENTARIO</th>
                <th scope="col">TRATAMIENTO</th>
                <th scope="col" style="color: rgba(144, 12, 52);">ÓRGANO DENTARIO</th>
                <th scope="col">TRATAMIENTO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> 41 (81)</td>
                    <td> <input type="text" class="form-control" id="referido" name="41" value="<?php echo $cuarentayuno; ?>"> </td>
                    <td> 31 (71)</td>
                    <td> <input type="text" class="form-control" id="referido" name="31" value="<?php echo $treintayuno; ?>"> </td>
                </tr>

                <tr>
                    <td> 42 (82)</td>
                    <td> <input type="text" class="form-control" id="referido" name="42" value="<?php echo $cuarentaydos; ?>"> </td>
                    <td> 32 (72)</td>
                    <td> <input type="text" class="form-control" id="referido" name="32" value="<?php echo $treintaydos; ?>"> </td>
                </tr>

                <tr>
                    <td> 43 (83)</td>
                    <td> <input type="text" class="form-control" id="referido" name="43" value="<?php echo $cuarentaytres; ?>"> </td>
                    <td> 33 (73)</td>
                    <td> <input type="text" class="form-control" id="referido" name="33" value="<?php echo $treintaytres; ?>"> </td>
                </tr>

                <tr>
                    <td> 44 (84)</td>
                    <td> <input type="text" class="form-control" id="referido" name="44" value="<?php echo $cuarentaycuatro; ?>"> </td>
                    <td> 34 (74)</td>
                    <td> <input type="text" class="form-control" id="referido" name="34" value="<?php echo $treintaycuatro; ?>"> </td>
                </tr>

                <tr>
                    <td> 45 (85)</td>
                    <td> <input type="text" class="form-control" id="referido" name="45" value="<?php echo $cuarentaycinco; ?>"> </td>
                    <td> 35 (75)</td>
                    <td> <input type="text" class="form-control" id="referido" name="35" value="<?php echo $treintaycinco; ?>"> </td>
                </tr>

                <tr>
                    <td> 46 </td>
                    <td> <input type="text" class="form-control" id="referido" name="46" value="<?php echo $cuarentayseis; ?>"> </td>
                    <td> 36</td>
                    <td> <input type="text" class="form-control" id="referido" name="36" value="<?php echo $treintayseis; ?>"> </td>
                </tr>

                <tr>
                    <td> 47 </td>
                    <td> <input type="text" class="form-control" id="referido" name="47" value="<?php echo $cuarentaysiete; ?>"> </td>
                    <td> 37</td>
                    <td> <input type="text" class="form-control" id="referido" name="37" value="<?php echo $treintaysiete; ?>"> </td>
                </tr>

                <tr>
                    <td> 48 </td>
                    <td> <input type="text" class="form-control" id="referido" name="48" value="<?php echo $cuarentayocho; ?>"> </td>
                    <td> 38</td>
                    <td> <input type="text" class="form-control" id="referido" name="38" value="<?php echo $treintayocho; ?>"> </td>
                </tr>
            </tbody>
        </table>    
        </div>

        <div class="form-group col-sm-6 col-md-12">
            <p class="h6" style="font-size:20px;color: rgba(144, 12, 52);"> Tratamientos Generales</p>
            <textarea class="form-control" name="tratamiento_general" required rows="2" style="resize: none;"><?php echo $generles; ?></textarea>
        </div>

        <div class="col-12 text-center">
            <input  class = "btn btn-success" type="submit" value="Aceptar" name = "btnEnviar">
        </div>
        <br>
    </form>
</div>
</body>
</html>
<?php include("footer.php"); ?>


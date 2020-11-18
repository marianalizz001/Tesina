

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
                    <td> <input type="text" class="form-control" id="referido" name="11"> </td>
                    <td> 21 (61)</td>
                    <td> <input type="text" class="form-control" id="referido" name="21"> </td>
                </tr>

                <tr>
                    <td> 12 (52)</td>
                    <td> <input type="text" class="form-control" id="referido" name="12"> </td>
                    <td> 22 (63)</td>
                    <td> <input type="text" class="form-control" id="referido" name="22"> </td>
                </tr>

                <tr>
                    <td> 13 (53)</td>
                    <td> <input type="text" class="form-control" id="referido" name="13"> </td>
                    <td> 23 (63)</td>
                    <td> <input type="text" class="form-control" id="referido" name="23"> </td>
                </tr>

                <tr>
                    <td> 14 (54)</td>
                    <td> <input type="text" class="form-control" id="referido" name="14"> </td>
                    <td> 24 (64)</td>
                    <td> <input type="text" class="form-control" id="referido" name="24"> </td>
                </tr>

                <tr>
                    <td> 15 (55)</td>
                    <td> <input type="text" class="form-control" id="referido" name="15"> </td>
                    <td> 25 (65)</td>
                    <td> <input type="text" class="form-control" id="referido" name="25"> </td>
                </tr>

                <tr>
                    <td> 16 </td>
                    <td> <input type="text" class="form-control" id="referido" name="16"> </td>
                    <td> 26</td>
                    <td> <input type="text" class="form-control" id="referido" name="26"> </td>
                </tr>

                <tr>
                    <td> 17 </td>
                    <td> <input type="text" class="form-control" id="referido" name="17"> </td>
                    <td> 27</td>
                    <td> <input type="text" class="form-control" id="referido" name="27"> </td>
                </tr>

                <tr>
                    <td> 18</td>
                    <td> <input type="text" class="form-control" id="referido" name="18"> </td>
                    <td> 28</td>
                    <td> <input type="text" class="form-control" id="referido" name="28"> </td>
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
                    <td> <input type="text" class="form-control" id="referido" name="41"> </td>
                    <td> 31 (71)</td>
                    <td> <input type="text" class="form-control" id="referido" name="31"> </td>
                </tr>

                <tr>
                    <td> 42 (82)</td>
                    <td> <input type="text" class="form-control" id="referido" name="42"> </td>
                    <td> 32 (72)</td>
                    <td> <input type="text" class="form-control" id="referido" name="32"> </td>
                </tr>

                <tr>
                    <td> 43 (83)</td>
                    <td> <input type="text" class="form-control" id="referido" name="43"> </td>
                    <td> 33 (73)</td>
                    <td> <input type="text" class="form-control" id="referido" name="33"> </td>
                </tr>

                <tr>
                    <td> 44 (84)</td>
                    <td> <input type="text" class="form-control" id="referido" name="44"> </td>
                    <td> 34 (74)</td>
                    <td> <input type="text" class="form-control" id="referido" name="34"> </td>
                </tr>

                <tr>
                    <td> 45 (85)</td>
                    <td> <input type="text" class="form-control" id="referido" name="45"> </td>
                    <td> 35 (75)</td>
                    <td> <input type="text" class="form-control" id="referido" name="35"> </td>
                </tr>

                <tr>
                    <td> 46 </td>
                    <td> <input type="text" class="form-control" id="referido" name="46"> </td>
                    <td> 36</td>
                    <td> <input type="text" class="form-control" id="referido" name="36"> </td>
                </tr>

                <tr>
                    <td> 47 </td>
                    <td> <input type="text" class="form-control" id="referido" name="47"> </td>
                    <td> 37</td>
                    <td> <input type="text" class="form-control" id="referido" name="37"> </td>
                </tr>

                <tr>
                    <td> 48 </td>
                    <td> <input type="text" class="form-control" id="referido" name="48"> </td>
                    <td> 38</td>
                    <td> <input type="text" class="form-control" id="referido" name="38"> </td>
                </tr>
            </tbody>
        </table>    
        </div>

        <div class="form-group col-sm-6 col-md-12">
            <p class="h6" style="font-size:20px;color: rgba(144, 12, 52);"> Tratamientos Generales</p>
            <textarea class="form-control" name="tratamiento_general" required rows="2" style="resize: none;" ></textarea>
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


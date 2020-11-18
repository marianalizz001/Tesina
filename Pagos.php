
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

    <title>Dra.YazminNajera | Inventario</title>

    <?php include("navbar.php"); ?>
    <br>

</head>

<body>
    <div class="container" id="registro">
        <div class="row">
            <div class="col-12" id="barra_servicio">
                <A class="h2 align-middle text-center" name="servicios" id="servicio">Añadir Pago a la Cita</A>
            </div>
        </div>
        <?php
        $idCita=$_POST['idCita'];
        $idUsuario=$_SESSION['id'];
        ?>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-6">
                    <form action="PagosPHP.php" method="post">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="monto" style="font-size:20px;color: rgba(144, 12, 52);"> Monto: </label>
                            </div>
                            <div class="col-6">
                                <input type="number" step="any" class="form-control" id="monto" name="monto">
                            </div>
                        </div>
                        <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                            <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                        '?>
                        <br><br>
                        <input class="btn btn-success" type="submit" value="Añadir Monto" name="btnEnviar">
                    </form>
                    
                </div>
                <div class="col-6">
                        <img src="img/pesos.jpg" alt="Dinero" width="400px">
                        
                    </div>
            </div>

            <br><br><br><br><br>
        </div>

    </div>

</body>

</html>
<?php include("footer.php"); ?>
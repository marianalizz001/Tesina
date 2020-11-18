
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
                <A class="h2 align-middle text-center" name="servicios" id="servicio">Añadir Producto al Inventario</A>
            </div>
        </div>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-6">
                    <form action="InventarioAltaPHP.php" method="post">
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="nombre-producto" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre del Producto: </label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="nombre-producto" name="nombre-producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="existencia" style="font-size:20px;color: rgba(144, 12, 52);"> Cantidad Inicial: </label>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" id="existencia" name="existencia">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="precio" style="font-size:20px;color: rgba(144, 12, 52);"> Precio: </label>
                            </div>
                            <div class="col-6">
                                <input type="number" step="any" class="form-control" id="precio" name="precio">
                            </div>
                        </div>
                        <br><br>
                        <input class="btn btn-success" type="submit" value="Añadir Producto" name="btnEnviar">
                    </form>
                    
                </div>
                <div class="col-6">
                        <img src="img/inventario.jpg" alt="Inventario" width="400px">
                        
                    </div>
            </div>

            <br><br><br><br><br>
        </div>

    </div>

</body>

</html>
<?php include("footer.php"); ?>
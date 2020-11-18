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
     
    <title>Dra.YazminNajera | Atributo</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
<br><br>
<div class="container">
    <form action="AtributoEliminarPHP.php" method="post" enctype="multipart/form-data">
        <p class="h4"> Eliminar Atributo</p><br><br>
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-4">
                <label for="usuario" style="font-size:20px;color: rgba(144, 12, 52);"> Nombre: </label>
                <select id="nombre" class="form-control" name="nombre" required>
                    <option selected>Selecciona ... </option>
                            <?php 
                                    $query = "describe usuario";
                                    $resultado = mysqli_query($conexion, $query);
                                    while($row = $resultado->fetch_assoc()){
                                        if ($row['Field'] != 'idUsuario'){
                                ?>
                            <option value="<?php echo $row['Field'];?>"><?php echo $row['Field'];?></option>
                                <?php
                                }
                            }
                                ?>
                    </select>
            </div>
        </div>
        <br>
        <div class="text-center">
            <input  class = "btn btn-success" type="submit" value="Enviar" name = "btnEnviar">
        </div>
        <br><br><br><br><br><br><br><br>
    </form>
</div>

</body>
  
</html>
<?php include("footer.php"); ?>


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
    <link href="css/sweetalert.css" rel="stylesheet">

    <title>Dra.YazminNajera | Paciente</title>

    <?php include("navbar.php"); ?>
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type="text/javascript">

$(document).ready(function () {

(function ($) {

    $('#filtrar').keyup(function () {

        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();

    })

}(jQuery));
});

</script>

</head>
<body>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th scope="col">Opciones</th>
                <th scope="col">Nombre</th>
                <th scope="col">Servicio</th>
                <th scope="col">Fecha/Hora</th>
            </tr>
        </thead>
        <tbody class="buscar" style="padding-top: 40px; width:100%;">

        <?php
            include ('Conexion.php');

            $consulta = $bd->Cita->find(
                [
                ]
            );

            foreach ($consulta as $act){
                $id = $act['_id'];
                $idUsuario = $act['Usuario_idUsuario'];
                $title = $act['title'];
                $nombre = $act['nombre'];
                $color = $act['color'];
                $start = $act['start'];
                $estatus = $act['estatus'];
                if($estatus == NULL || $estatus == 0){
                    echo'
                    <td>    
                      <a href="EventosEditar.php?id='.$id.'"><img src="img/editar.webp" width="25" height="25"></a>
                      <a href="EliminarCitaPHP.php?id='.$id.'"><img src="img/borrar.png" width="25" height="25"></a>
                    <td>';
                        echo '</td>
                        <td>' .$nombre.'</td>
                        <td>' .$title.'</td>
                        <td>' .$start. '</td>
                    </tr>'; 
                }      
            }
        ?>            
        </tbody>
    </table>
</div>
    
</body>
</html>
<?php include("footer.php"); ?>
<script src="js/jquery.slim.js"></script>
<script src="js/scripts.js"></script>

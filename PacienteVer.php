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
<div class="col-sm-12 col-md-4" style="float: right !important;">
      <div class="input-group" style="margin-top:20px; padding-bottom:10px;">
        <span class="input-group-addon">Buscar&nbsp;&nbsp;</span>
        <input id="filtrar" type="text" class="form-control" placeholder="">
      </div>
    </div>
</div>


<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th scope="col"><span><i class="fas fa-camera fa-lg"></i></span></th>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody class="buscar" style="padding-top: 40px; width:100%;">

        <?php
            include ('Conexion.php');

            $consulta = $bd->Usuario->find(
                [
                    'tipo_usuario' => 'P',
                    'f_baja' => array('$exists' => false)
                ]
            );

            foreach ($consulta as $act){
                $idUsuario = $act['_id'];
                $usuario = $act['usuario'];
                $nombre = $act['nombre'];
                $apPat = $act['apPat'];
                $apMat = $act['apMat'];
                $correo = $act['correo'];
                $foto = "Usuarios/Fotos/".$act['foto'];
    
                    echo'
                    <td>    
                      <a href="PacienteEditar.php?idUsuario='.$idUsuario.'"><img src="img/editar.webp" width="25" height="25"></a>
                      <a href="UsuarioBorrar.php?idUsuario='.$idUsuario.'"><img src="img/borrar.png" width="25" height="25"></a>
                    <td>';
                        if ($foto == "Usuarios/Fotos/"){
                            echo '<img src="img/perfil.png" width="80" height="80">';
                        }
                        else{
                            echo '<img src=' .$foto.' width="80" height="80">';
                        }
                        echo '</td>
                        <td>' .$usuario.'</td>
                        <td>' .$nombre. " " .$apPat. " " .$apMat.'</td>
                        <td>' .$correo. '</td>
                    </tr>';                
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

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
 
	<script>
	$(document).ready(function() {
		$("a.l1s").click(function(){
			id = $(this).parents("tr").find("td").eq(0).html();
			alert(id);
		});
	});
	</script>

</head>
<body>
<div class="container">
    <div class="row justify-content-between">
        <div class="col-sm-6 " style="margin-top:20px; padding-bottom:10px;">
            <a class="btn rounded" href="AgregarCita.php"><span class="text"><i class="fa fa-plus-square" aria-hidden="true"></i>   Nueva Cita</span></a>
        </div>
        <div class="col-sm-6 col-sm-3 input-group" style="important!; margin-top:20px; padding-bottom:10px;">
<span class="input-group-addon" style="margin-top:10px;">Buscar&nbsp;&nbsp;</span>
            <input id="filtrar" type="text" class="form-control" placeholder="">
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Opciones</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo de Cita</th>
                <th scope="col">Fecha/Hora</th>
            </tr>
        </thead>
        <tbody class="buscar" style="padding-top: 40px; width:100%;">

        <?php
            include ('Conexion.php');
            date_default_timezone_set('America/Mexico_City');
            $consulta = $bd->Cita->find(array(
                'start' => array('$gte' => date ( "Y-m-d" ))
            ));

            foreach ($consulta as $act){
                $id = $act['_id'];
                $title = $act['title'];
                $nombre = $act['nombre'];
                $start = $act['start'];
                $estatus = $act['estatus'];
                if($estatus == NULL || $estatus == 0){
                    echo'
                    <tr>
                    <td>    
                      <a href="EventosEditar.php?id='.$id.'"><img src="img/editar.webp" width="25" height="25"></a>
                      <a href="EliminarCitaPHP.php?id='.$id.'"><img src="img/borrar.png" width="25" height="25"></a>
                    </td>';
                        echo '
                        <td>' .$nombre.'</td>
                        <td>' .$title.'</td>
                        <td><a href="CitaPHP.php?id='.$id.'">' .$start. '</a></td>
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

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
     
    <title>Dra.YazminNajera | Empleado</title>

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
<div class="container-fluid">
<div class="row">
<div class="col-xs-12 mx-auto">
          
<?php
    include ('Conexion.php');
    
    $consulta = $bd->Usuario->find(
        [
            'tipo_usuario' => 'E',
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
        $f_nac = $act['f_nac'];
        $telefono = $act['telefono'];
        $rfc = $act['rfc'];
        $salario = $act['salario'];
        $foto = "Usuarios/Fotos/".$act['foto'];
        $curriculum = "Empleados/Curriculums/".$act['curriculum'];

        echo'
            <div class="card mb-3" style="max-width: 800px;">
                <div class="row no-gutters">
                    <div class="col-md-4">';
                    if ($foto == "Usuarios/Fotos/"){
                        echo '<img src="img/perfil.png" class="card-img" alt="...">';
                    }
                    else{
                        echo '<img src='.$foto.' class="card-img" alt="...">';
                    }
                    echo'
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">'. $nombre. " ".$apPat." ".$apMat.'</h4>
                            <p class="card-text">
                                <small class="text-muted">Usuario: </small>
                                '.$usuario.'<br>
                                <small class="text-muted">Correo: </small>
                                '.$correo.'<br>
                                <small class="text-muted">Fecha de Nacimiento: </small>
                                '.$f_nac.'<br>
                                <small class="text-muted">Teléfono: </small>
                                '.$telefono.'<br>
                                <small class="text-muted">RFC: </small>
                                '.$rfc.'<br>
                                <small class="text-muted">Salario: </small>
                                '.$salario.'<br>
                                <small class="text-muted">Curriculum: </small>';
                                if ($curriculum == "Empleados/Curriculums/")
                                    echo 'No disponible<br>';
                                else
                                    echo '<a href='.$curriculum.' target="_blank">Descargar</a><br>';
                                echo'
                                    <a href="EmpleadoEditar.php?idUsuario='.$idUsuario.'"><img src="img/editar.webp" width="25" height="25"></a></button></a>
                                    <a href="UsuarioBorrar.php?idUsuario='.$idUsuario.'"><img src="img/borrar.png" width="25" height="25"></a></button></a>';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
      <?php    
    } 
?>    

</div>
</div>
</div>

</body>
  
</html>
<?php include("footer.php"); ?>


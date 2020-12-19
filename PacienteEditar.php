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
    <link href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" rel="stylesheet"/>

    <link rel="stylesheet" href="css/style.css">
     
    <title>Dra.YazminNajera | Paciente</title>

    <?php include("navbar.php"); include('Conexion.php');?>
    <br>
  </head>

<body>
<?php
    include ('Conexion.php');
?>


<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: rgba(246, 131, 40);">
<?php if (isset($_SESSION['usuario'])){?>
  <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true" onclick="history.back()" style="color: #6B8C52; padding-right: 10px;"></i>
<?php } ?>
  <a class="float-right" class="navbar-brand" href="index.php"><img src="img/manzana.png" width="55" height="55" alt=""></a><b style="color: white;">Nutrición Vida</b>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto" id="ejm2">

    <!-- MENU GENERAL -->

    <?php if (!isset($_SESSION['usuario']) || ($_SESSION['log'] == false)){ ?>
      
    <?php }elseif (isset($_SESSION['usuario']) && ($_SESSION['log'] == true)) { ?>
<!-- MENU CON LOGIN -->
    <?php if ($_SESSION['tipo'] == 'N'){ ?>
      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="Inicio.php"><h5>Inicio</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="PerfilUsuario.php"><h5>Perfil</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="PacienteVer.php"><h5>Pacientes</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="EditarCita.php"><h5>Citas</h5><span class="sr-only">(current)</span></a>
      </li>

      <?php } ?>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><span><i class="fas fa-sign-out-alt fa-2x" style="color: #6B8C52;"></i></span></a>
      </li>

  <?php } ?>

   </div>
</nav>
<br>
<?php $idUsuario = $_REQUEST['idUsuario']; ?>

<div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                H I S T O R I A  -  C L I N I C A
                </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                <?php echo'
                    <iframe class="col-lg-12 col-md-12 col-sm-12" src="Reportes/HistoriaClinica.php?idUsuario='.$idUsuario.'" height="600"></iframe>';?>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                 P E R F I L
                </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <?php include("Perfil.php")?>
                </div>
            </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                <button class="btn btn-outline-secondary" type="button" style="width: 300px;"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                 C I T A S
                </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <div class="container" id="registro">
                <div class="row">

                    <div class="col-12" id="barra_servicio">
                        <A class="h2 align-middle text-center" name="servicios" id="servicio">Citas del Paciente </A>
                    </div>
                </div>
                    <br>
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Fecha de la cita</th>
                                        <th scope="col">Detalles</th>
                                        <th scope="col">Seguimiento</th>
                                    </tr>
                                </thead>
                                <tbody class="buscar" style="padding-top: 40px; width:100%;">

                                <?php                                    
                                    $consulta = $bd->Cita->find([
                                      'Usuario_idUsuario' => new \MongoDB\BSON\ObjectID($idUsuario)
                                    ]);
                                    
                                    foreach ($consulta as $act){
                                        $idCita = (string)$act['_id'];
                                        $nombre = $act['nombre'];
                                        $fecha = $act['start'];
                                        $proc = $act['title'];
                                        $estatus = $act['estatus'];
                                        $seguimiento = $act['seguimiento'];
                                        echo'
                                        <tr>
                                            <td>' .$fecha.'</td>
                                            <td>' .$proc.'</td>';
                                            echo '<td>';
                                            if($seguimiento!=null){                                           
                                            ?>
                                            

                                            <form  action="Reportes/Seguimientos.php" method="post">
                                                <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                '?>
                                                <button onclick=submit title="Visualizar" style="background:transparent;"><strong>Información </strong><i class="fas fa-file"></i></button>
                                            </form>
                                            <?php
                                            }else{
                                                echo 'Aún no existe información';
                                            }
                                            echo'
                                            </td>
                                            
                                        </tr>';
                                          
                                    }
                                    //$resultado -> free();  

                                ?>
                                
                                
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
  
</html>
<?php include("footer.php"); ?>



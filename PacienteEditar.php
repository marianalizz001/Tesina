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
<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: rgba(85, 219, 183, 0.83);">
  <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true" onclick="history.back()" style="color: darkcyan; padding-right: 10px;"></i>
  <a class="float-right" class="navbar-brand" href="index.php"><img src="img/logo.png" width="180" height="50" alt=""></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav ml-auto" id="ejm2">

    <!-- MENU GENERAL -->

    <?php if (!isset($_SESSION['usuario']) || ($_SESSION['log'] == false)){ ?>
      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="index.php"><h5>Inicio</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="nosotros.php"><h5>Nosotros</h5><span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="servicios.php"><h5>Servicios</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="contacto.php"><h5>Contacto</h5><span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item"  data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="ayuda.php"><i class="fa fa-question-circle fa-2x" style="color: darkcyan;" aria-hidden="true"></i></a>
      </li>

      <li class="nav-item"  data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="login.php"><i class="fa fa-user fa-2x" style="color: darkcyan;" aria-hidden="true"></i></a>
      </li>
    <?php }elseif (isset($_SESSION['usuario']) && ($_SESSION['log'] == true)) { ?>
<!-- MENU CON LOGIN -->
    <?php if ($_SESSION['tipo'] == 'M' || $_SESSION['tipo'] == 'E' || $_SESSION['tipo'] == 'P'){ ?>
      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="Inicio.php"><h5>Inicio</h5><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="PerfilUsuario.php"><h5>Perfil</h5><span class="sr-only">(current)</span></a>
      </li>

    <?php } ?>

    <?php if (($_SESSION['tipo'] == 'M') || ($_SESSION['tipo'] == 'E')){ ?>
      <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="mensajes.php"><h5>Mensajes</h5><span class="sr-only">(current)</span></a>
    </li>
      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Citas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
        <a class="dropdown-item" href="Citas.php">Ver</a>
        <a class="dropdown-item" href="AgregarCita.php">Agendar</a>
        <a class="dropdown-item" href="EditarCita.php">Editar/Eliminar</a>  
        </div>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Paciente
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="PacienteVer.php">Ver</a>
          <a class="dropdown-item" href="PacienteAlta.php">Alta</a>
        </div>
      </li>
      <?php } ?>

      <?php if ($_SESSION['tipo'] == 'M'){ ?>
      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Empleado
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="EmpleadoVer.php">Ver</a>
          <a class="dropdown-item" href="EmpleadoAlta.php">Alta</a>
        </div>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Inventario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="InventarioVer.php">Listado</a>
          <a class="dropdown-item" href="InventarioAlta.php">Agregar</a>
        </div>
      </li>

      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Reportes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
          <a class="dropdown-item" href="Reportes/MsgContestados.php" target="_blank">Msg Contestados</a>
          <a class="dropdown-item" href="Reportes/MsgPendientes.php" target="_blank">Msg Pendientes</a>
          <a class="dropdown-item" href="Reportes/ListadoEmpleados.php" target="_blank">Empleados</a>
          <a class="dropdown-item" href="Reportes/HistorialProductos.php" target="_blank">Inventario</a> 
          <a class="dropdown-item" href="Reportes/PacientesBaja.php" target="_blank">Pacientes Baja</a>          
        </div>
      </li>

      <?php } ?>

      <?php if ($_SESSION['tipo'] == 'P'){ ?>
        <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Citas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
        <a class="dropdown-item" href="CitaVer.php">Agendar</a> 
        </div>
      </li>

      <?php } ?>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><span><i class="fas fa-sign-out-alt fa-2x" style="color: darkcyan;"></i></span></a>
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
                    <iframe class="col-lg-12 col-md-12 col-sm-12" src="Reportes/HistoriaClinica.php?idUsuario='.$idUsuario.'" height="600"></iframe>'; ?>
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
                                        <th scope="col">Procedimiento a realizar</th>
                                        <th scope="col">¿Asistió?</th>
                                        <th scope="col">Odontograma</th>
                                        <th scope="col">Monto</th>
                                    </tr>
                                </thead>
                                <tbody class="buscar" style="padding-top: 40px; width:100%;">

                                <?php
                                    include ('Conexion.php');
                                    $idUsuario=$_GET['idUsuario'];
                                    $consulta = $bd->Cita->find([
                                      'Usuario_idUsuario' => new \MongoDB\BSON\ObjectID($idUsuario)
                                    ]);
                                    
                                    foreach ($consulta as $act){
                                      ?>
                                    <script>console.log("si entra");</script>
                                    <?php
                                        $idCita = (string)$act['_id'];
                                        $nombre = $act['nombre'];
                                        $fecha = $act['start'];
                                        $proc = $act['title'];
                                        $estatus = $act['estatus'];
                                        $odontograma = $act['odontograma'];
                                        echo'
                                        <tr>
                                            <td>' .$fecha.'</td>
                                            <td>' .$proc.'</td>
                                            <td>';
                                            if($estatus==null){
                                            ?>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <form id="miFormulario1" action="PacienteEditarPHP.php" method="post">
                                                            <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                                        <input type="hidden" name="opc" id="opc" value="1"> 
                                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'"> 
                                                            '?>

                                                            <button id="estatus" onclick=submit title="Asistió"><i class="fas fa-check-circle" style="color:green;background-color:transparent "></i></button>
                                                        </form>
                                                    </div>
                                                    <div class="col-6">
                                                        <form id="miFormulario2" action="PacienteEditarPHP.php" method="post">
                                                            <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                                        <input type="hidden" name="opc" id="opc" value="0"> 
                                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                            '?>

                                                            <button id="estatus" onclick=submit title="No asistió"><i class="fas fa-times-circle" style="color:red;"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <?php
                                            }elseif($estatus=="1"){
                                                echo "<strong style='color: green;'>Asistió</strong>";

                                            }else{
                                                echo "<strong style='color: red;'>No asistió</strong>";

                                            }
                                            echo '</td>
                                            <td>';
                                            if($odontograma==null && $estatus!='0'){                                           
                                            ?>

                                            <form id="miFormulario3" action="PacienteAlta9.php" method="post">
                                                <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                    <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                '?>
                                                <button onclick=submit title="Ir a odontograma" style="background:transparent;"><strong>Odontograma </strong><i class="fas fa-teeth-open"></i></button>
                                            </form>
                                            <?php
                                            }elseif($odontograma!=null && $estatus!='0'){
                                                ?>
                                                <form id="miFormulario3" action="PacienteOdontograma.php" method="post">
                                                    <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                    '?>
                                                    <button onclick=submit title="Ir a odontograma" style="background:rgba(85, 219, 183, 0.83);"><strong>Odontograma </strong><i class="fas fa-teeth-open"></i></button>
                                                </form>
                                            <?php
                                            }else{
                                                echo 'No hay odontograma';
                                            }
                                            echo'
                                            </td>
                                            <td>';
                                            if($estatus!='0'){
                                              $a=0;
                                              $consulta2 = $bd->Pagos->find([
                                                'Cita_idCita' => $idCita
                                              ]);
                                                /*$consuta2= "SELECT * from pagos where cita_idcita=$idCita";
                                                if(! $resultado2 = $conexion -> query($instruccion2)){
                                                    echo "Ha sucedido un problema ... ";
                                                    exit();
                                                }
                                                $act2 = $resultado2 -> fetch_assoc();*/
                                            // print_r($consulta2);
                                                foreach ($consulta2 as $act2){
                                                  ?>
                                                <script>console.log("tambieeeeeen si entra");</script>
                                                <?php
                                                $monto= $act2['monto'];
                                                $a=1;
                                                if($monto>0){
                                                  echo "$",$monto,".00";
                                                    ?>
                                                        <form id="miFormulario4" action="Reportes/GenerarTicket.php" method="post">
                                                        <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                        <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                                    '?>
                                                        <button onclick=submit title="Generar Reporte"><i class="fas fa-money-check-alt" style="color:orange;"></i></button>
                                                    </form>
                                                    <?php 
                                                }else{
                                                  ?>
                                                  <form id="miFormulario4" action="Pagos.php" method="post">
                                                  <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                  <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                              '?>
                                                  <button onclick=submit title="Agregar monto"><i class="fas fa-money-bill-wave" style="color:#136303;"></i></button>
                                              </form>
                                              <?php
                                                }
                                              }
                                              if($a==0 && $estatus==1){
                                                ?>
                                                  <form id="miFormulario4" action="Pagos.php" method="post">
                                                  <?php echo '<input type="hidden" name="idCita" id="idCita" value="'.$idCita.'"> 
                                                  <input type="hidden" name="idUsuario" id="idUsuario" value="'.$idUsuario.'">
                                              '?>
                                                  <button onclick=submit title="Agregar monto"><i class="fas fa-money-bill-wave" style="color:#136303;"></i></button>
                                              </form>
                                              <?php
                                              }
                                            }else{
                                                echo '$ 0.00';
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



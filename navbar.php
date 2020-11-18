<?php
    session_start(); 
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
        </div>
      </li>

      <?php } ?>

      <?php if ($_SESSION['tipo'] == 'P'){ ?>
        <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Citas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
        <a class="dropdown-item" href="Citas.php">Ver</a>
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


<br><br>

<script src="js/jquery.slim.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
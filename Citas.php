<?php 
  include("compruebo.php");
  include("Conexion.php");
?>
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
     
    <title>Dra.YazminNajera | Paciente</title>
    <br>
  <script src='js/jquery.min.js'></script>
<script src='js/moment.min.js'></script>
<!--Full Calendar-->
<link rel='stylesheet' type='text/css' href='css/fullcalendar.min.css' />
<script src='js/fullcalendar.min.js'></script>
<script src="js/es.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  </head>

<style>
    .fc th {
        padding: 10px 0px;
        vertical-align: middle;
        background: #F2F2F2;
    }

    #txtHora2 {
        border: 0;
    }

</style>

<body>
<?php
    
    include ('Conexion.php');
?>
<!--Navbar-->
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
    
      <!--<li class="nav-item" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="AgendarCitaGeneral.php"><h5>Agendar Cita</h5><span class="sr-only">(current)</span></a>
      </li>-->

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
    
     <!-- <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link" href="Citas.php" role="button" style="font-size:18px;color:white;">
          Citas
        </a>
      </li>-->
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
]
      <li class="nav-item dropdown" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:18px;color:white;">
          Citas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="submenu">
        <a class="dropdown-item" href="Citas.php">Ver</a>
        <a class="dropdown-item" href="CitaVer.php">Agendar</a> 
        </div>
      </li>

        <li class="nav-item active" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse">
          <a class="nav-link" href="Inicio.php"><h5>Saldo</h5><span class="sr-only">(current)</span></a>
        </li>
      <?php } ?>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><span><i class="fas fa-sign-out-alt fa-2x" style="color: darkcyan;"></i></span></a>
      </li>

  <?php } ?>

   </div>
</nav>


<br><br>

<br>
    <!-- Muestra el calendario-->
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-9">
                <div id="Calendario"></div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <script>
        /*Muestra los botones para cambiar el mes, el titulo(mes) y da la opcion de elegir el mes, la semana */
        
        $(document).ready(function() {
            $('#Calendario').fullCalendar({
                header: {
                    left: 'today ,prev, next',
                    center: 'title',
                    right: 'month'
                },
                dayClick: function(date, jsEvent, view) {
                    /*Activa el boton de agregar, para solo poder modificar o eliminar el evento, limpia el formulario y manda llamar al modal*/
                   // limpiarFormulario();
                    $('#btnAgregar').prop("disabled", false);
                    $('#btnModificar').prop("disabled", true);
                    $('#btnEliminar').prop("disabled", true);
                    $('#txtNombre').prop("disabled", true);
                    $('#txtHora2').prop("disabled", true);
                    $('#txtHora').prop("disabled", true);
                    $('#txtFecha').val(date.format());
                    $("#ModalEventos").modal();
                },
                /*Manda llamar al documento eventos.php que es el que hace las consultas*/
                events: 'http://localhost/BasedeDatos/eventos.php',

                hiddenDays: [0],

                eventLimit: true,
                allDaySlot: false,
                
                minTime: '10:00:00',
                maxTime: '20:00:00',

                plugins: ['timeGrid'],


               bussinesHours: {
                 daysOfWeek: [1, 2, 3, 4],
                 startTime: '10:00',
                 endTime: '16:00',
               },

                //slotDuration: '01:00:00',
                eventClick: function(calEvent, jsEvent, view) {
                    /*Activa los botones de modificar y eliminar para que solo se puedan agregar*/
                    $('#btnAgregar').prop("disabled", true);
                    $('#btnModificar').prop("disabled", false);
                    $('#btnEliminar').prop("disabled", false);
                    $('#txtNombre').prop("disabled", true);
                    $('#txtHora').prop("disabled", true);
                    $('#txtTitulo').prop("disabled", true);



                    //Mostrar la innfo del evento en los inputs
                    
                    $('#txtID').val(calEvent.id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtNombre').val(calEvent.nombre);
                    $('#txtColor').val(calEvent.color);
                    FechaHora = calEvent.start._i.split(" ");
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);
                    $("#ModalEventos").modal();
                },
                editable: true,
                eventDrop: function(calEvent) {
                    $('#txtID').val(calEvent.id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtNombre').val(calEvent.nombre);
                    $('#txtColor').val(calEvent.color);

                    var fechaHora = calEvent.start.format().split("T");
                    $('#txtFecha').val(fechaHora[0]);
                    $('#txtHora').val(fechaHora[1]);

                    RecolectarDatos();
                    EnviarInformacion('modificar', NuevoEvento, true);
                }

            });
        });

    </script>
    <!-- Modal (Eliminar, modificar y agregar) -->
    <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Citas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="txtID" name="textID">
                    <input type="hidden" id="txtFecha" name="txtFecha" />
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Nombre:</label>
                            <select class="form-control" name="txtNombre" id="txtNombre">
                            <option value="Nuevo paciente">Cita disponible</option>
                            <?php
                            //Recupera el nombre de los pacientes
                            include ('Conexion.php');
                           $consulta = $bd->Usuario->find();
                              foreach ($consulta as $act){
                                $id = $act['_id'];
                                $nombre = $act['nombre'];
                                $apPat = $act['apPat'];
                                $apMat = $act['apMat'];
                                echo '<option value="'.$nombre. " " .$apPat. " " .$apMat.'">'.$nombre. " " .$apPat. " " .$apMat.'</option>';

                              }
                              //$resultado -> free();  

                            ?>           
                            </select>
                            
                        </div>

                        <div class="form-group col-md-4">
                            <label>Hora de la cita:</label>
                            <select class="form-control" name="txtHora" id="txtHora">
                                <option select></option>
                                <option>10:00:00</option>
                                <option>11:00:00</option>
                                <option>16:00:00</option>
                                <option>17:00:00</option>
                                <option>18:00:00</option>
                                <option>19:00:00</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-row">
                        <label>Servicios:</label>
                        <select class="form-control" name="txtTitulo" id="txtTitulo">
                            <option>Ortodoncia</option>
                            <option>Protesis</option>
                            <option>Estetica dental</option>
                            <option>Higiene</option>
                            <option>Prevencion</option>
                            <option>Odontopediatria</option>
                            <option>Endodoncia</option>
                            <option>Peridoncia</option>
                            <option>Cirugia dental</option>
                            <option>Otros</option>
                        </select>
                    </div>
                    <br>
                </div>
              <!--  <div class="modal-footer">
                    <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                    <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                    <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>-->
            </div>
        </div>
    </div>

    <script>
        /*Recolecta los datos manda llamar a la funcion Recolectar datos y envia la instruccion de lo que se desea hacer*/
        var NuevoEvento;
        $('#btnAgregar').click(function() {
          console.log("Esto es un mensaje en la consola");
            RecolectarDatos();
            EnviarInformacion('agregar', NuevoEvento);
          console.log(NuevoEvento);
            
        });
        $('#btnEliminar').click(function() {
            RecolectarDatos();
            EnviarInformacion('eliminar', NuevoEvento);
        });
        $('#btnModificar').click(function() {
            RecolectarDatos();
            EnviarInformacion('modificar', NuevoEvento);
        });


        function RecolectarDatos() {
            /*Recolecta los datos de los inputs para luego hacer las consultas*/
            if ( $('#txtTitulo').val() == "Ortodoncia"){
               $color="#0080ff";
            }
            if ( $('#txtTitulo').val() == "Protesis"){
               $color="#ff8000";
            }
            if ( $('#txtTitulo').val() == "Estetica dental"){
               $color="#ce00ce";
            }
            if ( $('#txtTitulo').val() == "Higiene"){
               $color="#00df52";
            }
            if ( $('#txtTitulo').val() == "Prevencion"){
               $color="#004080";
            }
            if ( $('#txtTitulo').val() == "Odontopediatria"){
               $color="#d5006b";
            }
            if ( $('#txtTitulo').val() == "Endodoncia"){
               $color="#ff0606";
            }
            if ( $('#txtTitulo').val() == "Peridoncia"){
               $color="#1B743A";
            }
            if ( $('#txtTitulo').val() == "Cirugia dental"){
               $color="#a80b0b";
            }
            if ( $('#txtTitulo').val() == "Otros"){
               $color="#000000";
            }
            if ($('#txtHora').val() == "10:00:00"){
              $horafin="11:00:00";
            } 
            if ($('#txtHora').val() == "11:00:00"){
              $horafin="12:00:00";
            }
            if ($('#txtHora').val() == "16:00:00"){
              $horafin="17:00:00";
            }
            if ($('#txtHora').val() == "17:00:00"){
              $horafin="18:00:00";
            }
            if ($('#txtHora').val() == "18:00:00"){
              $horafin="19:00:00";
            }
            if ($('#txtHora').val() == "19:00:00"){
              $horafin="20:00:00";
            }
            NuevoEvento = {
                id: $('#txtID').val(),
                title: $('#txtTitulo').val(),
                nombre: $('#txtNombre').val(),
                start: $('#txtFecha').val() + " " + $('#txtHora').val(),
                color: $color,
                textColor: "#FFFFFF",
                end: $('#txtFecha').val() + " " + $horafin,
            };
        }
        
        function EnviarInformacion(accion, objEvento, modal) {
            /*Envia la info usando ajax*/
            $.ajax({
                type: 'POST',
                url: 'eventos.php?accion=' + accion,
                data: objEvento,
                success: function(msj) {
                    if (msj) {
                        $('#Calendario').fullCalendar('refetchEvents');
                        if (!modal) {
                            $("#ModalEventos").modal('toggle');
                        }
                    }
                },
                error: function() {
                    alert: ('Hay un error...');
                }

            });
            
        }

        function limpiarFormulario() {
            /*Limpia el formulario */
            $('#txtID').val('');
            $('#txtTitulo').val('');
            $('#txtNombre').val('');
            $('#txtColor').val('');
            $('#txtHora').val('');
            $('#txtMonto').val('');
            $('#txtEstatus').val('');
            $('#txtOdonto').val('');
        }

    </script>
<br>
<br>
<br>
</body>

</html>

<?php include("footer.php"); ?>


<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    session_start();
    include ('Conexion.php');

	$idUsuario= $_SESSION['id'];
	if($_REQUEST['nom_paciente']==""){
		$Nombre = $_REQUEST['nombre'];
	}else{
		$Nombre = $_REQUEST['nom_paciente'];
	}
	$Fecha=$_REQUEST['fecha_cita'];
	$Hora= $_REQUEST['txtHora'];
	$Titulo= $_REQUEST['txtTitulo'];
	$Fecha_Inicial = $Fecha." ".$Hora;
	$Fecha_Final = $Fecha." ".$Hora;

	$consulta2 = $bd->Cita->find([]);
	$b=0;
	foreach ($consulta2 as $act){
		$BD = $act['start'];
		$fechacompleta =explode(" ", $act['start']); 
		$fecha=$fechacompleta[0];
		$diaSemana = date('w', strtotime($Fecha));
		$hoy=date('Y-m-d');
		if($BD==$Fecha_Inicial){
			$b=1;
		}
		if($diaSemana==5){
			$b=1;
		}
		if($diaSemana==0){
			$b=1;
		}

	}
	if($b==0){
		$consulta = $bd->Cita->insertOne([
			'title' => $Titulo,
			'nombre' => $Nombre,
			'start' => $Fecha_Inicial,
			'end' => $Fecha_Final,
			'estatus' => NULL,
			'seguimiento' => NULL,
	   ]);
		if($consulta->getInsertedCount() > 0){
			?>
            <script>
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se han guardado los datos",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "EditarCita.php";
                        }
                    });
            });
            </script>
        <?php 
		} else{
			echo $conexion->error;
		}
	}else{	
        ?>
                <script>
                jQuery(function() {
                    swal({   
                        title: "¡Error!",   
                        text: "Cita NO disponible",   
                        type: "error",    
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Intentar de nuevo",   
                        closeOnConfirm: false}, 
    
                        function(isConfirm){   
                            if (isConfirm) {     
                                window.location.href = "AgregarCita.php";
                            }
                        });
                });
                </script>
            <?php
	 }
	
?>

 	
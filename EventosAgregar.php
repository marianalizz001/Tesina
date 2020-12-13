<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
    session_start();
    include ('Conexion.php');

	$idUsuario= $_SESSION['id'];
	//echo $idUsuario;
	if($_REQUEST['nom_paciente']==""){
		$Nombre = $_REQUEST['nombre'];
	}else{
		$Nombre = $_REQUEST['nom_paciente'];
	}
	//echo $Nombre;
	$Fecha=$_REQUEST['fecha_cita'];
	//echo $Fecha;
	$Hora= $_REQUEST['txtHora'];
	//echo $Hora;
	$Titulo= $_REQUEST['txtTitulo'];
	//echo $Titulo;
	$Fecha_Inicial = $Fecha." ".$Hora;
	//echo $Fecha_Inicial;
	$Fecha_Final = $Fecha." ".$Hora;
	//echo $Fecha_Final;

	if ( $Titulo == "Primera Cita"){
		$color="#0080ff";
	 }
	 if ( $Titulo == "Seguimiento"){
		$color="#ff8000";
	 }

	 $TextColor="#FFFFFF";
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
		if($diaSemana==6 && ($Hora != "10:00:00" || $Hora != "11:00:00") ){
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
			'color' => $color,
			'textColor' => $TextColor,
			'start' => $Fecha_Inicial,
			'end' => $Fecha_Final,
			'estatus' => NULL,
			'odontograma' => NULL,
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
                            window.location.href = "javascript:window.history.back()";
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

 	
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
	$Nombre = $_SESSION['nombre']." ".$_SESSION['apPat'];
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

	if ( $Titulo == "Ortodoncia"){
		$color="#0080ff";
	 }
	 if ( $Titulo == "Protesis"){
		$color="#ff8000";
	 }
	 if ( $Titulo == "Estetica dental"){
		$color="#ce00ce";
	 }
	 if ( $Titulo == "Higiene"){
		$color="#00df52";
	 }
	 if ( $Titulo == "Prevencion"){
		$color="#004080";
	 }
	 if ( $Titulo == "Odontopediatria"){
		$color="#d5006b";
	 }
	 if (	$Titulo == "Endodoncia"){
		$color="#ff0606";
	 }
	 if ( $Titulo == "Peridoncia"){
		$color="#1B743A";
	 }
	 if ( $Titulo == "Cirugia dental"){
		$color="#a80b0b";
	 }
	 if ( $Titulo == "Otros"){
		$color="#000000";
	 }

	 $TextColor="#FFFFFF";
	$consulta2 = $bd->Cita->find([]);
	$b=0;
	foreach ($consulta2 as $act){
		$BD = $act['start'];
		$fechacompleta =explode(" ", $act['start']); 
		$fecha=$fechacompleta[0];
		//$hora=$fechacompleta[1];
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
			'Usuario_idUsuario' => $idUsuario
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
                                window.location.href = "CitaVer.php";
                            }
                        });
                });
                </script>
            <?php
	 }
	
	 /*$conexion = new mysqli ('localhost','root','','Consultorio');
	 $instruccion="select * from cita";
	 if(! $resultado = $conexion -> query($instruccion)){
		 echo "Ha sucedido un problema ... ";
		 exit();
	 }
	 $b=0;
	 while ($act = $resultado -> fetch_assoc()){
		 $BD = $act['start'];
		 $fechacompleta =explode(" ", $act['start']); 
		 $fecha=$fechacompleta[0];
		 $hora=$fechacompleta[1];

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
		$consulta= $conexion->prepare("INSERT into cita(title,nombre,color,textColor,start,end,usuario_idUsuario) values (?,?,?,?,?,?,?)");
		$consulta->bind_param('ssssssi',$Titulo,$Nombre,$color,$TextColor,$Fecha_Inicial,$Fecha_Final,$idUsuario);
		$consulta->execute();
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
                            window.location.href = "CitaVer.php";
                        }
                    });
            });
            </script>
        <?php 
		
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
                                window.location.href = "javascript:window.history.back()";
                            }
                        });
                });
                </script>
            <?php
	 }*/
?>

 	
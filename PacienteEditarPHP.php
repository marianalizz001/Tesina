<link href="css/sweetalert.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
    include("Conexion.php");
    $opc=$_POST['opc'];
    $idCita=$_POST['idCita'];
    $idUsuario=$_POST['idUsuario'];
    $monto=0;
    $fecha=date('d-m-Y H:i:s');

    
    if($opc=='1'){
        $consulta = $bd->Cita->updateOne([
            '_id' => new \MongoDB\BSON\ObjectID($idCita)],
            ['$set' => ['estatus' => '1']
        ],);
       // $instruccion1=$conexion->prepare("UPDATE cita SET estatus='1' where id=$idCita");
        if($consulta->getModifiedCount() > 0){
            ?>
            <script>
                
            jQuery(function() {
                swal({   
                    title: "¡Bien!",   
                    text: "Se han actualizado los datos",   
                    type: "success",    
                    confirmButtonColor: "#696565",   
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false}, 

                    function(isConfirm){   
                        if (isConfirm) {     
                            window.location.href = "PacienteVer.php";
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
                        text: "No se han actualizado los datos",   
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
        }
    }elseif($opc=='0'){
        //$instruccion2=$conexion->prepare("UPDATE cita SET estatus='0' where id=$idCita");
        $consulta2 = $bd->Cita->update([
            '_id' => new \MongoDB\BSON\ObjectID($idCita)],
            ['$set' => ['estatus' => "0"]
            ]);
            if($consulta2->getModifiedCount() == 0){
            //$instruccion3=$conexion->prepare("INSERT into pagos (cita_idCita,usuario_idUsuario,fecha,monto) values ($idCita,$idUsuario,now(),0)");
            
            $consulta3 = $bd->Pagos->insertOne(
                [
                    'Cita_idCita' => $idCita,
                    'Usuario_idUsuario' => $idUsuario,
                    'fecha' => $fecha,
                    'monto' => $monto
                ]
            );
            if($consulta3->getInsertedCount() > 0){
                ?>
                    <script>
                    jQuery(function() {
                        swal({   
                            title: "¡Bien!",   
                            text: "Se han actualizado los datos",   
                            type: "success",    
                            confirmButtonColor: "#696565",   
                            confirmButtonText: "Ok",   
                            closeOnConfirm: false}, 

                            function(isConfirm){   
                                if (isConfirm) {     
                                    window.location.href = "PacienteVer.php";
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
                        text: "No se han actualizado los datos",   
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
        }
    }
}


?>
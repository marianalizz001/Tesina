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

    <title>Dra.YazminNajera | Inventario</title>

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
</head>
<body>

<div class="container" id="registro">
    <div class="row">
        <div class="col-12" id="barra_servicio" width=100%>
            <A class="h2 align-middle text-center" name="servicios" id="servicio">Lista de Productos</A>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="table-responsive col-9">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Existencias</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody class="buscar" style="padding-top: 40px; width:100%;">

                <?php
                    include ('Conexion.php');
                                    
                    $consulta = $bd->Producto->find([
                        'activo' => '1'
                    ]);

                    foreach($consulta as $act){
                        {
                            $id_producto = $act['_id'];
                            $nombre = $act['nombre'];
                            $precio = $act['precio'];
                            $existencia = $act['existencia'];
                            $fecha = $act['fecha'];
                            echo'
                            <tr>    
                                <td>' .$nombre.'</td>
                                <td>' .$existencia.'</td>
                                <td><i class="fas fa-dollar-sign"></i>   ' .$precio.'</td>
                                <td>'
                ?>
                    
                                <form id="miFormulario1" action="InventarioBorrar.php" method="post">
                                    <?php echo '<input type="hidden" name="idProducto" id="idProducto" value="'.$id_producto.'"> 
                                    '?>
                                    <button onclick=submit title="Borrar"><i class="fas fa-trash-alt"></i></button>
                                </form>
                <?php
                echo'
                                </td>
                                <td>'
                ?>
                                <form id="miFormulario2" action="InventarioEditar.php" method="post">
                                        <?php echo '<input type="hidden" name="idProducto" id="idProducto" value="'.$id_producto.'">
                                    '?>
                                    <button onclick=submit title="Editar"><i class="fas fa-edit"></i></button>
                                </form>
                <?php
                echo'
                                </td>
                            </tr>';
                        }
                        
                    }  

                ?>
                
                
                </tbody>
            </table>
        </div>
        
        <div class="col-3" >
        <img src="img/material.jpg" alt="Material" width=100%>
        </div>

    </div>
</div>


<br>
    
</body>
</html>
<?php include("footer.php"); ?>
<script src="js/jquery.slim.js"></script>
<script src="js/scripts.js"></script>
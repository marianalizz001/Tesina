

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

    <?php include("navbar.php"); ?>
    <br>
  </head>

<body>
    <br><br>
    <div class="container">
    <form action="PacienteAltaPHP6.php" method="post" enctype="multipart/form-data">
        <?php $idUsuario = $_REQUEST['idUsuario']; ?>
        <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
        <p class="h4"> Nuevo Paciente - <small>Evaluación Dietética</small></p>
        <hr>
        <p class="h4 justify-content-center" name="parte1"><small>Dieta Habitual</small></p>
        <br>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
            
    
            <div class="form-group col-sm-4 col-md-2">
                <label for="desayuno" style="font-size:20px;color: rgba(144, 12, 52);"> Desayuno: </label>
                <textarea class="form-control" id="desayuno" rows="6" name="desayuno" style="resize:none"></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-2">
                <label for="colacion_1" style="font-size:20px;color: rgba(144, 12, 52);"> Colación M.: </label>
                <textarea class="form-control" id="colacion_1" rows="6" name="colacion_m" style="resize:none"></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-2">
                <label for="comida" style="font-size:20px;color: rgba(144, 12, 52);"> Comida: </label>
                <textarea class="form-control" id="comida" rows="6" name="comida" style="resize:none"></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-2">
                <label for="colacion_2" style="font-size:20px;color: rgba(144, 12, 52);"> Colación V.: </label>
                <textarea class="form-control" id="colacion_2" rows="6" name="colacion_v" style="resize:none"></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-2">
                <label for="cena" style="font-size:20px;color: rgba(144, 12, 52);"> Cena: </label>
                <textarea class="form-control" id="cena" rows="6" name="cena" style="resize:none"></textarea>
            </div>
            <div class="form-group col-sm-4 col-md-2">
                <label for="antojos" style="font-size:20px;color: rgba(144, 12, 52);"> Antojitos: </label>
                <textarea class="form-control" id="antojos" rows="6" name="antojos" style="resize:none"></textarea>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-sm-12 col-md-12">
                <label for="calorias" style="font-size:20px;color: rgba(144, 12, 52);"> Calorias aproximadas:     </label>
                <input type="number" class="form-control" name="calorias" style="width: 400px;">
            </div>
        </div>
        <hr>
        <p class="h4 justify-content-center" name="parte2"><small>Frecuencia en el Consumo de Alimentos</small></p>
        <br>
        <div class="form-row">
            <table class="table table-bordered" style="background-color: #85120e; color: #FFFFFF;">
                <thead style="font-size:20px;">
                    <tr>
                        <th scope="col">Grupo</th>
                        <th scope="col">Frecuencia (1 al 7)</th>
                        <th scope="col">Alimentos mas Frecuentados</th>
                    <tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" >Verduras</th>
                        <td>
                            <div class="form-group">
                                <select id="num_verduras" class="form-control" name="num_verduras">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="verduras" rows="2" name="verduras"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Frutas</th>
                        <td>
                            <div class="form-group">
                                <select id="num_frutas" class="form-control" name="num_frutas">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="frutas" rows="2" name="frutas"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Azucares</th>
                        <td>
                            <div class="form-group">
                                <select id="num_azucar" class="form-control" name="num_azucar">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="azucar" rows="2" name="azucar"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Leguminosas</th>
                        <td>
                            <div class="form-group">
                                <select id="num_leguminosas" class="form-control" name="num_leguminosas">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="leguminosas" rows="2" name="leguminosas"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">POA</th>
                        <td>
                            <div class="form-group">
                                <select id="num_POA" class="form-control" name="num_POA">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="POA" rows="2" name="POA"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Cereales</th>
                        <td>
                            <div class="form-group">
                                <select id="num_cereales" class="form-control" name="num_cereales">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="cereales" rows="2" name="cereales"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Grasas</th>
                        <td>
                            <div class="form-group">
                                <select id="num_grasas" class="form-control" name="num_grasas">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="grasas" rows="2" name="grasas"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Leche</th>
                        <td>
                            <div class="form-group">
                                <select id="num_leche" class="form-control" name="num_leche">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <textarea class="form-control" id="leche" rows="2" name=leche></textarea>
                        </td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <hr>
        <p class="h4 justify-content-center" name="parte3"><small>Horario Habitual</small></p>
        <br>
        <div class="form-row">
            <input type="hidden" value="<?php echo $idUsuario;?>" name="idUsuario">
            
    
            <div class="form-group col-sm-4 col-md-3">
                <label for="despiertas" style="font-size:20px;color: rgba(144, 12, 52);"> ¿A qué hora te levantas?: </label>
                <input type="time" class="form-control" id="despiertas" rows="6" name="levantas">
            </div>

            <div class="form-group col-sm-4 col-md-3">
                <label for="duermes" style="font-size:20px;color: rgba(144, 12, 52);"> ¿A qué hora te duermes?: </label>
                <input type="time" class="form-control" id="duermes" rows="6" name="duermes">
            </div>

            <div class="form-group col-sm-4 col-md-3">
                <label for="horario_trabajo" style="font-size:20px;color: rgba(144, 12, 52);"> Horario de trabajo o escuela: </label>
                <input type="time" class="form-control" id="inicio_horario_trabajo" rows="6" name="inicio_horario_trabajo">
                <br> a <br>
                <input type="time" class="form-control" id="fin_horario_trabajo" rows="6" name="fin_horario_trabajo">
            </div>

            <div class="form-group col-sm-4 col-md-3">
                <label for="horario_comida" style="font-size:20px;color: rgba(144, 12, 52);"> Horario de comida familiar: </label>
                <input type="time" class="form-control" id="horario_comida" rows="6" name="horario_comida">
            </div>
            <div class="form-group col-sm-4 col-md-3">
                <label for="horario_ejercicio" style="font-size:20px;color: rgba(144, 12, 52);"> Horario de hacer ejercicio: </label>
                <input type="time" class="form-control" id="horario_ejercicio" rows="6" name="horario_ejercicio">
            </div>

            <div class="form-group col-sm-4 col-md-3">
                <label for="transporte" style="font-size:20px;color: rgba(144, 12, 52);"> Transporte: </label>
                <textarea class="form-control" id="transporte" rows="6" name="transporte" style="resize:none"></textarea>
            </div>
            <div class="form-group col-sm-4 col-md-3">
                <label for="apoyo" style="font-size:20px;color: rgba(144, 12, 52);"> Apoyo: </label>
                <textarea class="form-control" id="apoyo" rows="6" name="apoyo" style="resize:none"></textarea>
            </div>
            <div class="form-group col-sm-4 col-md-3">
                <label for="vives" style="font-size:20px;color: rgba(144, 12, 52);"> Vives: </label>
                <textarea class="form-control" id="vives" rows="6" name="vives" style="resize:none"></textarea>
            </div>

        </div>
       
<br>
        <div class="col-12 text-center">
            <input  class = "btn btn-success" type="submit" value="Siguiente" name = "btnEnviar">
        </div>
        <br>
    </form>
</div>
</body>
</html>
<?php include("footer.php"); ?>


<?php
  include ('Conexion.php');
  $fecha=date('Y-m-d');
  //Se obtiene que dia de la semana es, y se obtiene la fecha incial (lunes) y la final (sabado)
  switch(date('w')){
      case 0:
        $fecha_ini=date('Y-m-d', strtotime($fecha. '-7 days'));
        $fecha_fin=date('Y-m-d', strtotime($fecha. '-2 days'));
     break;
      case 1:
        $fecha_ini=$fecha;
        $fecha_fin=date('Y-m-d', strtotime($fecha. '+5 days'));
      break;
      case 2:
        $fecha_ini=date('Y-m-d', strtotime($fecha. '-2 days'));
        $fecha_fin=date('Y-m-d', strtotime($fecha. '+4 days'));
      break;
      case 3:
        $fecha_ini=date('Y-m-d', strtotime($fecha. '-3 days'));
        $fecha_fin=date('Y-m-d', strtotime($fecha. '+3 days'));
      break;
      case 4:
        $fecha_ini=date('Y-m-d', strtotime($fecha. '-4 days'));
        $fecha_fin=date('Y-m-d', strtotime($fecha. '+2 days'));
      break;
      case 5:
        $fecha_ini=date('Y-m-d', strtotime($fecha. '-5 days'));
        $fecha_fin=date('Y-m-d', strtotime($fecha. '+1 days'));
      break;
      case 6:
        $fecha_ini=date('Y-m-d', strtotime($fecha. '-6 days'));
        $fecha_fin=$fecha;
      break;
  }
  //Llamda al stored procedure p1() del cual se obtiene la fecha de nacimiento y lo agrupa por año  
  $sql1="call p3()";
  $result1=mysqli_query($conexion,$sql1);
  
  $valoresY1=array();
  $valoresX1=array();
  if(!$result1){
    echo "<br><br><br><br><br>No hubo citas esta semana <br><br><br><br><br><br>";
  }else{
    while ($ver1=mysqli_fetch_row($result1)){
      
          //Toma en cuenta unicamente las citas agendadas en el rango de fecha obtenido (lunes- sabado)
          //Guarda el nombre de la semana en español
        
          if($ver1[2]>= $fecha_ini and $ver1[2] <= $fecha_fin){
              if($ver1[0] == "Monday"){
                $valoresX1[0]="Lunes";
              }
              if($ver1[0] == "Tuesday"){
                $valoresX1[1]="Martes";
              }
              if($ver1[0] == "Wednesday"){
                $valoresX1[2]="Miercoles";
              }
              if($ver1[0] == "Thursday"){
                $valoresX1[3]="Jueves";
              }
              if($ver1[0] == "Friday"){
                $valoresX1[4]="Viernes";
              }
              if($ver1[0] == "Saturday"){
                $valoresX1[5]="Sabado";
              }       
              $valoresY1[]=$ver1[1];   
          }
        
      
      }

      $datosX1=json_encode($valoresX1);
      $datosY1=json_encode($valoresY1);
  }

  
?>

<div id="graficaBarras"></div>

<script type="text/javascript">
//Funcion para convertir de Json a String
  function crearCadenaLineal(json){
    var parsed = JSON.parse(json);
    var arr = [];
    for(var x in parsed){
      arr.push(parsed[x]);
    }
    return arr;
  }
</script>

<script type="text/javascript">
    //Llamada a la funcion para convertir Json a string
    datosX1=crearCadenaLineal('<?php echo $datosX1 ?>');
    datosY1=crearCadenaLineal('<?php echo $datosY1 ?>');

    var data = [
  {
      //Asignacion de valores para las graficas
    x: datosX1,
    y: datosY1,
    type: 'bar',
    marker: {
      color: ['rgb(0,255,128)', 'rgb(217,0,108)' ,  'rgb(0,128,255)',  'rgb(255,255,43)', 'rgb(255,6,0)',  'rgb(128,0,128)']
    }
  }
];
//Valores de titulos
var layout = {
  title: 'Consultas Semanales',
  font:{
    family: 'Ralewey, sans-serif' 
  },
  xaxis: {
    title: 'Dias'
  },
  yaxis: {
    title: 'Cantidad Citas'
  },
  bargap: 0.05
};
//Crea la grafica y la muestra en el div graficaBarras
Plotly.newPlot('graficaBarras', data, layout);
</script>
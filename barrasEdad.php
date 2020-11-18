<?php
  include ('Conexion.php');
  $fecha=date('Y-m-d');
  //Llamda al stored procedure p1() del cual se obtiene la fecha de nacimiento y lo agrupa por año  
  $sql1="call p1()";
  $result1=mysqli_query($conexion,$sql1);
  $valoresY1=array();
  $valoresX1=array();
  $cont0=0;
  $cont1=0;
  $cont2=0;
  $cont3=0;
  $cont4=0;
  $cont5=0;
  while ($ver1=mysqli_fetch_row($result1)){
      //Rango de edades 0 - 15 años
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-15 years')) and $ver1[0]<=date('Y-m-d')){
          $cont0=$cont0+1;
          $valoresX1[0]="0-15";
      }
      //Rango de edades 16 - 30 años
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-30 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-15 years'))){
        $cont1=$cont1+1;
        $valoresX1[1]="16-30";
      }
      //Rango de edades 31 - 45 años
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-45 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-30 years'))){
        $cont2=$cont2+1;
        $valoresX1[2]="31-45";
      }
      //Rango de edades 46 - 60 años
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-60 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-45 years'))){
        $cont3=$cont3+1;
        $valoresX1[3]="46-60";
      }
      //Rango de edades 61 - 75 años
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-75 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-60 years'))){
        $cont4=$cont4+1;
        $valoresX1[4]="61-75";
      }
      //Rango de edades 76 - 90 años
      if($ver1[0]>date('Y-m-d', strtotime($fecha. '-90 years')) and $ver1[0]<=date('Y-m-d', strtotime($fecha. '-75 years'))){
        $cont5=$cont5+1;
        $valoresX1[5]="75-90";
      }
    //$valoresY1[]=$ver1[1];
    //$valoresX1[]=$ver1[0];
  }
  //Asigna al array la cantidad de pacientes en el rango de edad
  $valoresY1[0]=$cont0;
  $valoresY1[1]=$cont1;
  $valoresY1[2]=$cont2;
  $valoresY1[3]=$cont3;
  $valoresY1[4]=$cont4;
  $valoresY1[5]=$cont5;

  $datosX1=json_encode($valoresX1);
  $datosY1=json_encode($valoresY1);
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
      color: ['rgb(0,255,128)', 'rgb(217,0,108)',  'rgb(255,255,111)', 'rgb(255,128,64)',  'rgb(255,128,192)',  'rgb(114,225,195)']
    }
  }
];

var layout = {
  title: 'Grafica de Edades',
  font:{
    family: 'Ralewey, sans-serif' 
  },
  xaxis: {
    title: 'Años'
  },
  yaxis: {
    title: 'Pacientes'
  },
  bargap: 0.05
};
//Crea la grafica y la muestra en el div graficaBarras
Plotly.newPlot('graficaBarras', data, layout);
</script>
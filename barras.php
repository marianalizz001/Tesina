<?php
  include ('Conexion.php');
  $sql="SELECT genero, count(genero) from Usuario where tipo_usuario='P' group by(genero)" ;
  $result=mysqli_query($conexion,$sql);
  $valoresY=array();
  $valoresX=array();

  while ($ver=mysqli_fetch_row($result)){
    if($ver[0]=='F'){
      $valoresX[]="Femenino";
    }
    if($ver[0]=='M'){
      $valoresX[]="Masculino";
    }
    $valoresY[]=$ver[1];
    
  }

  $datosX=json_encode($valoresX);
  $datosY=json_encode($valoresY);
?>

<div id="graficaBarras"></div>

<script type="text/javascript">
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

    datosX=crearCadenaLineal('<?php echo $datosX ?>');
    datosY=crearCadenaLineal('<?php echo $datosY ?>');
    

    var data = [
  {
    x: datosX,
    y: datosY,
    type: 'bar',
    marker: {
      color: ['rgb(255,174,201)','rgb(114,225,195)']
    }
  }
];

var layout = {
  title: 'Grafica Genero',
  font:{
    family: 'Ralewey, sans-serif' 
  },
  xaxis: {
    title: 'Genero'
  },
  yaxis: {
    title: 'Pacientes'
  },
  bargap: 0.05
};

Plotly.newPlot('graficaBarras', data, layout);
</script>
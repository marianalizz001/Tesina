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

    <title>Dra.YazminNajera | Ayuda</title>

    <?php include("navbar.php"); ?>
    <br>

</head>
<body>
<div class="container" id="registro">
<div class="row">
   <div class="col-12" id="barra_servicio" style="text-align: center;">
       <A class="h2 align-middle text-center" name="servicios" id="servicio">Preguntas Frecuentes</A>
   </div>
</div>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        ¿Cada cuánto tiempo es recomendable hacer la profilaxis?
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      El tiempo entre una limpieza y otra dependerá de cada paciente, pero se recomienda visitar al dentista cada <b>6 meses</b>, y en ese mismo tiempo hacer una limpieza. Ahora, si existen o existieron enfermedades en las encías, las higienes deben hacerse con mayor frecuencia, ya que así se evitarán las infecciones en ellas.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        ¿Cada cuánto debo cambiar mi cepillo de dientes?
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      El cepillo es recomendable cambiarlo <b>cada mes</b>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        ¿Qué tipo de brackets existen?
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      Metálicos convencionales, autoligados, estéticos cerámicos, estéticos zafiro, estéticos autoligados y ortodoncia lingual y ortodoncia invisible.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        ¿Qué tipos de blanqueamientos realizamos?
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
      Ambulatorios y de consultorio (en una sola sesión).
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        ¿A los cuantos años es recomentable la primer visita al dentista?
        </button>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
      A los 3 años.
      </div>
    </div>
  </div>

</div>

</div>
<br>
<br>
<br>
<br>
</body>
</html>
<?php include("footer.php"); ?>
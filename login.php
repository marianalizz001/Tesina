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

    <title>Dra.YazminNajera | Login</title>

    <?php include("navbar.php"); ?>
    <br>

</head>
<body>
<section id="login" class="mb-5 mt-5">
    <div class="container">
      <br><br>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 mx-auto">
          <div class="card_login">
            <div class="card">
              <div class="card-body text-center">
                <form action="loginPHP.php" method="post">
                  <h2 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h2><br>
                  <div class="form-group">
                      <input type="text" id="usuario" class="form-control" placeholder="Usuario" name="usuario" required>
                  </div>
                  <div class="form-group">
                      <input type="password" id="clave" class="form-control" placeholder="Contraseña" name="clave" required>
                  </div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block">Entrar</button>
                </form>
              </div>
              <br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
<?php include("footer.php"); ?>
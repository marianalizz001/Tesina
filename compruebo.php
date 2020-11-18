<?php
session_start();
if(!$_SESSION['usuario']){
// si no hay sesion del usuario, es decir no esta logeado lo redirijo a la pagina de login
    header("Location: index.php");
     exit();
}
?>
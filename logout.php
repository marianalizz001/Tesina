<?php
    $_SESSION['log'] = false;
    session_start();
    session_destroy();
    header('location: index.php');
?>
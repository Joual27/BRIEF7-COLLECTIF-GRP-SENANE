<?php
    require_once '../../config/config.php';
    session_start();

    if ($_SESSION['roleUser'] != 'admin') {
        Redirect('../client/index.php');
    }



    var_dump($_SESSION['username'] . "<br>");
    var_dump($_SESSION['roleUser'] . "<br>");
    echo "hello Admin" . $_SESSION['username'] . "welcome to your website Your role is" . $_SESSION['roleUser'];

?>
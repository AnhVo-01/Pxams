<?php
    session_start();
    // header('Location: /'.$_GET['redirect'].'');
    $path = $_SERVER['REQUEST_URI'];
    require_once 'views/client/layouts/header/header.php';
    echo(explode('/', $_SERVER['REQUEST_URI']));
    // require('views/client/pages/' . $path . '.php');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pxams</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/image/favicon.ico">
    
    <link href="assets/css/plugins/fontawesome-all.min.css" rel="stylesheet"></link>
    <link href="assets/css/plugins/fontawesome-duotone.css" rel="stylesheet"></link>
    <link href="assets/css/plugins/reboot.min.css" rel="stylesheet"></link>
    <script src="assets/js/plugins/jquery-3.6.1.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet"></link>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1315262330519623" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body>
<?php
    if (isset($_SESSION['account_id'])) {
        if (isset($_GET['redirect'])) {
            if ($_GET['redirect'] == 'learn') {
                require_once 'header-learn.php';
            } else {
                require_once 'header-isLogin.php';
            }
        } else {
            require_once 'header-isLogin.php';
        }
    } else { 
        require_once 'header-notLogin.php';
    }
?>
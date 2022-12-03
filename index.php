<?php
	require_once 'models/pdo.php';

	require('controllers/HeaderController.php');
    // require 'views/client/layouts/header.php';


	if (isset($_POST['controller'])) {
		require_once('route/web.php'); /*xử lý các request trong Route/web.php*/
	} elseif(isset($_GET['redirect'])) {
		require('route/redirect.php');
	} else {
		require('views/client/pages/home.php'); /*require giao diện trang chủ*/
	}

	require('views/client/layouts/footer.php');

    // require_once 'models/pdo.php';

    // if (isset($_GET['controller'])) {
    //     $controller = $_GET['controller'];
    //     if (isset($_GET['action'])) {
    //         $action = $_GET['action'];
    //     } else {
    //         $action = 'index';
    //     }
    // } else {
    //     $controller = 'pages';
    //     $action = 'home';
    // }
    // require_once 'routes.php';
?>
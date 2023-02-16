<?php
	require_once 'util/pdo.php';
    session_start();

	// require('controllers/HeaderController.php');
    require 'views/client/layouts/header/header.php';


	if (isset($_POST['controller'])) {
		require_once('route/web.php'); /*xử lý các request trong Route/web.php*/
	} elseif(isset($_GET['redirect'])) {
		require_once('route/redirect.php');
	} elseif(isset($_GET['share']) && isset($_GET['id'])) {
		require_once('route/share.php');
	} else {
		require_once('views/client/pages/home.php'); /*require giao diện trang chủ*/
	}

	require('views/client/layouts/footer.php');
?>
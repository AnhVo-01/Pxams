<?php
	require_once 'util/pdo.php';
    session_start();

	// require('controllers/HeaderController.php');
    require 'views/client/layouts/header/header.php';

	// require_once('route/routes.php');


	if(isset($_GET['redirect']) || isset($_GET['source'])) {
		require_once('route/redirect.php');
	} elseif(isset($_GET['share']) && isset($_GET['id'])) {
		require_once('route/share.php');
	} else {
		if (isset($_SESSION['account_id'])) {
			require_once('views/client/pages/home.php');
		} else {
			require_once('views/client/pages/welcome.php'); /*require giao diện trang chủ*/
		}
	}

	require('views/client/layouts/footer.php');
?>
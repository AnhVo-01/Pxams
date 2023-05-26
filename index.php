<?php
	require_once 'util/pdo.php';
    session_start();

	$cookie_name = "auth-user";
	if(isset($_COOKIE[$cookie_name])) {
		$_SESSION['account_id'] = $_COOKIE[$cookie_name];
	} else {
		session_unset();
	}

    require 'views/client/layouts/header/header.php';

    echo('<div class="toast-alert">');
    require 'util/toast.php';
    echo('</div>');


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
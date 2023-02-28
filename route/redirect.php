<?php
	$path = $_GET['redirect'];
	$source = $_GET['source'];

	if (isset($_GET['local'])){
		$_SESSION['activeRoute'] = $_GET['local'];
	}
	if (isset($_GET['activeChild'])) {
		$_SESSION['activeChild'] = $_GET['activeChild'];
	}

	if (isset($_SESSION['account_id'])) {
		require_once('views/client/pages/' . $path . '.php');
	} elseif($source) {
		require_once("views/$source/$path.php");
	} else {
		require_once('views/client/layouts/404.php');
	}
<?php
	$path = $_GET['redirect'];

	if (isset($_GET['local'])){
		$_SESSION['activeRoute'] = $_GET['local'];
	} else {
		unset($_SESSION['activeRoute']);
	}
	
	if (isset($_GET['activeChild'])) {
		$_SESSION['activeChild'] = $_GET['activeChild'];
	}

	if (isset($_SESSION['account_id'])) {
		require_once("views/client/pages/$path.php");
	} elseif(isset($_GET['source'])) {
	    $source = $_GET['source'];
		require_once("views/$source/$path.php");
	} else {
		require_once('views/client/layouts/404.php');
	}
?>
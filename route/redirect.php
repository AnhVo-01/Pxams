<?php
	$path = $_GET['redirect'];
	if (isset($_GET['local'])){
		$_SESSION['activeRoute'] = $_GET['local'];
	}
	if (isset($_GET['activeChild'])) {
		$_SESSION['activeChild'] = $_GET['activeChild'];
	}
	require_once('views/client/pages/' . $path . '.php');
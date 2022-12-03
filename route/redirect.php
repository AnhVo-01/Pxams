<?php
	$path = $_GET['redirect'];
	if (isset($_GET['local'])){
		$_SESSION['action'] = $_GET['local'];
	}
	require('views/' . $path . '.php');
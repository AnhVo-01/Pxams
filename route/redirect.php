<?php
	$path = $_GET['redirect'];
	$_SESSION['action'] = $_GET['local'];
	require('views/' . $path . '.php');
<?php 
    $path = $_SERVER['REQUEST_URI'];
	require('views/client/pages/' . $path . '.php');
?>
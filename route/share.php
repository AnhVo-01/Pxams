<?php
	$path = $_GET['share'];
	
    if ($path === 'flashcard') {
        $_SESSION['study_set_id'] = $_GET['id'];
    }
	require_once('views/client/pages/' . $path . '.php');
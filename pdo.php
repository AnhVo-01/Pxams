<?php
	$server = '194.163.35.1';
	$dbName = 'u318237870_pxams';
	$username = 'u318237870_u318237870';
	$password = 'myPage@123';

    try {
        $pdo = new PDO("mysql:host=$server;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

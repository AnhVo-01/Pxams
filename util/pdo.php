<?php
	$server = 'localhost';
	$dbName = 'pxams';
	$username = 'root';
	$password = '';

    try {
        $pdo = new PDO("mysql:host=$server;port=3306;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

<?php
require_once "../models/pdo.php";
session_start();

$salt = 'PxAms21*_';

if ( isset($_POST["uname"]) && isset($_POST["upass"]) && 
    isset($_POST["email"]) && isset($_POST["dob"]) && isset($_POST["captcha"]) ) {
        
    if( strlen($_POST["captcha"]) < 1 ){
        $_SESSION["error"] = "Please enter the captcha!";
        header('Location: ../');
        return;
    } elseif( $_POST["captcha"] != $_SESSION['captcha_text'] ){
        $_SESSION["error"] = "Wrong captcha !!!";
        header('Location: ../');
        return;
    }else{
        $pass = hash('md5', $salt.$_POST['upass']);
        $stmt = $pdo->prepare('INSERT INTO Account (`user_name`, `password`, `email`, `dob`) VALUES ( :un, :pw, :em, :dob)');
        $stmt->execute(array( 
            ':un' => $_POST['uname'],
            ':pw' => $pass,
            ':em' => $_POST['email'],
            ':em' => $_POST['dob']
        ));

        header('Location: ../');
        return;
    }
}
?>
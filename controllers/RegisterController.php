<?php
require_once "../util/pdo.php";
session_start();

$salt = 'PxAms21*_';

if ( isset($_POST["uname"]) && isset($_POST["upass"]) && 
    isset($_POST["email"]) && isset($_POST["dob"]) && isset($_POST["captcha"]) ) {
        
    if( strlen($_POST["captcha"]) < 1 ){
        $_SESSION["error"] = "Please enter the captcha!";
        return;
    } elseif( $_POST["captcha"] != $_SESSION['captcha_text'] ){
        $_SESSION["error"] = "Wrong captcha !!!";
        return;
    }else{
        $pass = hash('md5', $salt.$_POST['upass']);
        $stmt = $pdo->prepare('INSERT INTO Account (`user_name`, `password`, `email`, `dob`) VALUES ( :un, :pw, :em, :dob)');
        $stmt->execute(array( 
            ':un' => $_POST['uname'],
            ':pw' => $pass,
            ':em' => $_POST['email'],
            ':dob' => $_POST['dob']
        ));
        $_SESSION["success"] = "Account created successfully!";
        return;
    }
}
?>
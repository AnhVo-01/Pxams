<?php
require_once '../models/pdo.php';

session_start();

$salt = 'PxAms21*_';

if ( isset($_POST["uname"]) && isset($_POST["pass"]) ) {
    unset($_SESSION["uname"]);
    unset($_SESSION["account_id"]);  // Logout current user

    $check = hash('md5', $salt.$_POST['pass']);

    if ( strpos($_POST['uname'], '@') === false) {
        $stmt = $pdo->prepare('SELECT account_id, user_name, password, email FROM Account WHERE user_name = :em AND password = :pw');
    }else{
        $stmt = $pdo->prepare('SELECT account_id, user_name, password, email FROM Account WHERE email = :em AND password = :pw');
    }
    $stmt->execute(array( 
        ':em' => $_POST['uname'],
        ':pw' => $check
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $row !== false ) {
        $_SESSION['account_id'] = $row['account_id'];

        if( isset($_POST["remember"]) ){
            setcookie('account_id', $row['account_id'], time() + (86400 * 30));
            setcookie('user', $row['user_name'], time() + (86400 * 30));
            setcookie('remember', 'on', time() + (86400 * 30));
        }
        // header('Location: ../');
        return;
    } else {
        $_SESSION["error"] = "Incorrect email or password.";
        // header('Location: ../');
        return;
    }
    exit();
}
?>
<?php
require_once '../util/pdo.php';
require_once '../models/Account.php';

session_start();

$salt = 'PxAms21*_';

if ( isset($_POST["uname"]) && isset($_POST["pass"]) ) {
    unset($_SESSION["uname"]);
    unset($_SESSION["account_id"]);  // Logout current user

    $check = hash('md5', $salt.$_POST['pass']);

    if ( strpos($_POST['uname'], '@') === false) {
        $stmt = $pdo->prepare('SELECT * FROM `account` WHERE user_name = :em AND password = :pw');
    }else{
        $stmt = $pdo->prepare('SELECT * FROM `account` WHERE email = :em AND password = :pw');
    }
    $stmt->execute(array( 
        ':em' => $_POST['uname'],
        ':pw' => $check
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $row ) {
        // $_SESSION['account_id'] = $row['account_id'];

        if( isset($_POST["remember"]) ){
            setcookie('account_id', $row['account_id'], time() + (86400 * 30));
            setcookie('user', $row['user_name'], time() + (86400 * 30));
            setcookie('remember', 'on', time() + (86400 * 30));
        }

        $_SESSION['account_id'] = $row['account_id'];

        $acc = new Account($row['account_id'], $row['user_name'], $row['phone'], $row['email'], $row['type']);
        echo json_encode($acc);
        return;
    } else {
        $_SESSION["error"] = "Incorrect email or password.";
        header("Location: ?redirect=login&source=authen");
        return;
    }
    
    exit();
}
?>
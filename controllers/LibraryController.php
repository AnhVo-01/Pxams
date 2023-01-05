<?php
require_once '../models/pdo.php';
session_start();

if (isset($_POST['ssID'])) {
    // $smtp = $pdo->prepare('SELECT * FROM `study_set` WHERE ssid = :ssId');
    // $stmt->execute(array(
    //     ':ssId' => $_POST['ssID']
    // ));

    $_SESSION['study_set_id'] = $_POST['ssID'];

    exit();
}

?>
<?php 
require_once 'pdo.php';
require_once 'util.php';
session_start();

$stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE ssid = :ssId');
$stmt->execute(array(':ssId' => $_SESSION['study_set_id']));
$listQuestion = $stmt->fetchAll(PDO::FETCH_ASSOC);

reloadOption($pdo, $listQuestion);
?>
<?php
require_once '../models/pdo.php';
session_start();

if (isset($_POST['action']) && isset($_POST['ssID'])) {
    if ($_POST['action'] == 'toRecycleBin') {
        $stmt = $pdo->prepare('UPDATE `acount_study_set` SET `active` = 0 WHERE ss_id=:ssId');
        $stmt->execute(array(':ssId' => $_POST['ssID']));
    } else {
        $_SESSION['study_set_id'] = $_POST['ssID'];
    }

    exit();
}

if (isset($_POST['sortField']) && isset($_POST['searchField'])) {
    $stmt = $pdo->prepare('SELECT ssid, title, description, cdate, udate, ass.date, status, visible_to, ass.type, active
                        FROM `study_set` AS ss 
                        INNER JOIN `acount_study_set` AS ass ON ss.ssid = ass.ss_id 
                        INNER JOIN `account` acc ON ass.account_id = acc.account_id 
                        WHERE acc.account_id = :accId ORDER BY :sortField DESC');
    $stmt->execute(array(
        ':accId' => $_SESSION['account_id'],
        ':sortField' => $_POST['sortField']
    ));
    $progressList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($progressList as $row) {

    }
}
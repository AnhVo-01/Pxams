<?php
require_once '../util/pdo.php';
require_once '../util/library.php';
session_start();

if (isset($_POST['action']) && isset($_POST['ssID'])) {
    if (isset($_POST['type']) && $_POST['action'] == 'toRecycleBin') {
        if ($_POST['type'] == 'OWNED') {
            $stmt = $pdo->prepare("UPDATE `study_set` SET `status`='DELETED' WHERE ssid=:ssId");
            $stmt->execute(array(':ssId' => $_POST['ssID']));
        }

        $stmt = $pdo->prepare('UPDATE `account_study_set` SET `active` = 0 WHERE ss_id=:ssId AND create_by=:accId');
        $stmt->execute(
            array(
                ':ssId' => $_POST['ssID'],
                ':accId' => $_SESSION['account_id']
            )
        );
    } else {
        $_SESSION['study_set_id'] = $_POST['ssID'];
    }

    exit();
}

if (isset($_POST['sortField']) && isset($_POST['searchField'])) {
    $stmt = $pdo->prepare('SELECT ssid, title, description, cdate, udate, ass.date, status, visible_to, ass.type, active
                        FROM `study_set` AS ss 
                        INNER JOIN `account_study_set` AS ass ON ss.ssid = ass.ss_id 
                        INNER JOIN `account` acc ON ass.create_by = acc.account_id 
                        WHERE acc.account_id = :accId ORDER BY :sortField DESC');
    $stmt->execute(array(
        ':accId' => $_SESSION['account_id'],
        ':sortField' => $_POST['sortField']
    ));
    $progressList = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($progressList as $row) {

    }
}
<?php
require_once '../models/pdo.php';
require_once '../models/util.php';

session_start();

if (isset($_POST['visible']) && isset($_POST['editable']) && isset($_POST['status'])) {

    $stmt = $pdo->prepare('INSERT INTO `study_set`(status, visible_to, editable_by) VALUES (:status, :visible, :editable)');
    $stmt->execute(
        array(
            ':status' => $_POST['status'],
            ':visible' => $_POST['visible'],
            ':editable' => $_POST['editable']
        )
    );

    $studySet_id = $pdo->lastInsertId();
    $_SESSION['study_set_id'] = $studySet_id;

    // set study set for account
    $stmt = $pdo->prepare('INSERT INTO `acount_study_set`(account_id, ss_id, date, type) VALUES (:accId, :ssId, :date, :type)');
    $stmt->execute(
        array(
            ':accId' => $_SESSION['account_id'],
            ':type' => 'OWNED',
            ':date' => time(),
            ':ssId' => $studySet_id
        )
    );

    insertQuestion($pdo, $studySet_id);
    
    return;

    exit();
}

if (isset($_POST['title'])) {
    $stmt = $pdo->prepare('UPDATE `study_set` SET `title`=:title WHERE ssid=:ssId');
    $stmt->execute(
        array(
            ':title' => $_POST['title'],
            ':ssId' => $_SESSION['study_set_id']
        )
    );
    exit();
}

if (isset($_POST['desc'])) {
    $stmt = $pdo->prepare('UPDATE `study_set` SET `description`=:desc WHERE ssid=:ssId');
    $stmt->execute(
        array(
            ':desc' => $_POST['desc'],
            ':ssId' => $_SESSION['study_set_id']
        )
    );
    exit();
}

if (isset($_POST['visible']) && isset($_POST['editable']) && isset($_POST['visible_pass']) && isset($_POST['editable_pass'])) {
    if ($_POST['visible'] == 2) {
        $visible_pass = $_POST['visible_pass'];
    } else {
        $visible_pass = NULL;
    }
    
    if ($_POST['editable'] == 0) {
        $editable_pass = $_POST['editable_pass'];
    }else {
        $editable_pass = NULL;
    }

    $stmt = $pdo->prepare('UPDATE `study_set` SET `visible_to`=:visible, `visible_pass`=:visible_pass, `editable_by`=:editable, `editable_pass`=:editable_pass WHERE ssid=:ssId');
    $stmt->execute(
        array(
            ':visible' => $_POST['visible'],
            ':visible_pass' => $visible_pass,
            ':editable' => $_POST['editable'],
            ':editable_pass' => $editable_pass,
            ':ssId' => $_SESSION['study_set_id']
        )
    );
    header('Location: ../?redirect=studyset');
}

if (isset($_POST['question']) && isset($_POST['question_id'])) {
    $stmt = $pdo->prepare('UPDATE `question_table` SET question=:question WHERE question_id=:questionId');
    $stmt->execute(
        array(
            ':question' => $_POST['question'],
            ':questionId' => $_POST['question_id']
        )
    );
    exit();
}

// ----- Add more option --------------------
if (isset($_POST['question_id'])) {
    createOption($pdo, $_POST['question_id']);
    // load-all
    $stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE ssid = :ssId');
    $stmt->execute(array(':ssId' => $_SESSION['study_set_id']));
    $listQuestion = $stmt->fetchAll(PDO::FETCH_ASSOC);

    reloadOption($pdo, $listQuestion);
    exit();
}

// ----- Update option ----------------------
if (isset($_POST['optionTitle']) && isset($_POST['option_id'])) {

    $stmt = $pdo->prepare('UPDATE `option_table` SET option_title=:optionTitle WHERE option_id=:optionId');
    $stmt->execute(
        array(
            ':optionTitle' => $_POST['optionTitle'],
            ':optionId' => $_POST['option_id']
        )
    );

    exit();
}

// ----- Delete option --------------------
if (isset($_POST['option_id'])) {
    $stmt = $pdo->prepare('DELETE FROM `option_table` WHERE option_id=:optionId');
    $stmt->execute(
        array(
            ':optionId' => $_POST['option_id']
        )
    );

    // load-all
    $stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE ssid = :ssId');
    $stmt->execute(array(':ssId' => $_SESSION['study_set_id']));
    $listQuestion = $stmt->fetchAll(PDO::FETCH_ASSOC);

    reloadOption($pdo, $listQuestion);

    exit();
}
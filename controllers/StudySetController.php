<?php
require_once '../util/pdo.php';
require_once '../util/StudySet.php';

session_start();

// ----- Create a study set --------------------
if (isset($_POST['visible']) && isset($_POST['editable']) && isset($_POST['status'])) {
    
    // Check already draft
    $stmt = $pdo->prepare("SELECT owner_id, s.ssid, type, s.status FROM `account_study_set` AS ass 
                        INNER JOIN `study_set` AS s 
                        ON ass.ss_id = s.ssid 
                        WHERE type = 'OWNED' AND s.status = 'DRAFT' AND owner_id=:accId");
    $stmt->execute(
        array(
            ':accId' => $_SESSION["account_id"]
        )
    );
    $hadDraft = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($hadDraft) {
        $_SESSION['study_set_id'] = $hadDraft['ssid'];
    } else {
        // new study set
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
        $stmt = $pdo->prepare('INSERT INTO `account_study_set`(account_id, owner_id, ss_id, date, type, active) VALUES (:accId, ownerId, :ssId, :date, :type, 1)');
        $stmt->execute(
            array(
                ':accId' => $_SESSION['account_id'],
                ':ownerId' => $_SESSION['account_id'],
                ':type' => 'OWNED',
                ':date' => time(),
                ':ssId' => $studySet_id
            )
        );
    
        insertQuestion($pdo, $studySet_id);
    }

    exit();
}

// ----- Set title/description for study set --------------------
if (isset($_POST['title']) && isset($_POST['desc'])) {
    if(empty($_POST['title']) && empty($_POST['desc'])) {
        $status = 'DRAFT';
        $title = NULL;
        $desc = NULL;
    } elseif(empty($_POST['title'])) {
        $status = 'INPROGRESS';
        $title = NULL;
        $desc = $_POST['desc'];
    } elseif(empty($_POST['desc'])) {
        $status = 'INPROGRESS';
        $title = $_POST['title'];
        $desc = NULL;
    } else {
        $status = 'INPROGRESS';
        $title = $_POST['title'];
        $desc = $_POST['desc'];
    }

    $stmt = $pdo->prepare('UPDATE `study_set` SET `title`=:title, `description`=:desc, `status`=:status WHERE ssid=:ssId');
    $stmt->execute(
        array(
            ':title' => $title,
            ':desc' => $desc,
            ':status' => $status,
            ':ssId' => $_SESSION['study_set_id']
        )
    );
    exit();
}

// ----- Study set setting --------------------
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

// ----- Set question for set --------------------
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

// ----- Set question type --------------------
if (isset($_POST['type']) && isset($_POST['question_id'])) {
    $stmt = $pdo->prepare('UPDATE `question_table` SET type=:type WHERE question_id=:questionId');
    $stmt->execute(
        array(
            ':type' => $_POST['type'],
            ':questionId' => $_POST['question_id']
        )
    );
    exit();
}

// ----- Add more option / Delete question --------------------
if (isset($_POST['action']) && isset($_POST['question_id'])) {
    if ($_POST['action'] == 'addOption') {
        createOption($pdo, $_POST['question_id']);
    } elseif($_POST['action'] == 'delete') {
        $stmt = $pdo->prepare('DELETE FROM `question_table` WHERE question_id =:questionId');
        $stmt->execute(
            array(
                ':questionId' => $_POST['question_id']
            )
        );
    } elseif ($_POST['action'] == 'setAnswer') {
        $stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE question_id=:questionId');
        $stmt->execute(
            array(
                ':questionId' => $_POST['question_id']
            )
        );
        $question = $stmt->fetch(PDO::FETCH_ASSOC);

        return setAnswer($pdo, $question);
    } elseif ($_POST['action'] == 'submitAnswer') {
        // ----- Set answer ----------------------
        $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id = :qid');
        $stmt->execute(array(':qid' => $_POST['question_id']));
        $count = $stmt->rowCount();

        for($i = 1; $i <= $count; $i++) {
            if($_POST['answer'.$i] == 'on'){
                $answer = 1;
            } else {
                $answer = 0;
            }
            $optionId = $_POST['option_id'.$i];
    
            $stmt = $pdo->prepare('UPDATE `option_table` SET `answer`=:ans WHERE option_id=:optionId');
            $stmt->execute(
                array(
                    ':ans' => $answer,
                    ':optionId' => $optionId
                )
            );
        }
    
        exit();
    }

    exit();
} elseif (isset($_POST['action']) && isset($_SESSION['study_set_id'])) {
    // ----- Create question --------------------
    if ($_POST['action'] === 'addQuestion') {
        insertQuestion($pdo, $_SESSION['study_set_id']);
    } elseif ($_POST['action'] === 'createFinish') {
        // check input is empty or not
        $stmt = $pdo->prepare('SELECT * FROM `question_table` AS qt
                                INNER JOIN `option_table` AS ot
                                ON qt.question_id = ot.question_id
                                WHERE ssid =:ssId AND (qt.question IS NULL OR ot.option_title IS NULL)');
        $stmt->execute(array(':ssId' => $_SESSION['study_set_id']));
        $emptyCount = $stmt->rowCount();
        
        if($emptyCount < 1) {
            $stmt = $pdo->prepare("UPDATE `study_set` SET `status` = 'ACTIVE' WHERE ssid=:ssId");
            $stmt->execute(array(':ssId' => $_SESSION['study_set_id']));
        } else {
            echo('toast');
            $_SESSION['toast'] = "Empty";
            return;
        }
    }

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

    // // load-all
    // $stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE ssid = :ssId');
    // $stmt->execute(array(':ssId' => $_SESSION['study_set_id']));
    // $listQuestion = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // reloadOption($pdo, $listQuestion);

    exit();
}
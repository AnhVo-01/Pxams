<?php 
    require_once '../util/pdo.php';
    require_once '../util/learn.php';
    require_once '../models/Question.php';
    session_start();

    if (isset($_POST['ss_id']) && isset($_POST['question_id']) && 
        isset($_POST['value']) && isset($_POST['action'])) {
        
        if ($_POST['action'] == 'firstLoad') {
            // if ($_POST['value']) {
            //     $listQuestion = json_decode($_POST['value']);
            // } else {
            //     $listQuestion = array();
            // }

            if ($_POST['value'] == 'startOver') {
                $sql = $pdo->prepare("UPDATE `learn_study_set` SET progress = 0 WHERE account_id=:accId AND ss_id=:ssId");
                $sql->execute(
                    array(
                        ':ssId' => $_POST['ss_id'],
                        ':accId' => $_SESSION['account_id']
                    )
                );
            }

            $listQuestion = array();
    
            $sql = $pdo->prepare("SELECT * FROM `learn_study_set` WHERE account_id=:accId AND ss_id=:ssId");
            $sql->execute(
                array(
                    ':ssId' => $_POST['ss_id'],
                    ':accId' => $_SESSION['account_id']
                )
            );
            $result1 = $sql->fetch(PDO::FETCH_ASSOC);
        
            $sql1 = $pdo->prepare("SELECT * FROM question_table WHERE ssid=:ssId");
            $sql1->execute(array(':ssId' => $_POST['ss_id']));
            $result2 = $sql1->fetchAll(PDO::FETCH_ASSOC);
    
            $_SESSION['totalQuestion'] = sizeof($result2);
        
            if (sizeof($result2) < 15) {
                $limit = 7;
            } else {
                $limit = 10;
            }
        
            if ($result1) {
                if ($result1['progress'] < sizeof($result2)) {
                    $stmt = $pdo->prepare("SELECT * FROM `question_table` WHERE ssid=:ssId LIMIT {$limit} OFFSET {$result1['progress']}");
                    $stmt->execute(
                        array(
                            ':ssId' => $_POST['ss_id']
                        )
                    );
                    $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    learnSuccessful();
                    exit();
                }
            } else {
                $stmt = $pdo->prepare("SELECT * FROM `question_table` WHERE ssid=:ssId LIMIT {$limit}");
                $stmt->execute(array(':ssId' => $_POST['ss_id']));
                $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            foreach ($list as $item) {
                $Question = new Question($item['question_id'], $item['question'], $item['type'], 0);
                array_push($listQuestion, $Question);
            }
    
            $_SESSION['listQuestion'] = $listQuestion;
            flashBox($pdo, $listQuestion, $result1['progress'], $_SESSION['totalQuestion']);
            exit();

        } elseif ($_POST['action'] == 'saveProgress') {
            foreach($_SESSION['listQuestion'] as $question) {
                if ($question->status == 1) {
                    array_slice($_SESSION['listQuestion'], $question);
                }
            }
            $listQuesJSON = json_encode($_SESSION['listQuestion']);
            echo $listQuesJSON;
        } elseif ($_POST['action'] == 'choose') {

            $listQuestion = $_SESSION['listQuestion'];

            foreach ($listQuestion as $item) {
                if ($item->qId == $_POST['question_id'] && $item->status != 1) {
                    $item->status = 1;

                    if ($_POST['value'] == 1) {
                        $sql = $pdo->prepare("SELECT * FROM `learn_study_set` WHERE account_id=:accId AND ss_id=:ssId");
                        $sql->execute(
                            array(
                                ':ssId' => $_POST['ss_id'],
                                ':accId' => $_SESSION['account_id']
                            )
                        );
                        $result = $sql->fetch(PDO::FETCH_ASSOC);
                        
                        if ($result) {
                            $sql = $pdo->prepare("UPDATE `learn_study_set` SET account_id=:accId, ss_id=:ssId, progress=:progress WHERE learn_id=:learnId");
                            $sql->execute(
                                array(
                                    ':ssId' => $_POST['ss_id'],
                                    ':accId' => $_SESSION['account_id'],
                                    ':progress' => ++$result['progress'],
                                    ':learnId' => $result['learn_id']
                                )
                            );
                        } else {
                            $sql = $pdo->prepare("INSERT INTO `learn_study_set`(`account_id`, `ss_id`, `progress`) VALUES (:accId, :ssId, 1)");
                            $sql->execute(
                                array(
                                    ':ssId' => $_POST['ss_id'],
                                    ':accId' => $_SESSION['account_id']
                                )
                            );
                        }
                    } else {
                        $Question = new Question($item->qId, $item->title, $item->type, 2);
                        array_push($listQuestion, $Question);
                    }
                } 
            }
            $_SESSION['listQuestion'] = $listQuestion;
            flashBox($pdo, $listQuestion, $result['progress'], $_SESSION['totalQuestion']);
            exit();
        } 
    }
?>
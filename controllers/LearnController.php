<?php 
    require_once '../util/pdo.php';
    require_once '../util/learn.php';
    require_once '../models/Question.php';
    session_start();

    if (isset($_POST['ss_id']) && isset($_POST['question_id']) && 
        isset($_POST['value']) && isset($_POST['action'])) {
        $listQuestion = $_SESSION['listQuestion'];
        if ($_POST['action'] == 'choose') {
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
            flashBox($pdo, $listQuestion);
        } elseif ($_POST['action'] == 'saveProgress') {
            setcookie("flashCardQues", $_SESSION['listQuestion'], time() + (86400 * 30), "?redirect=flashcard&id=3");
        }
    }
?>
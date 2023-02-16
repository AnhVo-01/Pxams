<?php
    require_once 'util/learn.php';
    require_once 'models/Question.php';

    $listQuestion = array();

    $sql = $pdo->prepare("SELECT * FROM `learn_study_set` WHERE account_id=:accId AND ss_id=:ssId");
    $sql->execute(
        array(
            ':ssId' => $_GET['id'],
            ':accId' => $_SESSION['account_id']
        )
    );
    $result1 = $sql->fetch(PDO::FETCH_ASSOC);

    $sql1 = $pdo->prepare("SELECT * FROM question_table WHERE ssid=:ssId");
    $sql1->execute(array(':ssId' => $_GET['id']));
    $result2 = $sql1->fetchAll(PDO::FETCH_ASSOC);

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
                    ':ssId' => $_GET['id']
                )
            );
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } else {
        $stmt = $pdo->prepare("SELECT * FROM `question_table` WHERE ssid=:ssId LIMIT {$limit}");
        $stmt->execute(array(':ssId' => $_GET['id']));
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    foreach ($list as $item) {
        $Question = new Question($item['question_id'], $item['question'], $item['type'], 0);
        array_push($listQuestion, $Question);
    }
    $_SESSION['listQuestion'] = $listQuestion;    
?>

<link rel="stylesheet" href="assets/css/learn.css">

<!-- Main -->
<div class="container" style="margin-bottom: 80px; margin-top: 2rem;">
    <div class="flash-box"><?= flashBox($pdo, $listQuestion);?></div>
    <div class="in-progress">
        <h3>Tốt lắm, bạn đang tiến bộ đấy.</h3>
        <div class="d-flex flex-column mt-4">
            <span><small>17 / <?= sizeof($result2) ?> questions</small></span>
            <div class="progress">
                <div class="progress-bar" style="width:70%"></div>
            </div>
        </div>
    </div>
</div>

<div class="checkpoint-ft" style="display: none;">
    <div class="container">
        <div class="ft-content">
            <span>Press the 'Enter' to continue</span>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-primary" onclick="cont()">Continue</button>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="optionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Options</h4>
                <button type="button" class="btn close" data-bs-dismiss="modal">
                    <i class="far fa-times"></i>
                </button>
            </div>
      
            <div class="modal-body">
                <div class="row">
                    <div class="col-5 UIFieldset">
                        <span class="UIFieldset-legend">BACKGROUND</span>
                        <div class="UIFieldset-fields">
                            <div class="toggle-switch">
                                <span class="UIToggle-option light">Light</span>
                                <span class="UIToggle-option dark">Dark</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-5">
                    <div class="UIFieldset">
                        <span class="UIFieldset-legend">RESET PROGRESS</span>
                        <div class="UIFieldset-fields">
                            <button class="btn" type="button">
                                START OVER
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/services/LearnService.js"></script>
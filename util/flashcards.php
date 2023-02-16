<?php

function showFlashCard($pdo, $list) {
    for ($i = 0; $i < sizeof($list); $i++) {
        if($i == 0) {
            echo('<div class="carousel-item active">');
        } else {
            echo('<div class="carousel-item">');
        }
        echo('<div class="flip-card">');
        echo('<div class="flip-card-inner">');
        echo('<div class="flip-card-front qa">');
        echo('<div class="question">'.htmlentities($list[$i]['question']).'</div>');
        echo('<br>');

        $questionId = htmlentities($list[$i]['question_id']);
        
        echo('<ul class="options">');

            $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id = :qid');
            $stmt->execute(array(':qid' => $questionId));
            $listOption = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($listOption as $option) {
                echo('<li>'.$option['option_title'].'</li>');
            }
        echo('</ul>');
        echo('</div>');
        echo('<div class="flip-card-back qa">');
            $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id=:qid AND answer = 1');
            $stmt->execute(array(':qid' => $questionId));
            $answerList = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($answerList) {
                if (count($answerList) > 1) {
                    echo('<ul style="list-style: none;">');
                    foreach ($answerList as $answer) {
                        echo('<li>'.htmlentities($answer['option_title']).'</li>');
                    }
                    echo('</ul>');
                } else {
                    echo(htmlentities($answerList[0]['option_title']));
                }
            }
        echo('</div>');
        echo('</div></div></div>');
    }
}

function getAllCards($pdo, $list, $studyset) {
    foreach($list as $question) {
        echo('<div class="card-option p-0">');
        echo('<div class="card">');
        echo('<div class="card-header">');
        echo('<button class="btn bookmark-card"><i class="far fa-star"></i></button>');
        if($studyset['type'] == 'OWNED') {
            echo('<button class="btn edit-card"><i class="fas fa-pen"></i></button>');
        }
        echo('</div>');
        echo('<div class="card-body">');
        echo('<div class="question">'.htmlentities($question['question']).'</div>');
        echo('<ul class="options">');

        $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id = :qid');
        $stmt->execute(array(':qid' => htmlentities($question['question_id'])));
        $listOption = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($question['type'] == 1) {
            foreach($listOption as $option) {
                if($option['answer'] == 1) {
                    echo('<li class="answer">');
                    echo('<i class="fas fa-check-square"></i>');
                } else {
                    echo('<li>');
                    echo('<i class="far fa-square"></i>');
                }
                echo('<span>'.htmlentities($option['option_title']).'</span>');
                echo('</li>');
            }
        }else{
            foreach($listOption as $option) {
                if($option['answer'] == 1) {
                    echo('<li class="answer">');
                    echo('<i class="far fa-dot-circle"></i>');
                } else {
                    echo('<li>');
                    echo('<i class="far fa-circle"></i>');
                }
                echo('<span>'.htmlentities($option['option_title']).'</span>');
                echo('</li>');
            }
        }
        echo('</ul>');
        echo('</div></div></div>');
    }
}
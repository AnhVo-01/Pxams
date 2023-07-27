<?php

function showFlashCard($pdo, $list) {
    for ($i = 0; $i < sizeof($list); $i++) {
        echo('<div class="swiper-slide">');
        echo('<div class="flip-card">');
        echo('<div class="flip-card-inner">');
        echo('<div class="flip-card-front qa">');
        echo('<div class="question">'.$list[$i]['question'].'</div>');
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
    
}
?>
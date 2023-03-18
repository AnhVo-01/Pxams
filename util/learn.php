<?php 
function flashBox($pdo, $listQuestion, $progress, $total) {
    foreach ($listQuestion as $ques) {
        if ($ques->status != 1){
            echo('<div class="flash-cards">');
            echo('<div class="flash-card-header">');
            if ($ques->status == 2) {
                echo('<span>Question</span><span class="badge bg-warning">'."Let's try again</span>");
            } else {
                echo('<span>Question</span>');
            }
            echo('<a href="#" style="color: #646f90;"><i class="far fa-flag"></i></a>');
            echo('</div>');
            echo('<div class="flash-card-body">');
            echo('<pre class="question">'.htmlentities($ques->title).'</pre>');
            echo('<div>');
            echo('<span>Select the true answer</span>');
            echo('<div class="answer mt-3" id="aws_f_q_'.$ques->qId.'">');
    
            $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id = :qid');
            $stmt->execute(array(':qid' => htmlentities($ques->qId)));
            $listOption = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            for ($i = 0; $i < sizeof($listOption); $i++) {
                echo('<label class="select" id="select'.$ques->qId.$i.'">');
                echo('<input type="radio" name="ans" value="'.$listOption[$i]['answer'].'" class="radiomark" onclick="checkSelect('.$ques->qId.', '.$listOption[$i]['answer'].', '.$i.')">');
                echo('<span class="opt-index" id="oi'.$ques->qId.$i.'">'.($i+1).'</span>');
                echo('<span>'.htmlentities($listOption[$i]['option_title']).'</span>');
                echo('</label>');
            }
            echo('</div></div></div></div>');
        }
    }

    echo('<div class="in-progress">');
    echo('<h3>Tốt lắm, bạn đang tiến bộ đấy.</h3>');
    echo('<div class="d-flex flex-column mt-4">');
    echo('<span><small>');
    echo($progress.' / '. $total . ' questions');
    echo('</small></span>');
    echo('<div class="progress">');
    $tu = (int) $progress;
    $mau = (int) $total;
    $percent = ($tu / $mau) * 100;
                
    echo('<div class="progress-bar" style="width:'.$percent.'%"></div>');
    echo('</div></div>');
    echo('<div class="mt-8>');
    if ($progress == $total) {
        echo('<button class="btn btn-primary" onclick="backToFlashCard()">Go to flashcard</button>');
    } else {
        echo('<button class="btn btn-primary" onclick="contLearn()">Continue</button>');
    }
    echo('</div></div>');
}

function learnSuccessful() {
    echo("success");
}
?>
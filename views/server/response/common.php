<?php

function reloadOption($pdo, $listQuestion) {
    foreach($listQuestion as $question) {
        echo('<div class="card" id="draggable'.htmlentities($question['question_id']).'">');
        echo('<div class="card-header">');
        echo('<ul class="nav card-menu">');
        echo('<li><a href="#" class="btn"><i class="far fa-image fa-lg"></i></a></li>');
        echo('<li><a href="#" class="btn remove-btn"><i class="fas fa-trash"></i></a></li>');
        echo('<li><a href="#" class="btn moveBtn" style="cursor: all-scroll;"><i class="fas fa-grip-lines fa-lg"></i></a></li>');
        echo('</ul></div>');
        echo('<div class="card-body"><div class="row"><div class="col-md-8"><div class="d-flex flex-column gap-3">');
        echo('<textarea id="'.htmlentities($question['question_id']).'" placeholder="Enter question" onchange="setQuestion(this)" onkeyup="expandtext(this);">'.htmlentities($question['question']).'</textarea>');
        echo('<ul class="option_details" id="q'.htmlentities($question['question_id']).'">');

        $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id = :qid');
        $stmt->execute(array(':qid' => htmlentities($question['question_id'])));
        $listOption = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        foreach($listOption as $option) {
            echo('<li id="q'.htmlentities($question['question_id']).'a'.htmlentities($option['option_id']).'">');
            echo('<i class="far fa-circle" id="dragIcon0"></i>');
            echo('<div class="d-flex w-100">');
            echo('<input type="text" placeholder="Enter option" onchange="setOption(this)" id="'.htmlentities($option['option_id']).'" value="'.htmlentities($option['option_title']).'">');

            if($count > 1) {
                echo('<button class="btn" id="q0b" style="color: var(--text-color1);" onclick="deleteOption('.htmlentities($option['option_id']).')"><i class="fa fa-times"></i></button>');
            }
            echo('</div></li>');

        }
        echo('</ul>');

        if($count < 10) {
            echo('<div class="add_option">');
            echo('<i class="far fa-plus"></i>');
            echo('<a href="#" onclick="addMoreOption('.htmlentities($question['question_id']).')" style="font-size: 15px;">More option</a>');
        }else{
            echo('<span>Maximum of nine option entries reached</span>');
        }
        echo('</div></div></div>');

        echo('<div class="col-md-4">');
        echo('<div class="answer_opt">');
        echo('<div style="font-size: 15px;"><i class="far fa-clipboard-check fa-lg"></i><span class="text-primary ms-2">Answer</span></div>');
        echo('<select onchange="setQuestionType(this.value)">');
        echo('<option value="0" selected>&#xf192; &ensp;<span>An option</span></option>');
        echo('<option value="1">&#xf14a; &ensp;<span>Multiple-choice</span></option>');
        echo('</select></div></div></div></div></div>');
    }
}
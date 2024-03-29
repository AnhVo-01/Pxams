<?php
function getQuestion($pdo, $qId) 
{
    $stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE question_id=:questionId ORDER BY `sequence` ASC');
    $stmt->execute(
        array( ':questionId' => $qId )
    );
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function insertQuestion($pdo, $studySet_id)
{
    $stmt = $pdo->prepare('INSERT INTO `question_table`(`type`, `ssid`) VALUES (0, :ssId)');
    $stmt->execute(array(':ssId' => $studySet_id));

    $question_id = $pdo->lastInsertId();
    createOption($pdo, $question_id);
}

function createOption($pdo, $question_id)
{
    $stmt = $pdo->prepare('INSERT INTO `option_table` (question_id) VALUES (:qId)');
    $stmt->execute(array(':qId' => $question_id));
}

function insertOption($pdo, $question_id)
{
    $num = 2;
    for ($i = 1; $i <= 8; $i++) {
        if (!isset($_POST['optionTitle' . $i])) continue;
        $option = $_POST['optionTitle' . $i];

        $stmt = $pdo->prepare('INSERT INTO `option_table`(option_number, option_title, question_id) VALUES (:num, :option, :qid)');
        $stmt->execute(array(
            ':num' => $num,
            ':option' => $option,
            ':qid' => $question_id
        ));
        $num++;
    }
}

function showAll($pdo, $ssId)
{
    $stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE ssid = :ssId ORDER BY `sequence` ASC');
    $stmt->execute(array(':ssId' => $ssId));
    $listQuestion = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($listQuestion as $question) {
        echo ('<div class="card" id="draggable' . htmlentities($question['question_id']) . '">');

        echo ('<div class="card-header">');
        echo ('<button class="btn remove-btn" onclick="deleteQuestion(' . htmlentities($question['question_id']) . ')"><i class="fas fa-trash"></i></button>');
        echo ('<button class="btn moveBtn" style="cursor: all-scroll;"><i class="far fa-ellipsis-h-alt fa-lg"></i></button>');
        echo ('</div>');

        echo ('<div class="card-body">');
        echo ('<div class="row">');
        echo ('<div class="col-md-7">');
        echo ('<div class="d-flex flex-column gap-3">');
        echo ('<textarea class="question" id="' . htmlentities($question['question_id']) . '" placeholder="Enter question" onchange="setQuestion(this)" onkeyup="expandtext(this);">' . htmlentities($question['question']) . '</textarea>');
        echo ('</div>');
        echo ('</div>');

        echo ('<div class="col-md-5">');
        echo ('<div class="answer_opt">');
        echo ('<button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add image">
                            <i class="far fa-image-polaroid fa-lg"></i>
                        </button>');
        echo ('<button type="button" class="btn ' . ($question['answer'] == 1 ? 'btn-outline-success' : '') . '" data-bs-toggle="tooltip" 
                                data-bs-placement="bottom" title="Answer" 
                                onclick="setAnswer(' . htmlentities($question['question_id']) . ')">
                            <i class="far fa-clipboard-check fa-lg"></i>
                        </button>');
        echo ('<select onchange="setQuestionType(this.value,' . htmlentities($question['question_id']) . ')">');
        if ($question['type'] == 0) {
            echo ('<option value="0" selected>&#xf192; &ensp;<span>An option</span></option>');
            echo ('<option value="1">&#xf14a; &ensp;<span>Multiple-choice</span></option>');
        } else {
            echo ('<option value="0">&#xf192; &ensp;<span>An option</span></option>');
            echo ('<option value="1" selected>&#xf14a; &ensp;<span>Multiple-choice</span></option>');
        }
        echo ('</select>');
        echo ('</div>');
        echo ('</div>');

        echo ('<div class="col-12">');
        echo ('<div class="option-container-' . htmlentities($question['question_id']) . '">');
        cancelSetAnswer($pdo, $question);
        echo ('</div>');
        echo ('</div>');
        echo ('</div>');
        echo ('</div>');
    }
}

function setAnswer($pdo, $question)
{
    echo ('<form action="" class="set_answer_' . $question['question_id'] . '">');
    echo ('<input type="hidden" name="question_id" value="' . $question['question_id'] . '">');
    echo ('<input type="hidden" name="action" value="submitAnswer">');
    echo ('<ul class="option_check_details">');

    $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id = :qid');
    $stmt->execute(array(':qid' => $question['question_id']));
    $listOption = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $index = 1;
    foreach ($listOption as $option) {
        echo ('<li>');
        if ($question['type'] == 1) {
            if ($option['answer'] == 1) {
                echo ('<input type="checkbox" class="set-answer" name="answer' . $index . '" checked>');
            } else {
                echo ('<input type="checkbox" class="set-answer" name="answer' . $index . '">');
            }
        } else {
            if ($option['answer'] == 1) {
                echo ('<input type="radio" class="set-answer" name="answer" value="' . $index . '" checked>');
            } else {
                echo ('<input type="radio" class="set-answer" name="answer" value="' . $index . '">');
            }
        }
        echo ('<input type="hidden" class="set-answer" name="option_id' . $index . '" value="' . htmlentities($option['option_id']) . '">');
        echo ('<input type="text" placeholder="Enter option" value="' . htmlentities($option['option_title']) . '" disabled>');
        echo ('</li>');
        $index++;
    }
    echo ('<li class="justify-content-end">');
    echo ('<button type="button" class="btn btn-warning" onclick="submitAnswer(' . $question['question_id'] . ', ' . $question['type'] . ')">Save</button>');
    echo ('</li>');
    echo ('</ul>');
    echo ('</form>');
}

function cancelSetAnswer($pdo, $question)
{
    $stmt = $pdo->prepare('SELECT * FROM `option_table` WHERE question_id = :qid');
    $stmt->execute(array(':qid' => htmlentities($question['question_id'])));
    $listOption = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();

    echo ('<ul class="option_details" id="option_details_' . htmlentities($question['question_id']) . '">');
    for ($i = 0; $i < sizeof($listOption); $i++) {
        echo ('<li id="op' . htmlentities($question['question_id']) . $i . '">');
        if ($question['type'] == 1) {
            echo ('<i class="far fa-square"></i>');
        } else {
            echo ('<i class="far fa-circle"></i>');
        }
        echo ('<div class="d-flex w-100">');
        echo ('<input type="text" placeholder="Enter option" onchange="setOption(this, ' . htmlentities($question['question_id']) . ')" id="' . htmlentities($listOption[$i]['option_id']) . '" value="' . htmlentities($listOption[$i]['option_title']) . '">');

        if ($count > 1) {
            echo ('<button class="btn" style="color: var(--text-color1);" onclick="deleteOption(' . htmlentities($question['question_id']) . ', ' . htmlentities($listOption[$i]['option_id']) . ')"><i class="fa fa-times"></i></button>');
        }
        echo ('</div></li>');
    }
    echo ('</ul>');
    if ($count < 10) {
        echo ('<div class="add_option">');
        echo ('<i class="far fa-plus"></i>');
        echo ('<button type="button" class="btn" onclick="addMoreOption(' . $count . ', ' . $question['type'] . ', ' . htmlentities($question['question_id']) . ')">More option</button>');
        echo ('</div>');
    } else {
        echo ('<span>Maximum of nine option entries reached</span>');
    }
    echo ('</div>');
}

function importPreview($listQuestion) {
    for ($i = 0; $i < sizeof($listQuestion); $i++) {
        if ($listQuestion[$i] === '') {
            echo ('</ul>'); 
            continue;
        }

        if (preg_match("/([(])*[A-Za-z0-9]*([.,)])/", $listQuestion[$i]) == 0) {
            echo ('<ul class="previewRows">');
            echo ('<li>'.$listQuestion[$i].'</li>');
        } else {
            $optionIm = trim(substr($listQuestion[$i], 3));
            echo ('<li>'.$optionIm.'</li>');
        }
    }
}
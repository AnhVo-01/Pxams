function setTitle(e) {
    let desc = document.getElementById("descVal");
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("title="+e.value+"&desc="+desc.value);
}

function setDescription(e) {
    let title = document.getElementById("titleVal");
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("title="+title.value+"&desc="+e.value);
}

function addNewCard() {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.set-body').html(xmlhttp.responseText);
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("action=addQuestion&ssId=" + getUrlParameter("ssid"));
}

function setQuestion(e) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("question="+e.value+"&question_id="+e.id);
}

function setQuestionType(type, id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $(".option-container-"+id).html(xmlhttp.responseText);
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("type="+type+"&question_id="+id);
}

function deleteQuestion(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.set-body').html(xmlhttp.responseText);
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("question_id="+id+"&action=delete&ssId=" + getUrlParameter("ssid"));
}

function setOption(e, qid) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("optionTitle="+e.value+"&option_id="+e.id+"&question_id="+qid);
}

function addMoreOption(count, qType, qid) {
    var optionT1 = '<li id="op'+qid+count+'"><i class="far fa-circle"></i><div class="d-flex w-100"><input type="text" placeholder="Enter option" onchange="setOption(this,'+qid+')" id="'+qid+'" value=""><button class="btn" style="color: var(--text-color1);" onclick="deleteOption(0, '+qid+count+')"><i class="fa fa-times"></i></button></div></li>';
    var optionT2 = '<li id="op'+qid+count+'"><i class="far fa-square"></i><div class="d-flex w-100"><input type="text" placeholder="Enter option" onchange="setOption(this,'+qid+')" id="'+qid+'" value=""><button class="btn" style="color: var(--text-color1);" onclick="deleteOption(0, '+qid+count+')"><i class="fa fa-times"></i></button></div></li>';
    var maxOption = "<span>Maximum of nine option entries reached</span>";

    if (count < 9) {
        if (qType == 1) {
            $("#option_details_"+qid).append(optionT2);
        } else {
            $("#option_details_"+qid).append(optionT1);
        }
    } else {
        $("#option_details_"+qid).append(maxOption);
    }
}

function deleteOption(qid, id) {
    if (qid == 0) {
        $("#op" + id).remove();
    } else {
        xmlhttp.open("POST", "controllers/StudySetController.php");
        xmlhttp.onload = function() {
            if (xmlhttp.readyState === XMLHttpRequest.DONE) {
                if (xmlhttp.status === 200) {
                    $(".option-container-"+qid).html(xmlhttp.responseText);
                }
            }
        }
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("option_id="+id+"&question_id="+qid);
    }
}

// --------------------------------------------------------------------------------------------
var setAnswerType = false;
function setAnswer(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $(".option-container-"+id).html(xmlhttp.responseText);
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("question_id="+id+"&action=setAnswer&active="+!setAnswerType);
    setAnswerType = !setAnswerType;
}

function submitAnswer(id, type) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.set-body').html(xmlhttp.response);
                setAnswerType = false;
            }
        }
    }
    let form = document.querySelector(".set_answer_"+id+"");
    let formData = new FormData(form);
    formData.append('ssId', getUrlParameter("ssid"));
    formData.append('ansType', type);
    xmlhttp.send(formData);
}

// --------------------------------------------------------------------------------------------

function createStudySet(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                if(xmlhttp.responseText === 'toast') {
                    $('.toast-alert').load('views/client/layouts/toast/danger-toast.php');
                    setTimeout(function() {
                        $(".toast").removeClass("show");
                    }, 5000);
                } else {
                    window.location.href = '?redirect=flashcard&id='+id;
                }
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("action=createFinish");
}

function importTerms () {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                window.location.reload();
            }
        }
    }
    let form = document.querySelector("#import-term");
    let formData = new FormData(form);
    xmlhttp.send(formData);
}
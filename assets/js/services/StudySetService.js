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
                $('.set-body').load('util/option.php');
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("action=addQuestion");
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
                $('.set-body').load('util/option.php');
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
                $('.set-body').load('util/option.php');
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("question_id="+id+"&action=delete");
}

function setOption(e) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("optionTitle="+e.value+"&option_id="+e.id);
}

function addMoreOption(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.set-body').load('util/option.php');
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("question_id="+id+"&action=addOption");
}

function deleteOption(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.set-body').load('util/option.php');
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("option_id="+id);
}

function setAnswer(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $(".option-container-"+id+"").html(xmlhttp.responseText);
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("question_id="+id+"&action=setAnswer");
}

function submitAnswer(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.set-body').load('util/option.php');
            }
        }
    }
    let form = document.querySelector(".set_answer_"+id+"");
    let formData = new FormData(form);
    xmlhttp.send(formData);
}

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
const xmlhttp = new XMLHttpRequest();

function redirect(e) {
    xmlhttp.open("GET", "route/routes.php?redirect="+e.id);
    xmlhttp.onload = function() {
        $('#content').innerHTML = this.responseText;
    }
    xmlhttp.send();
}

function editStudySet(id) {
    xmlhttp.open("POST", "controllers/LibraryController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                location.href = '?redirect=studyset';
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("ssID="+id);
}

function setTitle(e) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("title="+e.value);
}

function setDescription(e) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("desc="+e.value);
}

function setQuestion(e) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("question="+e.value+"&question_id="+e.id);
}

function setQuestionType(type, id) {
    console.log(type);
    // xmlhttp.open("POST", "controllers/StudySetController.php");
    // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    // xmlhttp.send("type="+type+"&question_id="+id);
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
                $('.set-body').load('models/option.php');
            }
        }
        // $('.set-body').innerHTML = this.responseText;
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("question_id="+id);
}

function deleteOption(id) {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.set-body').load('models/option.php');
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("option_id="+id);
}

$(document).ready(() => {
    $('.set-body').load('models/option.php');
})
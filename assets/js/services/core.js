const xmlhttp = new XMLHttpRequest();

function redirect(e) {
    xmlhttp.open("GET", "route/routes.php?redirect="+e.id);
    xmlhttp.onload = function() {
        $('#content').innerHTML = this.responseText;
    }
    xmlhttp.send();
}

function createStudySetDraft() {
    xmlhttp.open("POST", "controllers/StudySetController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                window.location.href = '?redirect=studyset';
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("visible=0&editable=1&status=DRAFT");
}

function editStudySet(id) {
    xmlhttp.open("POST", "controllers/LibraryController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                window.location.href = '?redirect=studyset';
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("action=edit&ssID="+id);
}

var ssData = {
    id: '',
    type: ''
}

function deleteConfirm(value) {
    if (value == true) {
        deleteSet(ssData.id, ssData.type);
    }
}

function setDataForDel(id, type) {
    ssData.id = id;
    if (type = 1) {
        ssData.type = 'OWNED';
    } else {
        ssData.type = 'ENROLL';
    }
}

function deleteSet(id, type) {
    xmlhttp.open("POST", "controllers/LibraryController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                ssData.confirm = false;
                window.location.href = '?redirect=library';
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("action=toRecycleBin&ssID="+id+"&type="+type);
}

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
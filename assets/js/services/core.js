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
    confirm: false
}

function deleteConfirm(value) {
    ssData.confirm = value;
    deleteSet(ssData.id);
}

function deleteSet(id) {
    ssData.id = id;
    if (ssData.confirm == true) {
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
        xmlhttp.send("action=toRecycleBin&ssID="+id);
    }
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
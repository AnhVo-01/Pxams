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
                    window.location.href = '?redirect=library';
                }
            }
        }
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send("action=toRecycleBin&ssID="+id);
    }
}
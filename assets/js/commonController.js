function createStudySet() {
    $.post("controllers/StudySetController.php",{
        visible: 0,
        editable: 1,
        status: 'DRAFT'
    }, function(data, status){
        console.log(data);
        if (status === 'success') {
            window.location.href = '?redirect=studyset';
        }
    });
}

function editStudySet(e) {
    $.post("controllers/LibraryController.php",{
        ssID: e
    }, function(data, status){
        if (status === 'success') {
            window.location.href = '?redirect=studyset';
        }
    });
}
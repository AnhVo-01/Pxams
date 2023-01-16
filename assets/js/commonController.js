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


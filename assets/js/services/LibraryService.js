$(document).ready(() => {
    xmlhttp.open("POST", "controllers/LibraryController.php");
        xmlhttp.onload = function() {
            if (xmlhttp.readyState === XMLHttpRequest.DONE) {
                if (xmlhttp.status === 200) {
                    $(".InprogressFeeds").html(xmlhttp.response);
                }
            }
        }
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        xmlhttp.send("action=firstLoad&uid=" + getUrlParameter("uid"));
})


function viewFlashcard(id) {
    window.location.href = "?redirect=flashcard&id=" + id;
}
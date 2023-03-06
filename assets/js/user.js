$(document).ready(() => {
    xmlhttp.open("GET", "https://provinces.open-api.vn/api/p/");
    xmlhttp.onload = function () {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                myObj = JSON.parse(xmlhttp.response);

                console.log(JSON.parse(xmlhttp.response));
                let text = "";
                for (let x in myObj) {
                    text += "<option>" + myObj[x].name + "</option>";
                }
                $("#province").html(text);
            }
        }
    };
    xmlhttp.send();
});

function changeEmail() {
    $(".kt_signin_email").toggleClass("active");
    $(".btn_email_edit").toggleClass("on");
}

function changePass() {
    $(".kt_signin_password").toggleClass("active");
    $(".btn_password_edit").toggleClass("on");
}

function deactivateAcc(e) {
    if ($(e).is(":checked")) {
        $("#kt_account_deactivate_submit").prop("disabled", false);
    } else {
        $("#kt_account_deactivate_submit").prop("disabled", true);
    }
}

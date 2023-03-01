var x = document.getElementById("user-pass");
var submitBtn = document.querySelector(".opt-btn");

$(document).ready(() => {
    $(".showPass").click(() => {
        if (x.type === "password") {
            x.type = "text";
            show.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            x.type = "password";
            show.classList.replace("fa-eye", "fa-eye-slash");
        }
    });

    $(".refresh-captcha").click(function(){
        $(".captcha").load("models/captcha.php");
    });

    function killCopy(){
        return false;
    }
    
    function reEnable(){
        return true;
    }
    
    document.onselectstart = new Function ("return false");
    
    if (window.sidebar){
        document.onmousedown = killCopy;
        document.onclick = reEnable;
    }

    $("#agree").click(() => {
        if (submitBtn.disabled == true) {
            submitBtn.classList.toggle("disable");
            submitBtn.disabled = false;
        } else {
            submitBtn.classList.toggle("disable");
            submitBtn.disabled = true;
        }
    });
})

var xml = new XMLHttpRequest;

// ----------------------------------------------------------------
function do_login(){
    let form = document.getElementById("LoginForm");

    xml.open("POST", "controllers/LoginController.php");
    xml.onload = function() {
        if (xml.readyState === XMLHttpRequest.DONE) {
            if (xml.status === 200) {
                if (xml.responseText == 'success') {
                    window.location.href = "./";
                    window.location.reload();
                } else {
                    window.location.href = "?redirect=login&source=authen";
                }
            }
        }
    }
    let formData = new FormData(form);
    xml.send(formData);
}

function do_signup() {
    let form = document.getElementById("RegForm");
    // form.preventDefault();

    xml.open("POST", "controllers/RegisterController.php");
    xml.onload = function() {
        if (xml.readyState === XMLHttpRequest.DONE) {
            if (xml.status === 200) {
                window.location.href = "?redirect=register&source=authen";
            }
        }
    }
    let formData = new FormData(form);
    xml.send(formData);
}
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

// ----------------------------------------------------------------
function do_login(){
    xmlhttp.open("POST", "controllers/LoginController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                window.location.href = "?redirect=register&source=authen";
            }
        }
    }
    let form = document.getElementById("LoginForm");
    let formData = new FormData(form);
    xmlhttp.send(formData);
}

function do_signup() {
    let form = document.getElementById("RegForm");
    // form.preventDefault();

    xmlhttp.open("POST", "controllers/RegisterController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                window.location.href = "?redirect=register&source=authen";
            }
        }
    }
    let formData = new FormData(form);
    xmlhttp.send(formData);
}
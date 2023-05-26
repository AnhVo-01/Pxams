var submitBtn = document.querySelector(".opt-btn");

$(document).ready(() => {
    $(".showPass").click(() => {
        if ($("#user-pass").attr('type') == 'password') {
            $("#user-pass").attr('type', 'text');
            $(".showPass").attr('class', 'far fa-eye showPass');
        } else {
            $("#user-pass").attr('type', 'password');
            $(".showPass").attr('class', 'far fa-eye-slash showPass');
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

function back() {
    window.history.back();
}

// ----------------------------------------------------------------
$("#LoginForm").submit(function(event) {
    event.preventDefault();

    let form = document.getElementById("LoginForm");
    xmlhttp.open("POST", "controllers/LoginController.php");
    xmlhttp.onload = () => {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                let response = JSON.parse(xmlhttp.response);

                if (response.type == "success") {
                    let expiry = new Date().getTime() + 1000 * 60 * 60 * 24 * 30;
                    let userInfo = Object.assign(response.data, {
                        expiry: expiry,
                    });
                    localStorage.setItem("auth-user", JSON.stringify(userInfo));
                    setCookie('auth-user', response.data.account_id, 30);
                    window.location.href = "./";
                } else {
                    $(".toast-alert").addClass(response.type);
                    $(".toast-body p").html(response.message);
                    $(".toast").addClass("show");
                    setTimeout(function () {
                        $(".toast").removeClass("show");
                    }, 3000);
                }
            }
        }
    };

    let formData = new FormData(form);
    xmlhttp.send(formData);  
});

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
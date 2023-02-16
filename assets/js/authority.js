// ----------------------------------------------------------------

// $(document).ready(function(){
//     $("#close-set").click(function(){
//         $("#lg-form").css("height", "0");
//     });

//     $(".Log").click(function(){
//         $("#lg-form").load("login.php");
//         $("#lg-form").show();
//         // $("#lg-form").css("height", "100%");
//         $("#register").css("border", "none");
//     });

//     $(".Reg").click(function(){
//         $("#lg-form").load("register.php");  
//         $("#lg-form").show();
//         // $("#lg-form").css("height", "100%");
//         $("#login").css("border", "none");
//     });
// });

function do_login(){
    xmlhttp.open("POST", "controllers/LoginController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('#lg-form').load('login.php');
            }
        }
    }
    let form = document.getElementById("LoginForm");
    let formData = new FormData(form);
    xmlhttp.send(formData);
}

// function do_signup() {
//     let email = $("#user-name").val();
//     let pass = $("#user-pass").val();
//     let dob = $("#user-pass").val();

//     $.post("controllers/RegisterController.php",
//     {
//         uname: $("#user-name").value,
//         pass: $("#user-pass").value
//     },

//     function(data, status){
//         console.log(data, status);
//         alert("Data: " + data + "\nStatus: " + status);
//     });
//     console.log($("#user-name").value);
// }
// ----------------------------------------------------------------

$(document).ready(function(){
    $("#close-set").click(function(){
        $("#lg-form").css("height", "0");
    });

    $(".Log").click(function(){
        $("#lg-form").load("login.php");
        $("#lg-form").show();
        // $("#lg-form").css("height", "100%");
        $("#register").css("border", "none");
    });

    $(".Reg").click(function(){
        $("#lg-form").load("register.php");  
        $("#lg-form").show();
        // $("#lg-form").css("height", "100%");
        $("#login").css("border", "none");
    });
});

function do_login(){
    let email = $("#user-name").val();
    let pass = $("#user-pass").val();
    $.post("controllers/LoginController.php",
        {
            uname: email,
            pass: pass
        },

        function(data, status){
            console.log(data, status);
            alert("Data: " + data + "\nStatus: " + status);
        }
    );
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
// var settingsmenu = document.querySelector(".settings-menu");

// function settingsMenuToggle(){
//     settingsmenu.classList.toggle("settings-menu-height");
// }
$(document).ready(function() {
    $('.toggle-switch').click(function(){
        $('.toggle-switch').toggleClass("dark-on");
        document.body.classList.toggle("dark-theme");
    
        if(localStorage.getItem("theme") == "light"){
            localStorage.setItem("theme", "dark");
        }
        else{
            localStorage.setItem("theme", "light");
        }
    });
});

if(localStorage.getItem("theme") == "light"){
    $('.toggle-switch').removeClass("dark-on");
    document.body.classList.remove("dark-theme");
}
else if(localStorage.getItem("theme") == "dark"){
    $('.toggle-switch').addClass("dark-on");
    document.body.classList.add("dark-theme");
}
else{
    localStorage.setItem("theme", "light");
}

// var settingsmenu = document.querySelector(".settings-menu");

// function settingsMenuToggle(){
//     settingsmenu.classList.toggle("settings-menu-height");
// }
$(document).ready(function() {
    $(".toggle-switch").change(() => {
        if(localStorage.getItem("theme") == "light"){
            $(".toggle-switch").prop("checked", true);
            document.body.classList.add("dark-theme");
            localStorage.setItem("theme", "dark");
        }else{
            $(".toggle-switch").prop("checked", false);
            document.body.classList.remove("dark-theme");
            localStorage.setItem("theme", "light");
        }
    })
});

if(localStorage.getItem("theme") == "light"){
    document.body.classList.remove("dark-theme");
    $(".toggle-switch").prop("checked", false);
}
else if(localStorage.getItem("theme") == "dark"){
    document.body.classList.add("dark-theme");
    $(".toggle-switch").prop("checked", true);
}
else{
    localStorage.setItem("theme", "light");
}

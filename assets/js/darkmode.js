// var settingsmenu = document.querySelector(".settings-menu");
var darkBtn = document.querySelector(".toggle-switch");

// function settingsMenuToggle(){
//     settingsmenu.classList.toggle("settings-menu-height");
// }
$('.toggle-switch').click(function(){
    darkBtn.classList.toggle("dark-on");
    document.body.classList.toggle("dark-theme");

    if(localStorage.getItem("theme") == "light"){
        localStorage.setItem("theme", "dark");
    }
    else{
        localStorage.setItem("theme", "light");
    }
});

if(localStorage.getItem("theme") == "light"){
    darkBtn.classList.remove("dark-on");
    document.body.classList.remove("dark-theme");
}
else if(localStorage.getItem("theme") == "dark"){
    darkBtn.classList.add("dark-on");
    document.body.classList.add("dark-theme");
}
else{
    localStorage.setItem("theme", "light");
}

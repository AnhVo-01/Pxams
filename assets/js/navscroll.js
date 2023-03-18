
var mybutton = document.getElementById("back-to-top");
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        $("#header").css("top", "0px");
        $(".mobile-view").css("bottom", "0px");

        setTimeout(() => {
            $(".mobile-view").css("bottom", "-70px");
        }, 3000);
    } else {
        $("#header").css("top", "-70px");
        $(".mobile-view").css("bottom", "-70px");
    }

    prevScrollpos = currentScrollPos;
}

$(document).ready(() => {
    if ($(window).width() <= 768) {
        $(window).click(() => {
            $(".mobile-view").css("bottom", "0px");

            setTimeout(() => {
                $(".mobile-view").css("bottom", "-70px");
            }, 3000);
        });
    
        setTimeout(() => {
            $(".mobile-view").css("bottom", "-70px");
        }, 3000);
    }
})



// When the user clicks on the button, scroll to the top of the document
mybutton.onclick = function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
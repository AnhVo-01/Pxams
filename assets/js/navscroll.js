
var mybutton = document.getElementById("back-to-top");
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("header").style.top = "0px";
    } else {
        document.getElementById("header").style.top = "-70px";
    }
    prevScrollpos = currentScrollPos;
}



// When the user clicks on the button, scroll to the top of the document
mybutton.onclick = function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
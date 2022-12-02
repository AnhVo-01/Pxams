var setting = document.querySelector(".setting-box");

// Get the button that opens the modal
var setBtn = document.getElementById("setBtn");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];
var span = document.getElementById("close-set");

// When the user clicks the button, open the modal 
setBtn.onclick = function(){
    setting.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    setting.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == setting) {
        setting.style.display = "none";
    }
}
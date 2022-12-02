var modal = document.getElementById("myModal");
var collapseSpan = document.querySelector(".dropdown-ls");
var copyBtn = document.getElementById("copyBtn");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];
var span = document.getElementById("close-set");

// When the user clicks the button, open the modal 
btn.onclick = function() {
    if (copyBtn.textContent === "Copied!"){
        copyBtn.textContent = "Copy link";
    }
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    if(event.target = collapseSpan){
        collapseSpan.classList.remove("show");
    }
}

function copyText() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");
    
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
  
    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
    
    /* Alert the copied text */
    alert("Text is copied to clipboard!");

    copyBtn.textContent = "Copied!";
}

$(document).ready(function(){
    $(window).resize(function(){
        var width = $(window).width();
        if (width <= 768){
            $('#header').remove();
        }
    });
});
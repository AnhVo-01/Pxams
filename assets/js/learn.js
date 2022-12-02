var motherBox = document.querySelector(".flash-box");
var choose = document.querySelectorAll(".radiomark");
var selectBox = document.querySelectorAll(".select");
var optIndex = document.querySelectorAll(".opt-index");
var fail = document.querySelector(".checkpoint-ft");


for(let i = 0; i < choose.length; i++){
    choose[i].onclick = function() {
        if(choose[i].value === "true"){
            selectBox[i].style.background = "#19804f";
            selectBox[i].style.border = "0.125em solid var(--text-color1)";

            optIndex[i].style.background = "#19804f";
            optIndex[i].innerHTML = `<i class="fa-solid fa-check fa-xl" style="color: #65c999;"></i>`;

            setTimeout(() => {
                cont();
            }, 1000);
        }else{
            selectFalse(i);
            setTimeout(() => {
                fail.style.display = "block";
            }, 500);
        }
    }
}

function selectFalse(e){
    for (let i = 0; i < choose.length; i++){
        choose[i].disabled = true;
        selectBox[i].style.border = "0.125em solid var(--text-border)";
    }
    selectBox[e].style.border = "0.125em solid #c34632";
    optIndex[e].style.background = "var(--drop-down)";
    optIndex[e].innerHTML = `<i class="fa-solid fa-xmark fa-2xl" style="color: #c34632;"></i>`;
}

function cont(){
    var box = document.querySelectorAll(".flash-cards");

    motherBox.removeChild(box[0]);
    fail.style.display = "none";
}
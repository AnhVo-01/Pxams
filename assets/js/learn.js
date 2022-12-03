var motherBox = document.querySelector(".flash-box");
var choose = document.querySelectorAll(".radiomark");
var selectBox = document.querySelectorAll(".select");
var optIndex = document.querySelectorAll(".opt-index");
var fail = document.querySelector(".checkpoint-ft");


for(let i = 0; i < choose.length; i++){
    choose[i].onclick = function() {
        if(choose[i].value === "true"){
            selectTrue(i);

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

function selectTrue(e){
    selectBox[e].style.background = "#19804f";
    selectBox[e].style.border = "0.125em solid var(--text-color1)";

    optIndex[e].style.background = "#19804f";
    optIndex[e].innerHTML = `<i class="fa-solid fa-check fa-xl" style="color: #65c999;"></i>`;
}

function selectFalse(e){
    for (let i = 0; i < choose.length; i++){
        if(choose[i].value === "true"){
            selectTrue(i);
        }else{
            selectBox[i].style.border = "0.125em solid #282e3e";
            selectBox[i].style.opacity = "0.5";
        }
        choose[i].disabled = true;
    }
    selectBox[e].style.border = "0.125em solid #c34632";
    selectBox[e].style.opacity = "";
    optIndex[e].style.background = "var(--drop-down)";
    optIndex[e].innerHTML = `<i class="fa-solid fa-xmark fa-2xl" style="color: #c34632;"></i>`;
}

function cont(){
    var box = document.querySelectorAll(".flash-cards");

    motherBox.removeChild(box[0]);
    fail.style.display = "";
    for (let i = 0; i < choose.length; i++){
        choose[i].disabled = false;
        selectBox[i].style.border = "";
        selectBox[i].style.opacity = "";
    }
}
const index = document.getElementById("index"),
    total1 = document.getElementById("card-total"),
    total2 = document.getElementById("total"),
    select = document.querySelectorAll(".carousel-item");

var count = 1;
index.innerHTML = count;

$(".prev-btn").click(() => {
    if (count == 1) {
        count = select.length;
    } else {
        count -= 1;
    }
    index.innerHTML = count;
});

$(".next-btn").click(() => {
    if (count == select.length) {
        count = 1;
    } else {
        count += 1;
    }
    index.innerHTML = count;
});

function hiddenSlide() {
    $(".carousel-inner").css("overflow", "hidden");
}

function showSlide() {
    $(".carousel-inner").css("overflow", "unset");
}

let sum = 0;
for (let i = 0; i < select.length; i++) {
    sum++;
}
total1.innerHTML = sum;
total2.textContent = "( " + sum + " )";

// =====================================================================

const ques = document.querySelectorAll(".flip-card-front"),
    ans = document.querySelectorAll(".flip-card-back"),
    flip = document.querySelectorAll(".flip-card-inner"),
    qaBox = document.querySelectorAll(".flip-card");

for (let j = 0; j < qaBox.length; j++){
    qaBox[j].onclick = function(){

        flip[j].style.transform = "rotateX(180deg)";

        if(ans[j].style.display === "flex"){
            ans[j].style.display = "none";
            ques[j].style.display = "flex";
            flip[j].style.transform = "rotateX(0deg)";
        }else{
            ans[j].style.display = "flex";
            ques[j].style.display = "none";
        }
    }
}
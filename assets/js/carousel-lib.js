const index = document.getElementById("index"),
    prevBtn = document.querySelector(".prev-btn"),
    nextBtn = document.querySelector(".next-btn"),
    total1 = document.getElementById("card-total"),
    total2 = document.getElementById("total"),
    select = document.querySelectorAll(".carousel-item");

let count = 1;
index.innerHTML = count;

prevBtn.onclick = function () {
    if (count == 1) {
        count = select.length;
    } else {
        count -= 1;
    }
    index.innerHTML = count;
};
nextBtn.onclick = function () {
    if (count == select.length) {
        count = 1;
    } else {
        count += 1;
    }
    index.innerHTML = count;
};

let sum = 0;
for (let i = 0; i < select.length; i++) {
    sum++;
}
total1.innerHTML = sum;
total2.textContent = "( " + sum + " )";

// =====================================================================

const ques = document.querySelectorAll(".question"),
    ans = document.querySelectorAll(".answer"),
    flip = document.querySelectorAll(".qa"),
    qaBox = document.querySelectorAll(".flip-card");

for (let j = 0; j < qaBox.length; j++){
    qaBox[j].onclick = function(){

        flip[j].style.transform = "rotateX(180deg)";

        if(ans[j].style.display === "flex"){
            ans[j].style.display = "none";
            ques[j].style.display = "block";
            flip[j].style.transform = "rotateX(0deg)";
        }else{
            ans[j].style.display = "flex";
            ques[j].style.display = "none";
            
        }
    }
}
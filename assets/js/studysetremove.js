function delCard(){
    var parent = document.querySelector(".set-body");
    var sum = document.querySelectorAll(".remove-btn");
    
    for (let i=0; i<sum.length; i++){
        sum[i].addEventListener('click', () => {
            const fired_button = sum[i].getAttribute("href"),
                draggable = document.querySelectorAll(".draggable");
    
            var s = fired_button.split("#");
    
            parent.removeChild(draggable[s[1]]);
            
            resetIndex(s[1]);
        });
    }
}

function resetIndex(event){
    var index = document.querySelectorAll("#card-index");
    var reBtn = document.querySelectorAll(".remove-btn");
    
    const step = parseInt(event) + 1;
    var lastersIndex = 0;

    for (let i = 0; i < step; i++){

        lastersIndex = lastersIndex + 1;

        index[i].innerHTML = lastersIndex;
        reBtn[i].href = "#" + (lastersIndex-1);
    }
}
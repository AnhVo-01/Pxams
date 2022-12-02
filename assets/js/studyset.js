// ----- Flip qna ------------------------------------------------
var flipQnA = document.getElementById("flip-qna");
var qblank = document.querySelectorAll("#question");
var ablank = document.querySelectorAll("#answer");

flipQnA.onclick = () =>{
    for(let i = 0; i < qblank.length; i++){
        var temp = qblank[i].value;
        qblank[i].value = ablank[i].value;
        ablank[i].value = temp;
    }
}

// ----- Auto resize textarea ------------------------------------
function expandtext(text) {
    if (text.scrollHeight > text.clientHeight) {
        text.style.height = text.scrollHeight + "px";
    } else {
        text.style.height = "55px";
    }
}

// ----- Add new a element ---------------------------------------
var element = document.querySelector(".set-body");

function addnew(){
    var tag = document.createElement("div");
    var index = document.querySelectorAll("#card-index");
    var newIndex;

    if(index.length < 1){
        newIndex = 1;
    }else{
        newIndex = parseInt(index[index.length-1].textContent) + 1
    }

    tag.classList.add("card","draggable");
    tag.innerHTML = 
    `<div class="card-header">
        <span id="card-index">`+newIndex+`</span>
        <ul class="nav card-menu">
            <li>
                <a href="#" class="btn" style="cursor: all-scroll;">
                    <i class="fa-solid fa-grip-lines fa-lg"></i>
                </a>
            </li>
            <li>
                <a href="#`+(newIndex-1)+`" class="btn remove-btn" onclick="delCard(this)"><i class="fa-solid fa-trash-can fa-sm"></i></a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 question">
                <textarea name="" id="" placeholder="Enter question" onkeyup="expandtext(this);"></textarea>
                <span style="font-size: 12px;">QUESTION</span>
            </div>
            <div class="col-md-6 answer">
                <textarea name="" id="" placeholder="Enter answer" onkeydown="expandtext(this);"></textarea>
                <span style="font-size: 12px;">ANSWER</span>
            </div>
        </div>
    </div>`;
    element.appendChild(tag);
}


// ----- Move a element (Support for touch inputs) ---------------
const d = document.querySelectorAll(".moveBtn");

for (let i = 0; i < d.length; i++) {
    d[i].style.position = "relative";
}

function filter(e) {
    let target = e.target;

    if (!target.classList.contains("moveBtn")) {
        return;
    }

    target.moving = true;

    //NOTICE THIS 👇 Check if Mouse events exist on users' device
    if (e.clientX) {
        // If they exist then use Mouse input
        target.oldX = e.clientX;
        target.oldY = e.clientY;
    } else {
        // Otherwise use touch input
        target.oldX = e.touches[0].clientX;
        target.oldY = e.touches[0].clientY;
    }
    //NOTICE THIS 👆 Since there can be multiple touches, you need to mention which touch to look for, we are using the first touch only in this case

    target.oldLeft = window.getComputedStyle(target).getPropertyValue("left").split("px")[0] * 1;
    target.oldTop = window.getComputedStyle(target).getPropertyValue("top").split("px")[0] * 1;

    document.onmousemove = dr;
    //NOTICE THIS 👇
    document.ontouchmove = dr;
    //NOTICE THIS 👆

    function dr(event) {
        event.preventDefault();

        if (!target.moving) {
            return;
        }
        //NOTICE THIS 👇
        if (event.clientX) {
            target.distX = event.clientX - target.oldX;
            target.distY = event.clientY - target.oldY;
        } else {
            target.distX = event.touches[0].clientX - target.oldX;
            target.distY = event.touches[0].clientY - target.oldY;
        }
        //NOTICE THIS 👆

        target.style.left = target.oldLeft + target.distX + "px";
        target.style.top = target.oldTop + target.distY + "px";
    }

    function endDrag() {
        target.moving = false;
    }
    target.onmouseup = endDrag;
    //NOTICE THIS 👇
    target.ontouchend = endDrag;
    //NOTICE THIS 👆
}
document.onmousedown = filter;
//NOTICE THIS 👇
document.ontouchstart = filter;
//NOTICE THIS 👆

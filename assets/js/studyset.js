// ----- Auto resize textarea ------------------------------------
function expandtext(text) {
    if (text.scrollHeight > text.clientHeight) {
        text.style.height = text.scrollHeight + "px";
    } else {
        text.style.height = "55px";
    }
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

    target.oldLeft =
        window
            .getComputedStyle(target)
            .getPropertyValue("left")
            .split("px")[0] * 1;
    target.oldTop =
        window.getComputedStyle(target).getPropertyValue("top").split("px")[0] *
        1;

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

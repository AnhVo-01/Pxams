window.onbeforeunload = function () {
    xmlhttp.open("POST", "controllers/LearnController.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("ss_id="+getUrlParameter("id")+"&question_id="+"&value="+"&action=saveProgress");

    return "Do you really want to close?";
};

var optionData = {
    id: '',
    value: ''
}

function choose(qid, value) {
    xmlhttp.open("POST", "controllers/LearnController.php");
    xmlhttp.onload = function() {
        if (xmlhttp.readyState === XMLHttpRequest.DONE) {
            if (xmlhttp.status === 200) {
                $('.flash-box').html(xmlhttp.response);
            }
        }
    }
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xmlhttp.send("ss_id="+getUrlParameter("id")+"&question_id="+qid+"&value="+value+"&action=choose");
}

$(".flash-box").load(() => {
    console.log($(".flash-cards").length);
})

function checkSelect(qid, value, target) {
    if (value == 1) {
        selectTrue(qid, target);
        setTimeout(() => {
            choose(qid, value);
        }, 1000);
    } else {
        selectFalse(qid, target);
        optionData.id = qid;
        optionData.value = value;
    }
    $(".radiomark").prop('disabled', true);

    // if ($(".flash-cards").length < 1) {
    //     setTimeout(() => {
    //         $(".in-progress").css("display", "block");
    //     }, 1000);
    // }
}

function selectTrue(qid, e){
    $("#select"+qid+e).css({
            "background": "var(--dark-green)", 
            "border": "0.125em solid var(--light-green-border)"
        });
    $("#oi"+qid+e).css("background", "#19804f");
    $("#oi"+qid+e).html('<i class="fas fa-check fa-xl" style="color: #65c999;"></i>');
}

function selectFalse(qid, e){
    $("#aws_f_q_"+qid+" .radiomark").each((i, e) => {
        if(e.value === '1'){
            selectTrue(qid, i);
        }else{
            $("#select"+qid+i).css({
                "border": "0.125em solid #282e3e", 
                "opacity": "0.5"
            });
        }
    })

    $("#select"+qid+e).css({
        "border": "0.125em solid #c34632",
        "opacity": "unset"
    });
    $("#oi"+qid+e).css("background", "var(--body-color)");
    $("#oi"+qid+e).html('<i class="fas fa-times fa-2xl" style="color: #c34632;"></i>');

    setTimeout(() => {
        $(".checkpoint-ft").css("display", "block");
    }, 500);
    
}

function cont() {
    choose(optionData.id, optionData.value);
    $(".checkpoint-ft").css("display", "none");
}

document.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
      cont();
    }
});
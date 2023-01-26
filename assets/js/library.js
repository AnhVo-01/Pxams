function option(id) {
    $(".ss-menu").css("display", "none");
    $("#menu-"+id).css("display", "block");
}

window.onclick = function() {
    $(".ss-menu").css("display", "none");
}
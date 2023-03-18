<?php
    $_SESSION['action'] = "home";
?>

<link rel="stylesheet" href="assets/css/welcome.css">

<div class="UIContainer">
    <div class="ImageCard">
        <picture>
            <source srcset="assets/image/MobileHero.png" media="(max-width: 768px)">
            <source srcset="assets/image/Alt-Image.png">
            <img src="assets/image/Alt-Image.png" alt="">
        </picture>
        <div class="ImageCard-Text">
            <div class="ImageCard-Text-Content">
                <h1 class="UIHeading">The best digital flashcards and study tools</h1>
                <div class="UIParagraph">
                    <p>Join over 60 million students using Pxams’s science-backed flashcards, practice tests and expert solutions to improve their grades and reach their goals.</p>
                </div>
            </div>
            <div class="ImgCard-Control">
                <a href="?redirect=register&source=authen" class="btn btn-primary Reg">Sign up for free</a>
            </div>
        </div>
    </div>
</div>

<script>
    var width = $(window).width(), height = $(window).height();
    if (width <= 768) {
      jQuery('.Reg').attr("href", "?redirect=login&source=authen&local=user");
      jQuery('.Reg').html("Login");
    } else {
       jQuery('.Reg').attr("href", "?redirect=register&source=authen");
       jQuery('.Reg').html("Sign up for free");
    }
</script>
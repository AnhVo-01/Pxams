<?php
    $_SESSION['action'] = "home";
?>

<link rel="stylesheet" href="assets/css/welcome.css">

<!-- <div class="Login-Cont" id="lg-form"></div> -->

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
                <button class="btn btn-primary Reg">Sign up for free</button>
                <a href="?redirect=mobile/M_authority&local=user" class="btn btn-primary Reg">Login</a>
            </div>
        </div>
    </div>
</div>
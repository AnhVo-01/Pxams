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

<div class="SiteFooter" style="margin-bottom: 60px;">
    <div class="container">
        <div class="SiteFooter-bottom">
            <div class="row">
                <div class="col-lg-2">
                    <h5 class="SiteFooter-sectionLabel">About us</h5>
                    <ul class="navbar-nav">
                        <li class="SiteFooter-sectionLink"><a href="#">About Pxams</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">How Pxams works</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Careers</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Advertise with us</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">News</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Get the app</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="SiteFooter-sectionLabel">For students</h5>
                    <ul class="navbar-nav">
                        <li class="SiteFooter-sectionLink"><a href="#">Flash cards</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Learn</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Exam</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Pxams premium</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="SiteFooter-sectionLabel">For teacher</h5>
                    <ul class="navbar-nav">
                        <li class="SiteFooter-sectionLink"><a href="#">Live</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Checkpoint</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Blogs</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Be the Change</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Pxams premium for teachers</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="SiteFooter-sectionLabel">Resources</h5>
                    <ul class="navbar-nav">
                        <li class="SiteFooter-sectionLink"><a href="#">Help center</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Sign up</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Honor code</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Community guidelines</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Privacy</a> <i class="fa-solid fa-shield-halved"></i></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Terms</a></li>
                        <li class="SiteFooter-sectionLink"><a href="#">Ad and Cookie Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="SiteFooter-sectionLabel">Language & Setting</h5>
                    <ul class="navbar-nav">
                        <li>
                            <select name="" class="UIDropdown-select">
                                <option value="">English</option>
                                <option value="">Vietnamese</option>
                            </select>
                        </li>
                        <li class="SiteFooter-sectionLink mt-3">
                            <div class="theme-setting">
                                <span class="ms-1"><strong>Dark mode</strong></span>
                                <div class="toggle-switch">
                                    <span class="switch"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="SiteFooter-bottom">
            <div class="d-flex justify-content-between gap-2">
                <div class="d-flex flex-column justify-content-between">
                    <ul class="nav justify-content-between">
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item" href="#"><i class="fa-brands fa-twitter fa-lg"></i></a>
                        </li>
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item" href="#"><i class="fa-brands fa-facebook-f fa-lg"></i></a>
                        </li>
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item" href="#"><i class="fa-brands fa-linkedin-in fa-lg"></i></a>
                        </li>
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item" href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                        </li>
                    </ul>
                    <div style="font-size: 14px;">
                        <i class="fa-regular fa-copyright"></i>
                        <span>2022 Pxams - VoAnh</span>
                    </div>
                </div>
                <img src="assets/image/logo.png" style="height: 60px; border-radius: 5px;">
            </div>
        </div>
    </div>
</div>
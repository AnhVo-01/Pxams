<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pxams</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/image/favicon.ico">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/welcome.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://kit.fontawesome.com/a4edd5786f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
    $_SESSION['action'] = "home";
    if( isset($_SESSION['account_id']) ){
?>
    <header id="header">
        <div class="container-fluid">
            <div class="px-3">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <nav class="navbar">
                            <div class="navbar-brand image" id="back-to-top">
                                <img src="assets/image/logo.png" alt="logo">
                            </div>
                        </nav>
                    </div>
        
                    <div class="col-lg-6">
                        <div class="nav-menu">
                            <nav class="navbar navbar-expand-lg w-100">
                                <ul class="nav navbar-nav align-items-center w-100" id="page-header">
                                    <li class="nav-item active px-3">
                                        <a href="#" class="nav-link px-3">
                                            <span class="nav-label">Home</span>
                                        </a> 
                                    </li>
                                    <li class="nav-item px-3">
                                        <a href="#" class="nav-link px-3">
                                            <span class="nav-label">Your folder</span>
                                        </a> 
                                    </li>
        
                                    <!----- Begin Library ----->
                                    <li class="nav-item dropdown px-3">
                                        <a href="#" class="nav-link dropdown-toggle px-3" data-bs-toggle="dropdown">
                                            <span class="nav-label">Library</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="subnavbtn">
                                                <a class="dropdown-item" href="#">
                                                    <span>Study sets</span>
                                                    <i class="fa-solid fa-angle-right pt-1" style="float: right;"></i>
                                                </a>
                                                <div class="subnav">
                                                    <div class="subnav-content">
                                                        <ul class="p-0">
                                                            <li>
                                                                <a href="flashcards.html" class="dropdown-item">
                                                                    <div class="d-flex flex-column">
                                                                        <span>SWP391</span>
                                                                        <span class="text-muted"><small>VoNVA</small></span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li><a href="#" class="dropdown-item">SWP391</a></li>
                                                            <li><a href="#" class="dropdown-item">SWP391</a></li>
                                                            <li><a href="#" class="dropdown-item">SWP391</a></li>
                                                            <li><a href="#" class="dropdown-item">SWP391</a></li>
                                                            <li><a href="#" class="dropdown-item">SWP391</a></li>
                                                            <li><a href="#" class="dropdown-item">SWP391</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="all">
                                                        <a class="dropdown-item text-primary" href="#">View alls</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="subnavbtn">
                                                <a class="dropdown-item" href="#">
                                                    <span>Classes</span>
                                                    <i class="fa-solid fa-angle-right pt-1" style="float: right;"></i>
                                                </a>
                                                <div class="subnav">
                                                    <div class="subnav-content">
                                                        <ul class="p-0">
                                                            <li>
                                                                <a href="#" class="dropdown-item">
                                                                    <div class="d-flex flex-column">
                                                                        <span>Class1</span>
                                                                        <span class="text-muted"><small>VoNVA</small></span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="all">
                                                        <a class="dropdown-item text-primary" href="#">View alls</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
        
                                    <!----- Begin create ----->
                                    <li class="dropdown px-3">
                                        <a class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="color: #fff;">Create</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="newStudyset.html">
                                                    <i class="fa-regular fa-file-lines me-2"></i>
                                                    Study sets
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-regular fa-folder me-2"></i>
                                                    Folder
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-solid fa-user-group me-2"></i>
                                                    Class
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <nav class="navbar" id="user_box">
                            <ul class="nav top-right">
                                <li class="nav-item search-box">
                                    <form action="Search" method="POST">
                                        <i class="fa-solid fa-magnifying-glass fa-lg icon"></i>
                                        <input type="text" placeholder="Search...">
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a href="#" class="rounded-circle top-noti" data-bs-toggle="dropdown">
                                            <span class="badge-num bg-primary">3</span>
                                            <i class="fa-regular fa-bell"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end top-noti-box">
                                            <li>
                                                <a href="#" class="dropdown-item d-flex flex-column">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i class="fa-solid fa-circle fa-2xs" style="color: #0099c6;"></i>
                                                        <p class="small ps-3 m-0" style="color: #0099c6;">11-07-2022</p>
                                                    </div>                         
                                                    <div class="d-flex align-items-center pb-3">
                                                        <span class="rounded-circle top-noti me-3">
                                                            <i class="fa-solid fa-dumbbell"></i>
                                                        </span>
                                                        <span style="font-size: 15px;">New order No. <strong>#11</strong></span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#setting">
                                        <img alt="Ảnh hồ sơ" class="rounded-circle" src="https://gimg.quizlet.com/a-/AOh14GgnLlV8m31W4uh75mFzjx41BLiZE7irWhqAE0S5=s96-c?sz=32" style="height: 32px; width: 32px;">
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-ls collapse" id="setting">
                                <ul class="nav flex-column">
                                    <li class="nav-item nav-tabs">
                                        <div class="d-flex">
                                            <img alt="Ảnh hồ sơ" class="rounded-circle" src="https://gimg.quizlet.com/a-/AOh14GgnLlV8m31W4uh75mFzjx41BLiZE7irWhqAE0S5=s96-c?sz=32" style="height: 32px; width: 32px;">
                                            <div class="d-flex flex-column ps-3">
                                                <span class="small"><strong>VoNVA</strong></span>
                                                <span class="small">vonvahe151420@fpt.edu.vn</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#info">Profile</a> 
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Process</a> 
                                    </li>
                                    <li class="nav-link">
                                        <div class="theme-setting">
                                            <a href="#mode" class="text nav-text">Dark mode</a>
                                            <div class="toggle-switch">
                                                <span class="switch"></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-link nav-tabs">
                                        <a href="#">Setting</a>
                                    </li>
                                    <li class="nav-link">
                                        <a href="#" id="myBtn">Refer a friend</a> 
                                    </li>
                                    <li class="nav-link">
                                        <a href="#">Help and feedback</a> 
                                    </li>
                                    <li class="nav-link">
                                        <a href="#">Blog</a> 
                                    </li>
                                    <li class="nav-link">
                                        <a href="#">Privacy policy</a> 
                                    </li>
                                    <li class="nav-link">
                                        <div class="d-flex">
                                            <a href="#">Premium</a>
                                            <i class="fa-solid fa-gem ms-2" style="color: gold;"></i>
                                        </div>
                                    </li>
                                    <li class="nav-link nav-tabs">
                                        <a href="#">App</a> 
                                    </li>
                                    <li class="nav-link">
                                        <a href="controllers/Logout.php">
                                            <span class="text nav-text">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>         
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Refer a friend --------------------------------------- -->
    <div class="Popup" id="myModal">
        <div class="Refer_a_friend">
            <span class="close" id="close-set">&times;</span>
            <div style="padding: 20px 40px 0;">
                <h1 style="text-align: center;">Share your referral link</h1>
                <hr style="border: 0; height: 1px; background-color: #000; margin: 15px 0;">
            </div>
            <div class="ab-pop">
                <span class="my-3">
                    Invite friends who aren't using Pxams and receive a free week of Pxams Premium
                    <a href="#">Terms apply.</a>
                </span>
                <div class="input-group refer-link mt-5">
                    <input type="text" class="form-control" value="https://quizlet.com/referral-invite/AvoAW123?i=3fuwrc&x=1Nqt" id="myInput" disabled>
                    <button class="btn btn-info" type="button" onclick="copyText()" id="copyBtn">Copy link</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/popup.js"></script>

<?php } else { ?>
    <header id="header">
        <div class="container-fluid">
            <div class="px-3">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <nav class="navbar">
                            <div class="navbar-brand image" id="back-to-top">
                                <img src="assets/image/logo.png" alt="logo">
                            </div>
                        </nav>
                    </div>

                    <div class="col-lg-5">
                        <div class="nav-menu">
                            <nav class="navbar navbar-expand-lg w-100">
                                <ul class="nav navbar-nav align-items-center w-100" id="page-header">
                                    <li class="nav-item px-3">
                                        <a href="index.html" class="nav-link px-3">
                                            <span class="nav-label">Home</span>
                                        </a> 
                                    </li>

                                    <!----- Begin Subject ----->
                                    <li class="nav-item dropdown px-3">
                                        <a href="#" class="nav-link dropdown-toggle px-3" data-bs-toggle="dropdown">
                                            <span class="nav-label">Subject</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="subject subject subnavbtn">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-solid fa-paintbrush"></i>
                                                    <span class="mx-3">Arts and Humanities</span>
                                                    <i class="fa-solid fa-angle-right ms-3 pt-1" style="float: right;"></i>
                                                </a>
                                                <div class="subnav">
                                                    <div class="subnav-content">
                                                        <ul class="py-2 px-0">
                                                            <li><a href="library.html" class="dropdown-item">History</a></li>
                                                            <li><a href="#" class="dropdown-item">English</a></li>
                                                            <li><a href="#" class="dropdown-item">Philosophy</a></li>
                                                            <li><a href="#" class="dropdown-item">Visual Arts</a></li>
                                                            <li><a href="#" class="dropdown-item">Music</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="all">
                                                        <a class="dropdown-item text-primary" href="#">View alls</a>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="subject subnavbtn">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-solid fa-language"></i>
                                                    <span class="mx-3">Languages</span>
                                                    <i class="fa-solid fa-angle-right pt-1" style="float: right;"></i>
                                                </a>
                                                <div class="subnav">
                                                    <div class="subnav-content">
                                                        <ul class="py-2 px-0">
                                                            <li><a href="#" class="dropdown-item"></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="all">
                                                        <a class="dropdown-item text-primary" href="#">View alls</a>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="subject subnavbtn">
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-solid fa-pen-ruler"></i>
                                                    <span class="mx-3">Math</span>
                                                    <i class="fa-solid fa-angle-right pt-1" style="float: right;"></i>
                                                </a>
                                                <div class="subnav">
                                                    <div class="subnav-content">
                                                        <ul class="py-2 px-0">
                                                            <li><a href="#" class="dropdown-item">Arithmetic</a></li>
                                                            <li><a href="#" class="dropdown-item">Geometry</a></li>
                                                            <li><a href="#" class="dropdown-item">Algebra</a></li>
                                                            <li><a href="#" class="dropdown-item">Applied Math</a></li>
                                                            <li><a href="#" class="dropdown-item">Statistic</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="all">
                                                        <a class="dropdown-item text-primary" href="#">View alls</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                    <!----- Begin create ----->
                                    <li class="dropdown px-3">
                                        <a class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="color: #fff;">Create</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="studyset.html">
                                                    <i class="fa-regular fa-file-lines me-2"></i>
                                                    Study sets
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-regular fa-folder me-2"></i>
                                                    Folder
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fa-solid fa-user-group me-2"></i>
                                                    Class
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="col-lg-5">
                        <nav class="navbar" id="user_box">
                            <ul class="nav top-right">
                                <li class="nav-item search-box" style="width: 70%;">
                                    <form action="Search" method="POST">
                                        <i class="fa-solid fa-magnifying-glass fa-lg icon"></i>
                                        <input type="text" placeholder="Search...">
                                    </form>
                                </li>
                                <li class="nav-item">
                                    <button class="btn btn-light" onclick="$('#lg-form').css('height', '100%'); $('#lg-form').load('login.php');" style="padding: 0.27rem 0.75rem;">Login</button>
                                </li>
                                <li class="nav-item">
                                    <button class="btn btn-warning" onclick="$('#lg-form').css('height', '100%'); $('#lg-form').load('signup.php');" style="padding: 0.27rem 0.75rem;">Sign up</button>
                                </li>
                            </ul>       
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script type="text/javascript">
        document.title = "Welcome to Pxams";
    </script>
    <div class="Login-Cont" id="lg-form"></div>
<?php
    }
?>

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
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <ul class="nav">
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item me-3" href="#"><i class="fa-brands fa-twitter fa-lg"></i></a>
                        </li>
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item mx-3" href="#"><i class="fa-brands fa-facebook-f fa-lg"></i></a>
                        </li>
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item mx-3" href="#"><i class="fa-brands fa-linkedin-in fa-lg"></i></a>
                        </li>
                        <li class="SiteFooter-sectionLink">
                            <a class="nav-item ms-3" href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                        </li>
                    </ul>
                    <div style="font-size: 14px;">
                        <i class="fa-regular fa-copyright"></i>
                        <span>2022 Pxams - VoAnh</span>
                    </div>
                </div>
                <img src="assets/image/logo.png" style="height: 65px; border-radius: 5px;">
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="mobile-view">
        <div class="container-fluid">
            <div class="px-3">
                <nav class="navbar navbar-expand-lg w-100">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="mobile/notification.html" class="rounded-circle top-noti border-info">
                                <i class="fa-solid fa-bell"></i>
                                <span class="badge-num bg-primary">3</span>
                            </a>
                        </li>
                        <?php
                            if($_SESSION['action'] == "search"){
                                echo('<li class="nav-item active">'."\n");
                            }else{
                                echo('<li class="nav-item">'."\n");
                            }
                            echo('<a href="?redirect=mobile/search&local=search"><i class="fa-solid fa-magnifying-glass fa-lg"></i></a>'."\n");
                            echo("</li>");
                        ?>
                        <?php
                            if($_SESSION['action'] == "home"){
                                echo('<li class="nav-item active">'."\n");
                            }else{
                                echo('<li class="nav-item">'."\n");
                            }
                            echo('<a href="./"><i class="fa-solid fa-house fa-lg"></i></a>'."\n");
                            echo("</li>");
                        ?>
                        <li class="nav-item">
                            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#create"><i class="fa-solid fa-circle-plus fa-lg"></i></a>
                        </li>
                        <?php 
                            if( isset($_SESSION['account_id']) ){
                                $link = "?redirect=client/pages/user&local=user";
                            } else {
                                $link = "?redirect=mobile/M_authority&local=user";
                            }

                            if($_SESSION['action'] == "user"){
                                echo('<li class="nav-item active">'."\n");
                            }else{
                                echo('<li class="nav-item">'."\n");
                            }
                            echo('<a href="'.$link.'"><i class="fa-solid fa-user fa-lg"></i></a>'."\n");
                            echo("</li>");
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Offcanvas Create -->
        <div class="offcanvas offcanvas-bottom" id="create">
            <div class="offcanvas-body">
                <nav class="navbar justify-content-between">
                    <ul class="navbar-nav">
                        <li class="nav-item py-2">
                            <a href="#">
                                <i class="fa-regular fa-file-lines me-2"></i>
                                Exam
                            </a>
                        </li>
                        <li class="nav-item py-2">
                            <a href="#">
                                <i class="fa-regular fa-folder me-2"></i>
                                Folder
                            </a>
                        </li>
                        <li class="nav-item py-2">
                            <a href="#">
                                <i class="fa-solid fa-user-group me-2"></i>
                                Class
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>

<script src="assets/js/darkmode.js"></script>
<script src="assets/js/navscroll.js"></script>
<script src="assets/js/tooltip.js"></script>

</body>
</html>
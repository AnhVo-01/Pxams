<header id="header">
    <div class="container-fluid">
        <div class="px-3">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-2">
                    <nav class="navbar">
                        <div class="navbar-brand image" id="back-to-top">
                            <img src="assets/image/logo.png" alt="logo">
                        </div>
                    </nav>
                </div>

                <div class="col-lg-6 header-middle">
                    <div class="nav-menu">
                        <nav class="navbar navbar-expand-lg w-100">
                            <ul class="nav navbar-nav align-items-center w-100 gap-3" id="page-header">
                                <li class="nav-item active">
                                    <a href="./" class="nav-link">
                                        <span class="nav-label">Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <span class="nav-label">Your folder</span>
                                    </a>
                                </li>

                                <!----- Begin Library ----->
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                        <span class="nav-label">Library</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="hasChildren">
                                            <a class="dropdown-item" href="#">
                                                <span>Study sets</span>
                                                <i class="fas fa-angle-right pt-1" style="float: right;"></i>
                                            </a>
                                            <div class="subnav">
                                                <div class="subnav-content">
                                                    <ul class="p-0">
                                                        <li>
                                                            <a href="?redirect=client/pages/flashcards" class="dropdown-item">
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
                                        <li class="hasChildren">
                                            <a class="dropdown-item" href="#">
                                                <span>Classes</span>
                                                <i class="fas fa-angle-right pt-1" style="float: right;"></i>
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
                                <li class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="color: #fff;">Create</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" onclick="createStudySet()">
                                                <i class="far fa-clone me-2"></i>
                                                Study sets
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-folder me-2"></i>
                                                Folder
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-user-friends me-2"></i>
                                                Class
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-4 col-md-10">
                    <nav class="navbar" id="user_box">
                        <ul class="nav top-right">
                            <li class="nav-item search-box">
                                <form action="Search" method="POST">
                                    <i class="fas fa-magnifying-glass fa-lg icon"></i>
                                    <input type="text" placeholder="Search...">
                                </form>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="#" class="rounded-circle top-noti" data-bs-toggle="dropdown">
                                        <span class="badge-num bg-primary">3</span>
                                        <i class="far fa-bell"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end top-noti-box">
                                        <li>
                                            <a href="#" class="dropdown-item d-flex flex-column">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-circle fa-2xs" style="color: #0099c6;"></i>
                                                    <p class="small ps-3 m-0" style="color: #0099c6;">11-07-2022</p>
                                                </div>
                                                <div class="d-flex align-items-center pb-3">
                                                    <span class="rounded-circle top-noti me-3">
                                                        <i class="fas fa-dumbbell"></i>
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
                            <li class="nav-item">
                                <button class="menu-toggle">
                                    <i class="far fa-bars"></i>
                                </button>
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
                                    <a href="?redirect=user">Profile</a>
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
                                        <i class="fas fa-gem ms-2" style="color: gold;"></i>
                                    </div>
                                </li>
                                <li class="nav-link nav-tabs">
                                    <a href="#">App</a>
                                </li>
                                <li class="nav-link">
                                    <a href="controllers/LogoutController.php">
                                        <span class="text nav-text">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <script>
                    $(document).ready(function() {
                        $('.menu-toggle').click(function() {
                            $('.header-middle').toggle();
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <!-- Refer a friend --------------------------------------- -->
    <div class="Popup" id="myModal">
        <div class="Refer_a_friend">
            <div class="d-flex justify-content-between align-items-center" style="padding: 20px 40px 0;">
                <h2 style="text-align: center;">Share your referral link</h2>
                <span class="close" id="close-set">&times;</span>
            </div>
            <hr style="border: 0; height: 2px; background-color: #000; margin: 15px 0;">
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
</header>

<script src="assets/js/popup.js"></script>
<script src="assets/js/navscroll.js"></script>
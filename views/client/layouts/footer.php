    <footer>
        <div class="mobile-view">
            <div class="container-fluid">
                <div class="px-3">
                    <nav class="navbar navbar-expand-lg w-100">
                        <ul class="nav">
                            <?php
                                if(isset($_SESSION['activeRoute']) && $_SESSION['activeRoute'] == "notification"){
                                    echo('<li class="nav-item active">'."\n");
                                }else{
                                    echo('<li class="nav-item">'."\n");
                                }
                                echo('<a href="?redirect=mobile/notification&local=notification" class="rounded-circle top-noti border-info">
                                <i class="fas fa-bell"></i>
                                <span class="badge-num bg-primary">3</span></a>'."\n");
                                echo("</li>");
                            ?>
                            <?php
                                if(isset($_SESSION['activeRoute']) && $_SESSION['activeRoute'] == "search"){
                                    echo('<li class="nav-item active">'."\n");
                                }else{
                                    echo('<li class="nav-item">'."\n");
                                }
                                echo('<a href="?redirect=mobile/search&local=search"><i class="far fa-search fa-xl"></i></a>'."\n");
                                echo("</li>");
                            ?>
                            <?php
                                if(!isset($_SESSION['activeRoute'])){
                                    echo('<li class="nav-item active">'."\n");
                                }else{
                                    echo('<li class="nav-item">'."\n");
                                }
                                echo('<a href="./"><i class="fas fa-home-lg fa-xl"></i></a>'."\n");
                                echo("</li>");
                            ?>
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#create"><i class="fas fa-plus-circle fa-xl"></i></a>
                            </li>
                            <?php 
                                if(isset($_SESSION['account_id'])){
                                    $link = "?redirect=profile&local=user";
                                } else {
                                    $link = "?redirect=login&source=authen&local=user";
                                }
        
                                if(isset($_SESSION['activeRoute']) && $_SESSION['activeRoute'] == "user"){
                                    echo('<li class="nav-item active">'."\n");
                                }else{
                                    echo('<li class="nav-item">'."\n");
                                }
                                echo('<a href="'.$link.'"><i class="fas fa-user fa-xl"></i></a>'."\n");
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
                                <a href="?redirect=client/pages/studyset&local=studyset">
                                    <i class="far fa-clone me-2"></i>
                                    Study set
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#">
                                    <i class="far fa-folder me-2"></i>
                                    Folder
                                </a>
                            </li>
                            <li class="nav-item py-2">
                                <a href="#">
                                    <i class="fas fa-user-friends me-2"></i>
                                    Class
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="SiteFooter" style="margin-bottom: 60px;">
            <div class="container">
                <div class="SiteFooter-bottom">
                    <div class="row">
                        <div class="col-lg-2 col-md-6">
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
                        <div class="col-lg-2 col-md-6">
                            <h5 class="SiteFooter-sectionLabel">For students</h5>
                            <ul class="navbar-nav">
                                <li class="SiteFooter-sectionLink"><a href="#">Flash cards</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Learn</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Exam</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Pxams premium</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="SiteFooter-sectionLabel">For teacher</h5>
                            <ul class="navbar-nav">
                                <li class="SiteFooter-sectionLink"><a href="#">Live</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Checkpoint</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Blogs</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Be the Change</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Pxams premium for teachers</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h5 class="SiteFooter-sectionLabel">Resources</h5>
                            <ul class="navbar-nav">
                                <li class="SiteFooter-sectionLink"><a href="#">Help center</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Sign up</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Honor code</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Community guidelines</a></li>
                                <li class="SiteFooter-sectionLink"><a href="#">Privacy</a> <i class="fas fa-shield-halved"></i></li>
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
                                    <a class="nav-item" href="#"><i class="fab fa-twitter fa-lg"></i></a>
                                </li>
                                <li class="SiteFooter-sectionLink">
                                    <a class="nav-item" href="#"><i class="fab fa-facebook-f fa-lg"></i></a>
                                </li>
                                <li class="SiteFooter-sectionLink">
                                    <a class="nav-item" href="#"><i class="fab fa-linkedin-in fa-lg"></i></a>
                                </li>
                                <li class="SiteFooter-sectionLink">
                                    <a class="nav-item" href="#"><i class="fab fa-youtube fa-lg"></i></a>
                                </li>
                            </ul>
                            <div style="font-size: 14px;">
                                <i class="far fa-copyright"></i>
                                <span>2022 Pxams - VoAnh</span>
                            </div>
                        </div>
                        <img src="assets/image/logo.png" style="height: 60px; border-radius: 5px;">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/darkmode.js"></script>
    <script src="assets/js/tooltip.js"></script>
    <script src="assets/js/services/core.js"></script>
</body>
</html>
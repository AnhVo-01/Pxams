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
                                    <a href="./" class="nav-link px-3">
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
                                                <i class="fas fa-paintbrush"></i>
                                                <span class="mx-3">Arts and Humanities</span>
                                                <i class="fas fa-angle-right ms-3 pt-1" style="float: right;"></i>
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

                                        <li class="subject hasChildren">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-language"></i>
                                                <span class="mx-3">Languages</span>
                                                <i class="fas fa-angle-right pt-1" style="float: right;"></i>
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

                                        <li class="subject hasChildren">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-pen-ruler"></i>
                                                <span class="mx-3">Math</span>
                                                <i class="fas fa-angle-right pt-1" style="float: right;"></i>
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
                                                <i class="far fa-file-lines me-2"></i>
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
                                                <i class="fas fa-user-group me-2"></i>
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
                                    <i class="fas fa-magnifying-glass fa-lg icon"></i>
                                    <input type="text" placeholder="Search...">
                                </form>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-light" onclick="$('#lg-form').css('height', '100%'); $('#lg-form').load('login.php');" style="padding: 0.27rem 0.75rem;">Login</button>
                                <!-- <a href="?redirect=authority/login" class="btn btn-light" style="padding: 0.27rem 0.75rem;">Login</a> -->
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-warning" onclick="$('#lg-form').css('height', '100%'); $('#lg-form').load('register.php');" style="padding: 0.27rem 0.75rem;">Sign up</button>
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
<script src="assets/js/navscroll.js"></script>
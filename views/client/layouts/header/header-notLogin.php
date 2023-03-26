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
                                        <li class="subject hasChildren">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-paint-brush-alt"></i>
                                                <span class="subject-title">Arts and Humanities</span>
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
                                                <i class="far fa-language"></i>
                                                <span class="subject-title">Languages</span>
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
                                                <i class="fas fa-pencil-ruler"></i>
                                                <span class="subject-title">Math</span>
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

                                    <script>
                                        $(document).ready(function() {
                                            $('.dropdown-toggle').click(function() {
                                                $('.subnav').css('left', $('.dropdown-menu').width() + 1 +'px');
                                            })
                                        });
                                    </script>
                                </li>

                                <!----- Begin create ----->
                                <li class="dropdown px-3">
                                    <a class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="color: #fff;">Create</a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="studyset.html">
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

                <div class="col-lg-5">
                    <nav class="navbar" id="user_box">
                        <div class="top-right">
                            <div class="search-box">
                                <input type="text" placeholder="Search...">
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <a href="?redirect=login&source=authen" class="btn btn-light bg-light">Login</a>
                                <a href="?redirect=register&source=authen" class="btn btn-warning" style="width: 90px">Sign up</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<script type="text/javascript">
    document.title = "Welcome to Pxams";
</script>
<script src="assets/js/navscroll.js"></script>
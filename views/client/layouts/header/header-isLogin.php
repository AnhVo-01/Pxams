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
                                            <div class="subnav subject-menu">
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
                                            <div class="subnav subject-menu">
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
                                            <div class="subnav subject-menu">
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
                                                $('.subject-menu').css('left', $('.dropdown-menu').width() + 2 +'px');
                                            })
                                        });
                                    </script>
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
                                                    <ul>
                                                    <?php 
                                                        $stmt = $pdo->prepare("SELECT ss.ssid, title, ass.create_by, ass.owner_id, avatar, acc.user_name, ass.date, 
                                                                            ss.status, visible_to, ass.type, active 
                                                                            FROM `study_set` AS ss 
                                                                            INNER JOIN `account_study_set` AS ass ON ss.ssid = ass.ss_id
                                                                            INNER JOIN `account` acc ON ass.owner_id = acc.account_id
                                                                            WHERE ss.status = 'ACTIVE' AND active = 1 AND ass.create_by=:accId ORDER BY ass.date DESC LIMIT 10");
                                                        $stmt->execute(array(':accId' => $_SESSION['account_id']));
                                                        $ssList = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($ssList as $row) {
                                                            echo('<li>');
                                                            echo('<a href="?redirect=flashcard&id='.htmlentities($row['ssid']).'" class="dropdown-item">');
                                                            echo('<div class="d-flex flex-column">');
                                                            echo('<span class="title">'.$row['title'].'</span>');
                                                            echo('<div class="d-flex align-items-center gap-2">');
                                                            echo('<img alt="Ảnh hồ sơ" class="rounded-circle" height="16" src="assets/image/3.png" width="16">');
                                                            echo('<span class="text-muted"><small>'.$row['user_name'].'</small></span>');
                                                            echo('</div>');
                                                            echo('</div>');
                                                            echo('</a>');
                                                            echo('</li>');
                                                        }
                                                    ?>
                                                    </ul>
                                                </div>
                                                <div class="all">
                                                    <a class="dropdown-item text-primary" href="?uid=<?= $_SESSION['account_id'] ?>&redirect=library">View alls</a>
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
                                        <li class="hasChildren">
                                            <a class="dropdown-item" href="#">
                                                <span>Folders</span>
                                                <i class="fas fa-angle-right pt-1" style="float: right;"></i>
                                            </a>
                                            <div class="subnav">
                                                <div class="subnav-content">
                                                    <ul class="p-0">
                                                        <li>
                                                            <a href="#" class="dropdown-item">
                                                                <div class="d-flex flex-column">
                                                                    <span class="text-muted"><small>2 sets</small></span>
                                                                    <span>Folder 1</span>
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
                                            <a class="dropdown-item cursor-pointer" onclick="createStudySetDraft()">
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
                        <div class="top-right gap-5">
                            <div class="search-box">
                                <input type="text" placeholder="Search...">
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <div class="dropdown">
                                    <a href="#" class="rounded-circle top-noti text-light" data-bs-toggle="dropdown">
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
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#setting">
                                    <img alt="Ảnh hồ sơ" class="rounded-circle" src="assets/image/3.png" height="37" width="37">
                                </a>
                            </div>
                        </div>
                        
                        <div class="dropdown-ls collapse" id="setting">
                            <ul class="nav flex-column">
                                <li class="nav-item nav-tabs">
                                    <a href="?redirect=user" class="d-flex">
                                        <img alt="Ảnh hồ sơ" class="rounded-circle" src="assets/image/3.png" height="32" width="32">
                                        <div class="d-flex flex-column ps-3">
                                            <span class="small"><strong>VoNVA</strong></span>
                                            <span class="small">vonvahe151420@fpt.edu.vn</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?redirect=profile">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <div class="theme-setting">
                                        <a href="#mode" class="text nav-text">Dark mode</a>
                                        <div class="form-switch">
                                            <input type="checkbox" class="form-check-input toggle-switch cursor-pointer">
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item nav-tabs">
                                    <a href="#">Premium<i class="fas fa-gem ms-2" style="color: gold;"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" id="myBtn">Refer a friend</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Help and feedback</a>
                                </li>
                                <li class="nav-item nav-tabs">
                                    <a href="#">Privacy policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" onclick="logout()">
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
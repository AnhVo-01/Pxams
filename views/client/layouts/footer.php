<footer>
    <div class="mobile-view">
        <div class="container-fluid">
            <div class="px-3">
                <nav class="navbar navbar-expand-lg w-100">
                    <ul class="nav">
                        <?php
                            if($_SESSION['action'] == "notification"){
                                echo('<li class="nav-item active">'."\n");
                            }else{
                                echo('<li class="nav-item">'."\n");
                            }
                            echo('<a href="?redirect=mobile/notification&local=notification" class="rounded-circle top-noti border-info">
                            <i class="fa-solid fa-bell"></i>
                            <span class="badge-num bg-primary">3</span></a>'."\n");
                            echo("</li>");
                        ?>
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
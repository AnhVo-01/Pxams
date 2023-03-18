<div class="user-top mb-4">
<?php
    if (isset($_GET['local'])) {
        $link = "&local=" . $_GET['local'];
        echo('<div class="row">');
        echo('<div class="col-4"  style="padding-top: 5px;">');
        echo('<a data-bs-toggle="offcanvas" data-bs-target="#setting-box"><i class="fas fa-cog fa-lg"></i></a>');
        echo('</div>');
        echo('<div class="col-4">');
        echo('<div class="image" style="height: 60px; width: 60px; margin: 0 auto;">');
        echo('<img alt="Ảnh hồ sơ" class="rounded-circle" src="assets/image/3.png">');
        echo('</div>');
        echo('<div class="text-center py-3">');
        echo('<span><strong>VoNVA</strong></span>');
        echo('</div></div>');
        echo('<div class="col-4">');
        echo('<div class="premium" style="padding: 5px 10px; font-weight: 600">');
        echo('<a href="#">');
        echo('<span>Premium</span>');
        echo('<i class="fas fa-gem" style="color: gold;"></i>');
        echo('</a>');
        echo('</div></div></div>');
    } else {
        $link = "";
        echo ('<div class="d-flex align-items-center gap-3">');
        echo ('<div class="image" style="height: 80px; width: 80px;">');
        echo ('<img alt="Ảnh hồ sơ" class="rounded-circle" src="assets/image/3.png">');
        echo ('</div>');
        echo ('<div class="about">');
        echo ('<h4 class="username" style="font-weight: 700; margin-bottom: 0;">VoNVA');
        echo ('<div class="premium" style="font-size: 14px; padding-left: 0.5em;">');
        echo ('<a href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Premium">');
        echo ('<i class="fas fa-gem" style="color: gold;"></i>');
        echo ('</a></div></h4>');
        echo ('<span class="text-muted"><strong>Vo Ngo</strong></span>');
        echo ('</div></div>');
    }


    echo('<div class="user-menu pt-3">');
    echo('<nav class="navbar navbar-expand-lg pb-0 w-100">');
    echo('<ul class="nav align-items-center w-100" id="page-header">');

    if ($_GET['redirect'] == 'profile') {
        echo('<li class="nav-item active">');
    } else {
        echo('<li class="nav-item">');
    }
    echo('<a href="?redirect=profile" class="nav-link"><span class="nav-label">Calender</span></a>');
    echo('</li>');

    if ($_GET['redirect'] == 'library') {
        echo('<li class="nav-item active">');
    } else {
        echo('<li class="nav-item">');
    }
    echo('<a href="?uid='.htmlentities($_SESSION['account_id']).'&redirect=library'.$link.'" class="nav-link">');
    echo('<span class="nav-label">Library</span>');
    echo('</a></li>');

    echo('<li class="nav-item">');
    echo('<a href="#" class="nav-link"><span class="nav-label">Class</span></a>');
    echo('</li>');

    echo('<li class="nav-item">');
    echo('<a href="#" class="nav-link"><span class="nav-label">Folder</span></a>');
    echo('</li>');

    echo('</ul></nav></div>');
?>

    <!-- Setting --------------------------------------- -->
    <div class="offcanvas offcanvas-start setting-box" id="setting-box">
        <div class="offcanvas-header">
            <span class="close" id="close-set" data-bs-dismiss="offcanvas">&times;</span>
            <h5 class="ms-4 mt-2">Setting</h5>
        </div>
        <div class="offcanvas-body">
            <div class="set-pop">
                <div class="option">
                    <div class="d-flex flex-column">
                        <span>Account</span>
                        <span class="text-muted"><small>Free</small></span>
                    </div>
                    <div class="btn">
                        <a href="#" class="btn btn-primary">Update: Free try</a>
                    </div>
                </div>
            </div>
            <div class="set-pop">
                <a href="#">
                    <div class="d-flex flex-column">
                        <span>Refer a friend</span>
                        <span class="text-muted">Free</span>
                    </div>
                </a>
            </div>
            <div class="set-pop">
                <a href="#">
                    <div class="d-flex flex-column">
                        <span>Email</span>
                        <span class="text-muted"><small>vomoc123@gmail.com</small></span>
                    </div>
                </a>
                <a href="#">
                    <div class="d-flex flex-column mt-3 pt-3">
                        <span>Username</span>
                        <span class="text-muted"><small>VoNVA</small></span>
                    </div>
                </a>
                <a href="#">
                    <div class="d-flex flex-column mt-3 pt-3">
                        <span>Password</span>
                    </div>
                </a>
            </div>
            <div class="set-pop">
                <div class="option">
                    <div class="d-flex flex-column">
                        <span>Dark mode</span>
                    </div>
                    <div class="form-switch">
                        <input type="checkbox" class="form-check-input toggle-switch cursor-pointer">
                    </div>
                </div>
            </div>
            <div class="set-pop">
                <a href="#">Help Center</a>
            </div>
            <div class="set-pop">
                <a href="#">Send feedback</a>
            </div>
            <div class="set-pop">
                <a href="#">
                    <div class="d-flex flex-column">
                        <span>About</span>
                    </div>
                </a>
                <div class="d-flex flex-column mt-3 pt-3">
                    <span>Version</span>
                    <span class="text-muted"><small>Beta 0.0.1 (20220805)</small></span>
                </div>
            </div>
            <div class="set-pop">
                <a href="controllers/LogoutController.php" class="text-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="assets/css/user.css">

<div class="container mt-4" style="margin-bottom: 80px;">
    <div class="user-top mb-4">
        <div class="row">
            <div class="col-4">
                <a data-bs-toggle="offcanvas" data-bs-target="#setting-box">
                    <i class="fas fa-cog fa-lg"></i>
                </a>
            </div>
            <div class="col-4">
                <div class="image">
                    <img alt="Ảnh hồ sơ" class="rounded-circle" src="https://gimg.quizlet.com/a-/AOh14GgnLlV8m31W4uh75mFzjx41BLiZE7irWhqAE0S5=s96-c?sz=32">
                </div>
                <input type="hidden" class="navbar-brand image">
                <input type="hidden" class="nav-menu">
                <input type="hidden" id="user_box">
                <div class="text-center py-3">
                    <span><strong>VoNVA</strong></span>
                </div>
            </div>
            <div class="col-4">
                <div class="premium">
                    <a href="#"> 
                        <span>Premium</span>
                        <i class="fas fa-gem" style="color: gold;"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="mobile-menu pt-3">
            <nav class="navbar navbar-expand-lg pb-0 w-100">
                <ul class="nav align-items-center w-100" id="page-header">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <span class="nav-label">Calender</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a href="/flashcards.html" class="nav-link">
                            <span class="nav-label">Library</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-label">Class</span>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-label">Folder</span>
                        </a> 
                    </li>
                </ul>
            </nav>
        </div>

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
                        <div class="toggle-switch">
                            <span class="switch"></span>
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

    <div class="calender">
        <div class="month">
            <div class="date">
                <h1></h1>
                <p></p>
            </div>
            <div class="d-flex justify-content-between w-25">
                <i class="fas fa-angle-left prev"></i>
                <i class="fas fa-angle-right next"></i>
            </div>
        </div>
        <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div class="days">
        </div>
    </div>
    <script src="assets/js/calender.js"></script>
</div>
<link rel="stylesheet" href="assets/css/_authen.css">

<div class="Login-Cont">
    <a href="./" class="close px-4" id="close-set">&times;</a>
    <div class="Login-box">
        <div class="form-title">
            <a href="?redirect=login&source=authen" class="authen">Login</a>
            <span class="authen active">Register</span>
        </div>
        <div class="Login-body">
            <?php
                if(isset($_SESSION['error'])) {
                    echo('<div class="p-2">');
                    echo('<p style="color: #f00; margin: 5px 10px;">'.htmlentities($_SESSION['error'])."</p>\n");
                    echo('</div>');
                    unset($_SESSION['error']);
                } elseif(isset($_SESSION['success'])) {
                    echo('<div class="p-2">');
                    echo('<p style="color: #23b26d; margin: 5px 10px;">'.htmlentities($_SESSION['success'])."</p>\n");
                    unset($_SESSION['success']);
                    echo('</div>');
                }
            ?>
    
            <form action="" id="RegForm" onsubmit="do_signup()">
                <!-- RegForm ------------------------------------------------------------- -->
                <div class="Set-pop">
                    <div class="options">
                        <span class="opt-label">BIRTHDAY</span>
                        <div class="d-flex align-items-center gap-3">
                            <input class="in-cus" type="date" name="dob" placeholder="dd/MM/yyyy" required>
                            <span data-bs-toggle="tooltip" data-bs-placement="right" title="Pxams is open to all ages but requires all users provide their real date of birth to comply with local laws.">
                                <i class="far fa-question-circle fa-xl"></i>
                            </span>
                        </div>
                    </div>
                    <div class="options">
                        <span class="opt-label">USERNAME</span>
                        <input class="in-cus" type="text" name="uname" placeholder="pxmas" required>
                    </div>
                    <div class="options">
                        <span class="opt-label">EMAIL</span>
                        <input class="in-cus" type="email" name="email" placeholder="user@pxams.com" required>
                    </div>
                    <div class="options">
                        <span class="opt-label">PASSWORD</span>
                        <input class="in-cus" type="password" name="upass" placeholder="Password" required>
                    </div>
                    <div class="options">
                        <div class="d-flex align-items-center gap-3">
                            <input class="in-cus" type="text" name="captcha" placeholder="Input captcha">
                            <div class="captcha"><?php require 'models/captcha.php'; ?></div>
                            <button type="button" class="btn refresh-captcha btn-warning p-2">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="save-pass">
                        <label class="save-pass-container">I accept Pxams's <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                            <input type="checkbox" name="remember" id="agree">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="options">
                        <button class="opt-btn disable" type="submit" disabled>Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/services/authority.js"></script>
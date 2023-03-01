<link rel="stylesheet" href="assets/css/authen.css">

<!-- Login Content ----------------------------------------- -->
<div class="Login-Cont">
    <a href="./" class="close px-4" id="close-set">&times;</a>
    <div class="Login-box">
        <div class="form-title">
            <span id="login" class="authen active">Login</span>
            <a href="?redirect=register&source=authen" class="authen">Register</a>
        </div>
        <div class="Login-body">
            <div class="third-log">
                <a href="#">
                    <div style="width: 22px;">
                        <i class="fab fa-google fa-lg"></i>
                    </div>
                    <span>Login width Google</span>
                </a>
            </div>
            <div class="third-log">
                <a href="#">
                    <div style="width: 22px;">
                        <i class="fab fa-facebook fa-lg"></i>
                    </div>
                    <span>Login width Facebook</span>
                </a>
            </div>
            <div class="options-divider"><span class="mx-3">or</span></div>

            <?php
                if(isset($_SESSION['error'])) {
                    echo('<div class="p-2">');
                    echo('<p style="color: #f00; margin: 5px 10px;">'.htmlentities($_SESSION['error']).'</p>');
                    echo('</div>');
                    unset($_SESSION['error']);
                }
            ?>
        
            <form action="" id="LoginForm" onsubmit="do_login()">
                <!-- LoginForm ------------------------------------------------------------- -->
                <div class="Set-pop">
                    <div class="options">
                        <input id="user-name" type="text" name="uname" placeholder="Email / User Name" required>
                    </div>
                    <div class="options">
                        <input id="user-pass" type="password" name="pass" placeholder="Password" required>
                        <i class="far fa-eye-slash showPass"></i>
                    </div>
                    <div class="save-pass">
                        <label class="save-pass-container">Remember password
                            <input type="checkbox" name="remember" <?php if(isset($_COOKIE["remember"]) > 0){ ?>checked<?php } ?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="options">
                        <button class="opt-btn" type="submit">Log In</button>
                    </div>
                    <div class="options">
                        <div class="auth-actions">
                            <a href="#">Use magic link instead</a>
                            <a href="forgotten.html">Forgot password?</a>
                        </div>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/authority.js"></script>
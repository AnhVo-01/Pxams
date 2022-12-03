<!-- Login Content ----------------------------------------- -->
<span class="close px-4" id="close-set">&times;</span>
<div class="Login-box">
    <div class="form-title">
        <span id="login" style="border-bottom: thick solid #3ccfcf;">Login</span>
        <span class="Reg" id="register">Register</span>
    </div>
    <div class="Login-body">
        <div class="third-log">
            <a href="#">
                <i class="fa-brands fa-google fa-lg"></i>
                <span>Login width Google</span>
            </a>
        </div>
        <div class="third-log">
            <a href="#">
                <i class="fa-brands fa-facebook fa-lg"></i>
                <span>Login width Facebook</span>
            </a>
        </div>
        <div class="options-divider"><span class="mx-3">or</span></div>
    
        <form id="LoginForm" onsubmit="do_login();">
            <!-- LoginForm ------------------------------------------------------------- -->
            <div class="Set-pop">
                <?php
                    if(isset($_SESSION['error'])) {
                        echo('<p style="color: #f00; margin: 5px 10px;">'.htmlentities($_SESSION['error'])."</p>\n");
                        unset($_SESSION['error']);
                    }
                ?>
                <div class="options">
                    <input id="user-name" type="text" name="uname" placeholder="Email / User Name" required>
                </div>
                <div class="options">
                    <input id="user-pass" type="password" name="pass" placeholder="Password" required>
                    <i class="fa-regular fa-eye-slash showPass"></i>
                </div>
                <div class="save-pass">
                    <label class="save-pass-container">Remember password
                        <input type="checkbox" name="remember" <?php if(isset($_COOKIE["remember"]) > 0){ ?>checked<?php } ?>>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="options">
                    <input type="hidden" name="controller" value="login">
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
<script>
    var x = document.getElementById("user-pass");
    var show = document.querySelector(".showPass");
    show.onclick = () => {
        if (x.type === "password") {
            x.type = "text";
            show.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            x.type = "password";
            show.classList.replace("fa-eye", "fa-eye-slash");
        }
    };
</script>
<script src="assets/js/authority.js"></script>
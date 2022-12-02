<span class="close" id="close-set">&times;</span>
<div class="Login-box">
    <div class="form-title">
        <span class="Log" id="login">Login</span>
        <span id="register" style="border-bottom: thick solid #3ccfcf;">Register</span>
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

        <form action="" method="POST" id="RegForm">
            <!-- RegForm ------------------------------------------------------------- -->
            <div class="Set-pop">
                <?php
                    if(isset($_SESSION['error'])) {
                        echo('<p style="color: #f00; margin: 5px 10px;">'.htmlentities($_SESSION['error'])."</p>\n");
                        unset($_SESSION['error']);
                    }
                ?>
                <div class="options">
                    <span class="opt-label">BIRTHDAY</span>
                    <div class="d-flex align-items-center gap-3">
                        <input class="in-cus" type="date" name="dob" placeholder="dd/MM/yyyy" required>
                        <span data-bs-toggle="tooltip" data-bs-placement="left" title="Pxams is open to all ages but requires all users provide their real date of birth to comply with local laws.">
                            <i class="fa-regular fa-circle-question fa-xl"></i>
                        </span>
                    </div>
                </div>
                <div class="options">
                    <span class="opt-label">USERNAME</span>
                    <input class="in-cus" type="text" name="uname" placeholder="vanh123" required>
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
                        <button type="button" class="btn refresh-captcha btn-warning p-2"><i class="fa-solid fa-rotate fa-lg"></i></button>
                    </div>
                </div>
                <div class="save-pass">
                    <label class="save-pass-container">I accept Pxams's <a href="#" style="color: #3ccfcf;">Terms of Service</a> and <a href="#" style="color: #3ccfcf;">Privacy Policy</a>
                        <input type="checkbox" name="remember" id="agree">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="options">
                    <input type="hidden" name="controller" value="register">
                    <button class="opt-btn disable" type="submit" disabled>Sign Up</button>
                </div>
                <div class="options">
                    <span>Already have an account?</span>
                    <a href="#" class="Log">
                        <span style="color: #3ccfcf;">Login</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".refresh-captcha").click(function(){
            $(".captcha").load("models/captcha.php");
        });
    });
    
    function killCopy(){
        return false;
    }
    
    function reEnable(){
        return true;
    }
    
    document.onselectstart = new Function ("return false");
    
    if (window.sidebar){
        document.onmousedown = killCopy;
        document.onclick = reEnable;
    }

    var submitBtn = document.querySelector(".opt-btn");
        var agBtn = document.getElementById("agree");
        agBtn.onclick = () => {
            if (submitBtn.disabled == true) {
                submitBtn.classList.toggle("disable");
                submitBtn.disabled = false;
            } else {
                submitBtn.classList.toggle("disable");
                submitBtn.disabled = true;
            }
        };
</script>
<script src="assets/js/authority.js"></script>
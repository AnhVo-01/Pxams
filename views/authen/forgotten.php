<link rel="stylesheet" href="assets/css/authen.css">

<!-- Main Content ----------------------------------------- -->
<div class="Login-Cont">
    <div class="Login-box">
        <div class="form-title">
            <h3>Reset your password</h3>
        </div>
        <div class="Login-body">
            <form id="ForgotForm">
                <div class="Set-pop">
                    <p style="font-size: 1rem;font-weight: 400;line-height: 1.625;padding: 0 10px">Enter your username or the email address you signed up with. We'll email you a link to log in and reset your password.</p>
                    <div class="options">
                        <input name="username" placeholder="Input here" type="text" required autocomplete="false">
                        <span class="UIInput-label">USERNAME OR EMAIL ADDRESS</span>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="options">
                                <button class="opt-btn" type="submit">Submit</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="options">
                                <button class="opt-btn opt-btn-cancel" type="button" onclick="back()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/services/Authority.js"></script>
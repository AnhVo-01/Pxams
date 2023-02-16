<link rel="stylesheet" href="assets/css/welcome.css">
<div class="Login-Cont" id="lg-form">
    <?php
        require_once 'login.php'
    ?>
</div>
<script>
    $(document).ready(function() {
        $(".Log").click(function() {
            $("#lg-form").load("login.php");
            $("#lg-form").show();
            $("#register").css("border", "none");
        });

        $(".Reg").click(function() {
            $("#lg-form").load("register.php");
            // $("#lg-form").show();
            $("#login").css("border", "none");
        });
    });
</script>

<div class="toggle-switch" style="display: none;">
    <span class="switch"></span>
</div>
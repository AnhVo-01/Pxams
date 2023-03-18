<?php
    setcookie("remember", "", time() - 3600);
    session_start();
    session_destroy();
    header("Location: ../");
?>
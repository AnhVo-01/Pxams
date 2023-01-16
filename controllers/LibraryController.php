<?php
require_once '../models/pdo.php';
require_once '../models/util.php';
session_start();

if (isset($_POST['ssID'])) {
    $_SESSION['study_set_id'] = $_POST['ssID'];
    exit();
}

?>
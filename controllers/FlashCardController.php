<?php
require_once '../models/pdo.php';
session_start();

if (isset($_GET['ssid'])) {
    $_SESSION['study_set_id'] = $_GET['ssid'];
    exit();
}

?>
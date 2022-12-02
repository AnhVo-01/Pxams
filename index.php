<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pxams</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/image/favicon.ico">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://kit.fontawesome.com/a4edd5786f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link href="assets/css/plugins/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
	require_once 'models/pdo.php';

	require('controllers/HeaderController.php');
    // require 'views/client/layouts/header.php';


	if (isset($_POST['controller'])) {
		require_once('route/web.php'); /*xử lý các request trong Route/web.php*/
	} elseif(isset($_GET['redirect'])) {
		require('route/redirect.php');
	} else {
		require('views/client/pages/home.php'); /*require giao diện trang chủ*/
	}

	require('views/client/layouts/footer.php');
?>

<script src="assets/js/darkmode.js"></script>
<script src="assets/js/navscroll.js"></script>
<script src="assets/js/tooltip.js"></script>

</body>
</html>
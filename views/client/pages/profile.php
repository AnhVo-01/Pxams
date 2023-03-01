<link rel="stylesheet" href="assets/css/user.css">

<div class="container mt-4" style="margin-bottom: 80px;">
    <?php
        require "user-profile.php"
    ?>

    <div class="calender">
        <div class="month">
            <div class="date">
                <h1></h1>
                <p></p>
            </div>
            <div class="d-flex justify-content-between w-25">
                <i class="fas fa-angle-left prev"></i>
                <i class="fas fa-angle-right next"></i>
            </div>
        </div>
        <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
        </div>
        <div class="days">
        </div>
    </div>
    <script src="assets/js/calender.js"></script>
</div>
<link rel="stylesheet" href="assets/css/feedback.css">

<div class="system-report">
    <div class="system-report-box">
        <div style="padding: 10px 40px 0;">
            <div class="d-flex flex-row-reverse justify-content-between align-items-center">
                <span class="close" onclick="closeDialog();">&times;</span>
                <h5>REPORTS</h5>
            </div>
            <hr style="border: 0; height: 1px; background-color: #000; margin: 0 0 15px;">
        </div>
        <form action="controllers/StudySetController.php" method="POST">
            <div class="report-content">
                <div class="d-flex flex-column gap-2">
                    <div>
                        <small>TITLE</small>
                        <span class="text-danger">*</span>
                    </div>
                    <input type="text" name="title" placeholder="Report title" required>
                </div>
                <div class="d-flex flex-column gap-2">
                    <div>
                        <small>MESSAGE</small>
                        <span class="text-danger">*</span>
                    </div>
                    <textarea name="message" placeholder="Messages" required></textarea>
                </div>
                <input type="file" name="img">
            </div>
            <div style="padding: 0 40px 10px;">
                <hr style="border: 0; height: 1px; background-color: #000; margin: 15px 0;">
                <button type="submit" class="btn submit-form">Send</button>
            </div>
        </form>
    </div>
</div>

<script>
    function closeDialog(){
        $(".system-report").css("display", "none");
    }
</script>
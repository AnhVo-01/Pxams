<div class="toast show">
    <div class="toast-header">
        <strong class="me-auto">Attention!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body">
    <?php
        if(isset($_SESSION['toast'])) {
            echo('<p style="color: #f00; margin: 5px 10px;">'.htmlentities($_SESSION['toast'])."</p>\n");
            unset($_SESSION['toast']);
        }
    ?>
    </div>
</div>
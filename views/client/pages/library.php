<link rel="stylesheet" href="assets/css/library.css">

<div class="container mt-4" style="margin-bottom: 80px;">
    <?php
        require "user-profile.php"
    ?>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-9">
            <?php 
                $stmt = $pdo->prepare('SELECT * FROM `study_set` AS ss 
                                        INNER JOIN `account_study_set` AS ass ON ss.ssid = ass.ss_id 
                                        INNER JOIN `account` acc ON ass.create_by = acc.account_id WHERE acc.account_id = :accId');
                $stmt->execute(array(':accId' => $_GET['uid']));
                $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($rs) {
            ?>
                <div class="d-flex align-items-center justify-content-between mt-3 mb-5">
                    <div class="library-filter">
                        <select id="f-type">
                            <option value="">Created</option>
                            <option value="" selected>Recent</option>
                            <option value="">Studied</option>
                        </select>
                    </div>
                    <label class="search">
                        <input type="text" placeholder="Search your sets" value="">
                        <div class="search-icon">
                            <i class="far fa-search"></i>
                        </div>
                    </label>
                </div>

                <div class="LatestActivityFeed">
                    <div class="InprogressFeeds mb-5"></div>

                    <div class="DashboardFeed mb-5">
                        <?php
                            include_once 'util/library.php';
                            if (isset($_GET['uid'])) {
                                for ($y = date("Y"); $y > 2001; $y--) {
                                    for ($m = 12; $m > 0; $m--) {
                                        getDashboardFeed($pdo, $_GET['uid'], $m, $y);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            <?php
                } else {
            ?>
                <div class="py-4">
                    <div class="px-5">
                    <div class="empty-page">
                        <img alt="No classes found in library" src="assets/image/17-dark.png" width="300">
                        <h3 class="mt-4">You haven't created or enrolled on any study set</h3>
                        <!-- <span>Create a class to help organize your sets and share them with your classmates</span> -->
                        <div class="mt-4">
                            <button type="button" aria-label="Create a study set" class="btn btn-primary" onclick="createStudySetDraft()">
                                Create a study set
                            </button>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>        

                <!-- The Modal -->
                <div class="modal fade" id="confirm">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="py-3 mb-2">Move to bin?</h4>
                                <p>This study set will be moved to bin and deleted forever after 30 days.</p>
                                <p>If this file is shared, collaborators can still make a copy of it until it's permanently deleted.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-confirm" onclick="deleteConfirm(true);">OK</button>
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/library.js"></script>
    <script src="assets/js/services/LibraryService.js"></script>
</div>
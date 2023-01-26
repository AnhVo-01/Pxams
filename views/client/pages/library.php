<?php 
    $stmt = $pdo->prepare('SELECT ssid, title, cdate, udate, status, visible_to, ass.active
                            FROM `study_set` AS ss 
                            INNER JOIN `acount_study_set` AS ass ON ss.ssid = ass.ss_id 
                            INNER JOIN `account` acc ON ass.account_id = acc.account_id WHERE acc.account_id = :accId ORDER BY udate DESC');
    $stmt->execute(array(':accId' => $_SESSION['account_id']));
    $progressList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="assets/css/library.css">

<div class="container mt-4" style="margin-bottom: 80px;">
    <div class="user-top mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="image">
                <img alt="Ảnh hồ sơ" class="rounded-circle" src="https://gimg.quizlet.com/a-/AOh14GgnLlV8m31W4uh75mFzjx41BLiZE7irWhqAE0S5=s96-c?sz=32">
            </div>
            <div class="about">
                <h4 class="username">VoNVA
                    <div class="premium">
                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Premium">
                            <i class="fas fa-gem" style="color: gold;"></i>
                        </a>
                    </div>
                </h4>
                <span class="text-muted"><strong>Vo Ngo</strong></span>
            </div>
        </div>
        <div class="user-menu pt-3">
            <nav class="navbar navbar-expand-lg pb-0 w-100">
                <ul class="nav align-items-center w-100" id="page-header">
                    <li class="nav-item">
                        <a href="?redirect=user" class="nav-link">
                            <span class="nav-label">Calender</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <span class="nav-label">Library</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-label">Class</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-label">Folder</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-9">
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
                    <?php 
                    if($progressList){
                        echo('<div class="InprogressFeeds mb-5">');
                        echo('<h3 class="Feed-title">IN PROGRESS</h3>');
                        foreach($progressList as $row) {
                            if ($row['active'] == 1 && $row['status'] !== 'ACTIVE') {
                                echo('<div class="ListItemGroup" oncontextmenu="option('.htmlentities($row['ssid']).'); return false;">');
                                echo('<div class="ListItem" onclick="editStudySet('.htmlentities($row['ssid']).')">');
                                echo('<div class="SetPreview">');
                                echo('<div class="SetPreviewTitle">');
                                if($row['status'] === 'DRAFT' || $row['status'] === 'INPROGRESS') {
                                    echo('<span>( '.htmlentities($row['status']).' )</span>');
                                }
                                if($row['title']) {
                                    echo('<span>'.htmlentities($row['title']).'</span>');
                                }
                                if($row['visible_to'] == 1) {
                                    echo('<i class="far fa-user-friends"></i>');
                                } else if ($row['visible_to'] == 2 || $row['visible_to'] == 3) {
                                    echo('<i class="far fa-lock-alt"></i>');
                                }
                                echo('</div></div></div>');
                                echo('<ul class="ss-menu" id="menu-'.htmlentities($row['ssid']).'">');
                                echo('<li><button type="button" class="btn menu-item" onclick="deleteSet('.htmlentities($row['ssid']).');" data-bs-toggle="modal" data-bs-target="#confirm">');
                                echo('<i class="far fa-trash"></i><span>Remove</span>');
                                echo('</button></li>');
                                echo('</ul>');
                                echo('</div>');
                            }
                        }
                        echo('</div>');
                    }
                    ?>

                    <div class="DashboardFeed mb-5">
                        <div class="DashboardFeedGroup">
                            <h3 class="Feed-title">Last Week</h3>
                            <div class="ListItem">
                                <div class="SetPreview">
                                    <div class="TermsCount">
                                        <span>77 Terms</span>
                                        <a href="#" class="owned">
                                            <img alt="Ảnh hồ sơ" class="profile-image" height="16" referrerpolicy="no-referrer" src="https://gimg.quizlet.com/a/AEdFTp7cUVYmF2EAGD0TEY3U6Bqvqc2OLrRaEiYZ4yP-yg=s96-c?sz=16" width="16">
                                            <span class="username">chinhl051101</span>
                                        </a>
                                    </div>
                                    <div class="SetPreviewTitle">
                                        <span></span>
                                        <span>SYB302c</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
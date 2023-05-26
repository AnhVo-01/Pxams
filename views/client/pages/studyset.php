<?php
require_once 'util/StudySet.php';
$stmt = $pdo->prepare('SELECT * FROM `study_set` WHERE ssid = :ssId');
$stmt->execute(array(':ssId' => $_GET['ssid']));
$ssDetails = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="assets/css/studyset.css">

<div class="toast-alert"></div>

<!-- Main Content --------------------------------------- -->
<div class="container" style="margin-bottom: 80px;">
    <div class="study-set">
        <div class="set-title">
            <div class="d-flex flex-column">
                <h5>Create a new study set</h5>
                <!-- <span class="text-muted"><small>Saved 4 min ago</small></span> -->
                <span class="text-muted"><small><?= htmlentities($ssDetails['udate']) ?></small></span>
            </div>
            <div class="d-none d-lg-block">
                <?php
                if ($ssDetails['status'] == 'ACTIVE') {
                    echo ('<a href="?redirect=flashcard&id=' . $_GET['ssid'] . '" class="btn btn-primary">Save</a>');
                } else {
                    echo ('<button type="button" class="btn btn-primary" onclick="createStudySet(' . $_GET['ssid'] . ')">Create</button>');
                }
                ?>
            </div>
        </div>

        <div class="set-header">
            <div class="d-flex flex-column my-3">
                <span>Title</span>
                <input type="text" id="titleVal" placeholder="Enter a title" value="<?= htmlentities($ssDetails['title']) ?>" onchange="setTitle(this)">
            </div>
            <div class="d-flex flex-column my-3">
                <span>Description</span>
                <input type="text" id="descVal" placeholder="Add a description..." value="<?= htmlentities($ssDetails['description']) ?>" onchange="setDescription(this)">
            </div>

            <div class="cards-control">
                <ul class="nav">
                    <li class="mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Setting">
                        <button class="nav-item" data-bs-toggle="collapse" data-bs-target="#options">
                            <i class="fas fa-cog fa-lg"></i>
                        </button>
                    </li>
                    <li class="mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Import">
                        <button class="nav-item" onclick="openImportTerm()">
                            <i class="fas fa-file-import"></i>
                        </button>
                    </li>
                    <li class="mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Error report">
                        <button class="nav-item" onclick="report();">
                            <i class="fas fa-exclamation-triangle"></i>
                        </button>
                    </li>
                </ul>
                <!-- study-set options --------------------------------------- -->
                <div class="study-set-options collapse" id="options">
                    <div class="study-set-box">
                        <div style="padding: 10px 40px 0;">
                            <div class="d-flex flex-row-reverse justify-content-between align-items-center">
                                <span class="close" data-bs-toggle="collapse" data-bs-target="#options">&times;</span>
                                <h5>OPTIONS</h5>
                            </div>
                            <hr style="border: 0; height: 1px; background-color: #000; margin: 0 0 15px;">
                        </div>
                        <form action="controllers/StudySetController.php" method="POST">
                            <div class="opt-pop">
                                <div class="row">
                                    <div class="col-md-6 my-3">
                                        <div class="d-flex flex-column">
                                            <span class="mb-2"><small>VISIBLE TO</small></span>
                                            <select name="visible" class="select-menu">
                                                <option value="0" <?= htmlentities($ssDetails['visible_to']) == 0 ? 'selected' : '' ?>>Everyone</option>
                                                <option value="1" <?= htmlentities($ssDetails['visible_to']) == 1 ? 'selected' : '' ?>>Certain Classes</option>
                                                <option value="2" <?= htmlentities($ssDetails['visible_to']) == 2 ? 'selected' : '' ?>>User with a password</option>
                                                <option value="3" <?= htmlentities($ssDetails['visible_to']) == 3 ? 'selected' : '' ?>>Just me</option>
                                            </select>
                                            <span class="des-text">
                                                <?php
                                                if (htmlentities($ssDetails['visible_to']) == 1) {
                                                    echo ('All members in the class can use this set');
                                                } else if (htmlentities($ssDetails['visible_to']) == 2) {
                                                    echo ('Only people with this password can use this set');
                                                } else if (htmlentities($ssDetails['visible_to']) == 3) {
                                                    echo ('Only you can view this set');
                                                } else {
                                                    echo ('All users can use this set');
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="set-pass">
                                            <input type="password" name="visible_pass" class="select-menu" value="<?= htmlentities($ssDetails['visible_pass']) ?>" placeholder="Create a password">
                                            <span class="mt-2"><small>PASSWORD</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <div class="d-flex flex-column">
                                            <span class="mb-2"><small>EDITABLE BY</small></span>
                                            <?php
                                            echo ('<select name="editable" class="select-menu">');
                                            if (htmlentities($ssDetails['visible_to']) != 3) {
                                                if (htmlentities($ssDetails['editable_by']) == 0) {
                                                    echo ('<option value="0" id="justme" selected>Users with a password</option>');
                                                    echo ('<option value="1">Just me</option>');
                                                } else {
                                                    echo ('<option value="0" id="justme">Users with a password</option>');
                                                    echo ('<option value="1" selected>Just me</option>');
                                                }
                                            } else {
                                                echo ('<option value="1" selected>Just me</option>');
                                            }

                                            echo ('</select>');
                                            echo ('<span class="des-text">');
                                            if (htmlentities($ssDetails['editable_by']) == 1) {
                                                echo ('Only you can edit this set');
                                            } else {
                                                echo ('Only people with this password can edit this set');
                                            }
                                            echo ('</span>');
                                            ?>
                                        </div>
                                        <div class="set-pass">
                                            <input type="password" name="editable_pass" class="select-menu" value="<?= htmlentities($ssDetails['editable_pass']) ?>" placeholder="Create a password">
                                            <span class="mt-2"><small>PASSWORD</small></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 0 40px 10px;">
                                <hr style="border: 0; height: 1px; background-color: #000; margin: 15px 0;">
                                <button type="submit" class="btn submit-form">SAVE</button>
                            </div>
                        </form>
                    </div>
                    <script type="text/javascript">
                        let desText = document.querySelectorAll(".des-text");
                        let menu = document.querySelectorAll(".select-menu");
                        let setPass = document.querySelectorAll(".set-pass");

                        menu[0].onclick = function() {
                            if (menu[0].options[menu[0].selectedIndex].text == "Everyone") {
                                desText[0].innerHTML = "All users can use this set";
                                setPass[0].style.display = "none";
                            } else if (menu[0].options[menu[0].selectedIndex].text == "Certain Classes") {
                                desText[0].innerHTML = "All members in the class can use this set";
                                setPass[0].style.display = "none";
                            } else if (menu[0].options[menu[0].selectedIndex].text == "Just me") {
                                desText[0].innerHTML = "Only you can view this set";
                                setPass[0].style.display = "none";
                            } else {
                                desText[0].innerHTML = "Only people with this password can use this set";
                                setPass[0].style.display = "flex";
                            }

                            // ---------------------------------------------------------------
                            if (menu[0].options[menu[0].selectedIndex].text == "Just me") {
                                document.getElementById("justme").style.display = "none";
                            } else {
                                document.getElementById("justme").style.display = "block";
                            }
                        };

                        menu[2].onclick = function() {
                            if (menu[2].options[menu[2].selectedIndex].text == "Users with a password") {
                                desText[1].innerHTML = "Only people with this password can edit this set";
                                setPass[1].style.display = "flex";
                            } else {
                                desText[1].innerHTML = "Only you can edit this set";
                                setPass[1].style.display = "none";
                            }
                        }
                    </script>
                </div>

                <!-- study-set report -->
                <div id="study-set-report"></div>
            </div>
        </div>

        <div class="set-body">
            <?php
            showAll($pdo, $_GET['ssid']);
            ?>
        </div>

        <div class="card" style="background: inherit; border-radius: .25em;">
            <div class="card-body addnew">
                <button class="btn" onclick="addNewCard()">
                    <i class="fas fa-plus fa-xs"></i>
                    <span>ADD CARD</span>
                </button>
            </div>
        </div>

        <div class="cards-control">
            <?php
            if ($ssDetails['status'] == 'ACTIVE') {
                echo ('<a href="?redirect=flashcard&id=' . $_GET['ssid'] . '" class="btn btn-primary">Save</a>');
            } else {
                echo ('<button type="button" class="btn btn-primary" onclick="createStudySet(' . $_GET['ssid'] . ')">Create</button>');
            }
            ?>
        </div>
    </div>
</div>

<div class="ImportTerms">
    <div class="container">
        <div class="cancel mb-8">
            <button type="button" class="btn" onclick="openImportTerm()">Cancel Import</button>
        </div>
        <div class="d-flex align-items-center">
            <span class="fw-bolder">Import your data.&nbsp;</span>
            <span>Copy and Paste your data here (from Word, Excel, Google Docs, etc.)</span>
        </div>
        <form id="import-term">
            <input type="hidden" name="action" value="importTerm">
            <textarea class="import-textarea" name="inputT" placeholder="Question1   Answer1
Option 1
Option 2

Question2   Answer2
Option 1
Option 2"></textarea>
            <div class="ImportBtn">
                <button type="button" class="btn btn-success" onclick="importTerms()">
                    Import
                </button>
            </div>
        </form>
    </div>

    <div class="import-terms-preview">
        <div class="container">
            <h5 class="fw-bolder">Preview</h5>
            <div class="ImportTerms-previewRows">
                <p>Nothing to preview yet.</p>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/studyset.js"></script>
<script src="assets/js/services/StudySetService.js"></script>
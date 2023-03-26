<?php
require_once 'util/flashcards.php';

$stmt = $pdo->prepare('SELECT ssid, title, description, ass.date, visible_to, editable_by, ass.type, active, user_name
                        FROM `study_set` AS ss 
                        INNER JOIN `account_study_set` AS ass ON ss.ssid = ass.ss_id 
                        INNER JOIN `account` acc ON ass.create_by = acc.account_id 
                        WHERE ss.ssid=:ssId');
$stmt->execute(array(':ssId' => $_GET['id']));
$studyset = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $pdo->prepare('SELECT * FROM `question_table` WHERE ssid = :ssId');
$stmt->execute(array(':ssId' => $_GET['id']));
$listQuestion = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="assets/css/flashcards.css">

<!-- Main Content ----------------------------------------- -->
<div class="container" style="margin-bottom: 80px;">
    <div class="my-8">
        <div class="row mb-3">
            <div class="col-md-8">
                <!-- Carousel -->
                <div class="swiper mySwiper">
                    <!-- The slideshow/carousel -->
                    <div class="swiper-wrapper">
                        <?php showFlashCard($pdo, $listQuestion) ?>
                    </div>

                    <div class="controls">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="my-3">
                    <h4><?= $studyset['title'] ?></h4>
                    <span class="text-muted"><?= $studyset['description'] ?></span>
                </div>
                <div class="cre-user mb-3">
                    <div class="d-flex align-items-center">
                        <div class="cre-ava">
                            <span style="line-height: 1;"><?= substr($studyset['user_name'], 0, 1) ?></span>
                        </div>
                        <a href="library.html">
                            <span class="ms-2"><?= $studyset['user_name'] ?></span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="mx-2">| Terms in this set</span>
                        <span id="total"></span>
                    </div>
                </div>
                <div class="option">
                    <i class="fas fa-layer-group"></i>
                    <span>Flashcards</span>
                </div>
                <div class="option" onclick="location.href = '?redirect=learn&id=<?= $_GET['id'] ?>'">
                    <i class="fas fa-book"></i>
                    <span>Learn</span>
                </div>
                <div class="option">
                    <i class="fas fa-file-alt"></i>
                    <span>Test</span>
                </div>
                <div class="option">
                    <i class="fas fa-link"></i>
                    <span>Match</span>
                </div>
            </div>
        </div>

        <!-- Cards ----------- -->
        <div class="row py-3">
            <div class="col-md-8">
                <div class="cards-content">
                    <div class="cards-control my-3">
                        <h6 class="my-3">Cards</h6>
                        <ul class="nav cards-control-menu">
                            <li class="mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add this set to a class or a folder">
                                <button class="nav-item" data-bs-toggle="collapse" data-bs-target="#add">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </li>
                            <?php
                            if ($studyset['type'] == 'OWNED') {
                                echo ('<li class="mx-2">');
                                echo ('<button class="nav-item" onclick="editStudySet('.$_GET['id'].')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">');
                                echo ('<i class="fas fa-pen"></i>');
                                echo ('</button>');
                                echo ('</li>');
                            } else {
                                echo ('<li class="mx-2">');
                                echo ('<button class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Save and edit">');
                                echo ('<i class="far fa-clone"></i>');
                                echo ('</button>');
                                echo ('</li>');
                            }
                            ?>
                            <li class="mx-2">
                                <button class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Share">
                                    <i class="fas fa-share"></i>
                                </button>
                            </li>
                            <li class="dropdown mx-2">
                                <button class="nav-item" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <button class="dropdown-item">
                                            <i class="far fa-code-merge"></i>
                                            <span>Combine</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item">
                                            <i class="far fa-download"></i>
                                            <span>Export</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item">
                                            <i class="far fa-code fa-sm"></i>
                                            <span>Embed</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item">
                                            <i class="far fa-exclamation-triangle"></i>
                                            <span>Report</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirm" onclick="setDataForDel(<?= $studyset['ssid'] ?>, 1);">
                                            <i class="far fa-trash"></i>
                                            <span>Delete</span>
                                        </button>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <!-- add-to --------------------------------------- -->
                        <div class="add-to collapse" id="add">
                            <div class="add-to-box">
                                <div style="padding: 10px 40px 0;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3>Add to a class or folder</h3>
                                        <span class="close" data-bs-toggle="collapse" data-bs-target="#add">&times;</span>
                                    </div>
                                    <hr style="border: 0; height: 1px; background-color: #000; margin: 0 0 15px;">
                                </div>
                                <div class="opt-pop">
                                    <div class="d-flex">
                                        <button class="btn add-option active">Add to class</button>
                                        <button class="btn add-option">Add to folder</button>
                                    </div>
                                    <div class="add_to_folder" style="display: none;">
                                        <div class="UIDiv createButton">
                                            <button class="btn" type="button">+ Create a new folder</button>
                                        </div>
                                        <div class="UIDiv">
                                            <div class="ToggleCard">
                                                <div class="ToggleList">
                                                    <span class="UIHeading">IBM Full Stack Cloud Developer</span>
                                                    <div class="ToggleList-toggle">
                                                        <input class="UISwitch-input me-2" type="checkbox" value="">
                                                        <span class="UISwitch-label">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="ToggleList">
                                                    <span class="UIHeading">Coursera</span>
                                                    <div class="ToggleList-toggle">
                                                        <input class="UISwitch-input me-2" type="checkbox" value="">
                                                        <span class="UISwitch-label">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add_to_class">
                                        <div class="UIDiv createButton">
                                            <button class="btn" type="button">+ Create a new class</button>
                                        </div>
                                        <div class="UIDiv">
                                            <div class="ToggleCard">
                                                You don't belong to any classes yet.
                                            </div>
                                            <!-- <div class="ToggleCard">
                                                    <div class="ToggleList">
                                                        <span class="UIHeading">IBM Full Stack Cloud Developer</span>
                                                        <div class="ToggleList-toggle">
                                                            <input class="UISwitch-input me-2" type="checkbox" value="">
                                                            <span class="UISwitch-label">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ToggleList">
                                                        <span class="UIHeading">Coursera</span>
                                                        <div class="ToggleList-toggle">
                                                            <input class="UISwitch-input me-2" type="checkbox" value="">
                                                            <span class="UISwitch-label">
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        var switchLabel = document.querySelectorAll(".UISwitch-label");
                                        var switchInput = document.querySelectorAll(".UISwitch-input");
                                        var optBtn = document.querySelectorAll(".add-option");

                                        for (let i = 0; i < switchLabel.length; i++) {
                                            switchLabel[i].onclick = function() {
                                                if (switchInput[i].checked == true) {
                                                    switchInput[i].checked = false;
                                                } else {
                                                    switchInput[i].checked = true;
                                                }
                                            }
                                        }

                                        optBtn[0].onclick = function() {
                                            optBtn[1].classList.remove("active");
                                            optBtn[0].classList.add("active");
                                            document.querySelector(".add_to_folder").style.display = "none";
                                            document.querySelector(".add_to_class").style.display = "block";
                                        }

                                        optBtn[1].onclick = function() {
                                            optBtn[0].classList.remove("active");
                                            optBtn[1].classList.add("active");
                                            document.querySelector(".add_to_folder").style.display = "block";
                                            document.querySelector(".add_to_class").style.display = "none";
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    getAllCards($pdo, $listQuestion, $studyset);
                    ?>
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

<script src="assets/js/flashcards.js"></script>
<script src="assets/js/popup.js"></script>
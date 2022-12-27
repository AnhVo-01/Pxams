<link rel="stylesheet" href="assets/css/flashcards.css">

<!-- Main Content ----------------------------------------- -->
<div class="container" style="margin-bottom: 80px;">
    <div class="my-4">
        <div class="row mb-3">
            <div class="col-md-8">
                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="flip-card">
                                <div class="qa">
                                    <span class="question">
                                        Given the following state transition table Which of the test cases below will cover the following series of state transitions? S1 SO S1 S2 SO
                                        <br>
                                        Exhibit:
                                        <br>
                                        A. D, A, B, C.
                                        <br>
                                        B. A, B, C, D.
                                        <br>
                                        C. D, A, B.
                                        <br>
                                        D. A, B, C.
                                    </span>
                                    <span class="answer">
                                        B
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="flip-card">
                                <div class="qa">
                                    <span class="question">From a Testing perspective, what are the MAIN purposes of Configuration Management?:
                                        <br>
                                        i) Identifying the version of software under test.
                                        <br>
                                        ii) Controlling the version of testware items.
                                        <br>
                                        ii) Controlling the version of testware items.
                                        <br>
                                        ii) Controlling the version of testware items.
                                        <br>
                                        ii) Controlling the version of testware items.
                                        <br>
                                        A. ii, iv and v.
                                        <br>
                                        B. ii, iii and iv.i,
                                        <br>
                                        C. i, ii and iv.
                                        <br>
                                        C. i, ii and iv.
                                    </span>
                                    <span class="answer">
                                        A
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls/icons -->
                    <div class="controls">
                        <button type="button" class="btn prev-btn" data-bs-target="#demo" data-bs-slide="prev">
                            <i class="fas fa-chevron-left fa-xl"></i>
                        </button>
                        <div class="d-flex">
                            <span id="index"></span>
                            <span>/</span>
                            <span id="card-total"></span>
                        </div>
                        <button type="button" class="btn next-btn" data-bs-target="#demo" data-bs-slide="next">
                            <i class="fas fa-chevron-right fa-xl"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="my-3">
                    <h4>SWP391</h4>
                    <span class="text-muted">Description</span>
                </div>
                <div class="cre-user mb-3">
                    <div class="cre-ava">
                        <span style="line-height: 1;">V</span>
                    </div>
                    <a href="library.html">
                        <span class="ms-2">VoNVA</span>
                    </a>
                    <span class="mx-2">| Terms in this set</span>
                    <span id="total"></span>
                </div>
                <div class="option">
                    <i class="fas fa-layer-group"></i>
                    <span>Flashcards</span>
                </div>
                <div class="option" onclick="location.href = '?redirect=client/pages/learn'">
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
                                <a href="#" class="nav-item" data-bs-toggle="collapse" data-bs-target="#add">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#" class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#" class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Save and edit">
                                    <i class="far fa-clone"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#" class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Share">
                                    <i class="fas fa-share"></i>
                                </a>
                            </li>
                            <li class="dropdown mx-2">
                                <a href="#" class="nav-item" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-print"></i>
                                            <span>Print</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-code-merge"></i>
                                            <span>Combine</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-download"></i>
                                            <span>Export</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-code fa-sm"></i>
                                            <span>Embed</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="far fa-exclamation-triangle"></i>
                                            <span>Report</span>
                                        </a>
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

                    <div class="card-option p-0">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn bookmark-card"><i class="far fa-star"></i></a>
                                <button class="btn edit-card">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7 question">
                                        Given the following state transition table Which of the test cases below will cover the following series of state transitions? S1 SO S1 S2 SO
                                        <br>
                                        Exhibit:
                                        <br>
                                        A. D, A, B, C.
                                        <br>
                                        B. A, B, C, D.
                                        <br>
                                        C. D, A, B.
                                        <br>
                                        D. A, B, C.
                                    </div>
                                    <div class="col-md-5 answer">
                                        B
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/carousel-lib.js"></script>
<script src="assets/js/popup.js"></script>
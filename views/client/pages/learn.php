<link rel="stylesheet" href="assets/css/learn.css">

<!-- Main -->
<div class="container">
    <div class="learn-content">
        <div class="flash-box"></div>
    </div>
</div>

<div class="checkpoint-ft" style="display: none;">
    <div class="container">
        <div class="ft-content">
            <span>Press the 'Enter' to continue</span>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-primary" onclick="cont()">Continue</button>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="optionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Options</h4>
                <button type="button" class="btn close" data-bs-dismiss="modal">
                    <i class="far fa-times"></i>
                </button>
            </div>
      
            <div class="modal-body">
                <div class="row">
                    <div class="col-5 UIFieldset">
                        <span class="UIFieldset-legend">BACKGROUND</span>
                        <div class="UIFieldset-fields">
                            <div class="learn-bg-theme">
                                <span class="UIToggle-option light">Light</span>
                                <span class="UIToggle-option dark">Dark</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-5">
                    <div class="UIFieldset">
                        <span class="UIFieldset-legend">RESET PROGRESS</span>
                        <div class="UIFieldset-fields">
                            <button class="btn" type="button" onclick="startOver()">
                                START OVER
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/services/LearnService.js"></script>
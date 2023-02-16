<header>
    <div class="container-fluid">
        <div class="px-3">
            <div class="row top-group">
                <div class="col-md-3">
                    <div class="drop-down">
                        <i class="fas fa-book fa-lg text-light"></i>
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" style="color: #fff;" aria-expanded="false">
                            <span>Learn</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-layer-group"></i>
                                    <span>Flashcards</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-file-alt"></i>
                                    <span>Test</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-link"></i>
                                    <span>Match</span>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="./" class="dropdown-item">Home</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item">Search</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="top-middle">
                        <h3>ITE302c</h3>
                        <!-- <small>Round 1</small> -->
                    </div>
                </div>
                
                <div class="col-md-3">
                    <nav class="navbar" id="user_box" style="display: block;">
                        <ul class="nav top-right">
                            <li class="nav-item">
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#optionModal">Option</button>
                            </li>
                            <li class="nav-item">
                                <a href="?redirect=flashcard&id=<?= $_GET['id'] ?>" class="btn">
                                    <i class="far fa-times"></i>
                                </a>
                            </li>
                        </ul>       
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
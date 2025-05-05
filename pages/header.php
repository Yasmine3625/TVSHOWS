<?php
$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
?>


<header>
    <div id="logo-container">
        <h1 class="main-title">LYD-TV</h1>
    </div>

    <div id="nav-bar">
        <a class="nav-btn-acc" href="/../index.php" title="Accueil">
            <i class="fas fa-home"></i>
        </a>
        <div class="search-bar">
            <form action="/pages/search_results.php" method="get" style="display: flex;">
                <button type="submit" class="search-button">
                    <i class="fas fa-search search-icon"></i>
                </button>
                <input type="text" name="search" placeholder="Rechercher une série..." class="search-input" />

            </form>

        </div>
        <?php if ($isAdminLogged): ?>
            <a href="pages\logout.php" role="button" class="nav-btn-log" id="btn-admin-Login">Logout</a>
        <?php else: ?>
            <a href="/../pages/adminloginform.php" class="nav-btn-log" id="btn-admin-Login" role="button">Login</a>
        <?php endif ?>
    </div>

</header>
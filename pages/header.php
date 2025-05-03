<?php
$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
?>


<header>
    <div id="logo-container">
        <img id="nav-bar-icone" src="..\images\LogoOrange.png"></img>
        <h1>SERIES</h1>
    </div>

    <div id="nav-bar">
        <a class="nav-btn-acc" href="/../index.php">Acceuil</a>
        <div class="search-bar">
            <form action="/pages/search_results.php" method="get">
                <input type="text" name="search" placeholder="Rechercher une série..." class="search-input" />
                <button type="submit" class="fas fa-search search-icon"></button>
            </form>
        </div>
        <?php if ($isAdminLogged): ?>
            <a href="pages\logout.php" role="button" class="nav-btn-log" id="btn-admin-Login">Logout</a>
        <?php else: ?>
            <a href="/../pages/adminloginform.php" class="nav-btn-log" id="btn-admin-Login" role="button">Login</a>
        <?php endif ?>
    </div>

</header>
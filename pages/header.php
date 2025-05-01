<?php
$logged = isset($_SESSION['nick']);
?>


<header>
    <div id="logo-container">
        <img id="nav-bar-icone" src="..\images\LogoOrange.png"></img>
        <h1>SERIES</h1>
    </div>

    <div id="nav-bar">
        <a class="nav-btn-acc" href="/../index.php">Acceuil</a>
        <div class="search-bar">
            <input type="text" placeholder="Rechercher une série..." class="search-input" />
            <i class="fas fa-search search-icon"></i>
        </div>
        <?php if ($logged): ?>
            <a role="button" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/shop.php">
                Admin
            </a>
        <?php else: ?>
            <a href="/../pages/adminloginform.php" class="nav-btn-log" id="btn-admin-Login" role="button">Login</a>
        <?php endif ?>
    </div>
</header>
<?php
session_start();

require_once __DIR__ . "/Autoloader.php";
require_once __DIR__ . "/config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\SeriesRenderer;
use tvshows\Tags;
use tvshows\TagsRenderer;

$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
?>


<?php ob_start(); ?>

<div id="tag-bar">

    <?php if ($isAdminLogged): ?>
        <a href="/pages/ajoutserie.php">Ajout série</a>
        <a href="/pages/ajoutsaison.php">Ajout saison</a>
        <a href="logout.php">Se déconnecter</a>
    <?php endif; ?>


    <div class="category-menu">
        <h2 class="category-title">Catégories</h2>
        <a href="/index.php" class="category-item">Tout</a>
        <?php
        $tagDb = new Tags();
        $tags = $tagDb->exec("SELECT * FROM tag ORDER BY nom", null, 'tvshows\TagsRenderer');

        foreach ($tags as $tag) {
            echo $tag->getHTML();
        }
        ?>
    </div>
</div>

<div id="list-serie-container">
    <?php
    $gdb = new Series();

    ?>
    <div id="rslt">
        <?php
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $category = $_GET['category'];
            echo "<h2 style='margin: 1em;'>Résultats pour la catégorie : " . htmlspecialchars($category) . "</h2>";
            $series = $gdb->getSeriesByCategory($category);
        } else {
            $series = $gdb->getAllSeries();
        }
        ?>
    </div>
    <div id="list-serie">
        <?php
        foreach ($series as $s) {
            echo $s->getHTML();
        }
        ?>
    </div>
</div>

<?php





$content = ob_get_clean();

Template::render($content);
?>
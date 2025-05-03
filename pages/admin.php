<?php
session_start();
$logged = isset($_SESSION['nickname']);

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\SeriesRenderer;
use tvshows\Tags;

ob_start();
?>
<?php if ($logged): ?>
    <h1>Bienvenue dans l'admin</h1>
<?php endif; ?>


<div id="tag-bar">
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
        <a href="ajoutserie.php">Ajout serie</a>
    </div>
</div>

<div id="list-serie">
    <?php
    $gdb = new Series();

    if (isset($_GET['category']) && !empty($_GET['category'])) {
        $category = $_GET['category'];
        echo "<h2 style='margin: 1em;'>Résultats pour la catégorie : " . htmlspecialchars($category) . "</h2>";
        $series = $gdb->getSeriesByCategory($category);
    } else {
        $series = $gdb->getAllSeries();
    }

    foreach ($series as $s) {
        echo $s->getHTML();
    }
    ?>
</div>

<?php
$content = ob_get_clean();
Template::render($content);

<?php
session_start();

require_once __DIR__ . "/Autoloader.php";
require_once __DIR__ . "/config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\Tags;

$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;

ob_start();
?>

<div id="tag-bar">
    <?php if ($isAdminLogged): ?>
        <a href="/pages/ajoutserie.php">Ajout série</a>
    <?php endif; ?>

    <div class="category-menu">
        <h2 class="category-title">Catégories</h2>
        <a href="/index.php" class="category-item">Tout</a>
        <?php
        $tagDb = new Tags();
        $tags = $tagDb->getAllTags();

        foreach ($tags as $tag) {
            echo $tag->getHTML();
        }
        ?>
    </div>
</div>

<div id="list-serie-container">
    <?php
    $gdb = new Series();

    $category = isset($_GET['category']) ? $_GET['category'] : '';

    if (!empty($category)) {
        echo "<h2 style='margin: 1em;'>Résultats pour la catégorie : " . htmlspecialchars($category) . "</h2>";
        $series = $gdb->getSeriesByCategory($category);
    } else {
        $series = $gdb->getAllSeries();
    }
    ?>

    <form id="serie-selection-form" action="/pages/supprimerserie.php" method="get" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette série ?');">
        <div id="list-serie">
            <?php foreach ($series as $serie): ?>
                <div class="serie-box">
                    <label>
                        <input type="radio" name="selected_serie" value="<?= $serie->cle_serie ?>" form="serie-selection-form">
                    </label>
                    <?php
                    echo $serie->getHTML();
                    ?>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" id="delete-serie-button">Supprimer la série sélectionnée</button>
    </form>
</div>

<?php
$content = ob_get_clean();

Template::render($content);
?>

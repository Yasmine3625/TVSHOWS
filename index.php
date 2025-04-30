<?php
require_once __DIR__ . "/Autoloader.php";
require_once __DIR__ . "/config.php";

use tvshows\Template;
use tvshows\Series;
?>


<?php ob_start(); ?>

<div id="tag-bar">
    <?php
    $categories = [
        "Action",
        "Aventure",
        "Comédie",
        "Drame",
        "Horreur",
        "Thriller",
        "Policier",
        "Fantastique",
        "Science-fiction",
        "Romance"
    ];
    ?>
    <div class="category-menu">
        <h2 class="category-title">Catégories</h2>
        <a href="#" class="category-item">Tout</a>
        <?php foreach ($categories as $cat): ?>
            <a href="#" class="category-item"><?= htmlspecialchars($cat) ?></a>
        <?php endforeach; ?>
    </div>
</div>

<div id="list-serie">
    <?php
    $series = new Series();
    $series->generateSeries();
    ?>
</div>

<?php
$content = ob_get_clean();
Template::render($content);
?>
<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";


use tvshows\Template;
use tvshows\Series;
use tvshows\SeriesRenderer;

ob_start();

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];

    $gdb = new Series();
    $series = $gdb->searchSeries($searchTerm);

    ?>
    <div style="display: flex; flex-direction: column; flex:1">
        <div>
            <?php
            echo "<h2>Résultats de la recherche pour: " . htmlspecialchars($searchTerm) . "</h2>"; ?>
        </div>
        <div style="flex: 1;display : flex; flex-wrap: wrap;">
            <?php

            if (!empty($series)) {
                foreach ($series as $s) {
                    echo $s->getHTML();
                }
            } else {
                echo "<p>Aucun résultat trouvé pour '" . htmlspecialchars($searchTerm) . "'</p>";
            }
            ?>
        </div>
    </div>
    <?php
} else {
    echo "<p>Veuillez entrer un terme de recherche.</p>";
}

$content = ob_get_clean();
Template::render($content);
?>
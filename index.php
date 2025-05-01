<?php
require_once __DIR__ . "/Autoloader.php";
require_once __DIR__ . "/config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\SeriesRenderer
?>


<?php ob_start();





?>

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
    $image = [
        "love101.webp " => "Love 101",
        "My_name.jpeg" => "My name",
        "originals.jpg" => "Originals",
        "Pulse.webp" => "Pulse",
        "the_order.jpeg" => "The order",
        "the_rookie.jpeg" => "The rookie",
        "love101.webp" => "Love 101",
        "Walter_boys.jpeg" => "Walter"
    ];
    ?>
</div>

<?php


$gdb = new Series();

$content = ob_get_clean();

Template::render($content);
?>
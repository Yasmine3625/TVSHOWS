<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;

// Vérifie si une clé de série est fournie
if (!isset($_GET['serie'])) {
    die("Aucune série spécifiée.");
}

$cle = $_GET['serie'];

// Requête vers la base de données
$gdb = new Series();
$query = "SELECT * FROM serie WHERE cle_serie = :cle";
$params = ['cle' => $cle];

$serieData = $gdb->exec($query, $params);
if (count($serieData) === 0) {
    die("Série non trouvée.");
}

$serie = $serieData[0];

// Capture du contenu HTML
ob_start();
?>
<h1><?= htmlspecialchars($serie->titre) ?></h1>
<p>Nombre de saisons : <?= intval($serie->nb_saison) ?></p>
<img src="/uploads/<?= htmlspecialchars($serie->image) ?>" alt="Image de la série" style="max-width: 300px;">

<!-- ici, ajoute ton interface admin CRUD -->

<?php
$content = ob_get_clean();
Template::render($content);

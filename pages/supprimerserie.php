<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Series;

if (!isset($_GET['selected_serie'])) {
    die("Aucune série sélectionnée.");
}

$serieId = intval($_GET['selected_serie']);

$gdb = new Series();

$serieData = $gdb->getById($serieId);

if (!$serieData) {
    die("Série introuvable.");
}

$success = $gdb->supprimerSerie($serieData->cle_serie);

if (!$success) {
    die("La suppression de la série a échoué.");
}

header("Location: ../index.php"); // Rediriger vers la page d'accueil ou une autre page
exit;
?>

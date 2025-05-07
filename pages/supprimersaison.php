<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Saisons;
use tvshows\Series;

if (!isset($_GET['saison'])) {
    die("Paramètre 'saison' manquant.");
}

$idSaison = $_GET['saison'];

$saisonDb = new Saisons();
$saisonData = $saisonDb->getSaisonById($idSaison);

if (!$saisonData) {
    die("Saison introuvable.");
}

$cleSerie = $saisonData->cle_serie;

$success = $saisonDb->supprimerSaison($idSaison);

if (!$success) {
    die("La suppression de la saison a échoué.");
}

$serieDb = new Series();
$serieDb->exec(
    "UPDATE serie SET nb_saison = nb_saison - 1 WHERE cle_serie = :cle_serie",
    ['cle_serie' => $cleSerie]
);

header("Location: serie.php?serie=" . urlencode($cleSerie));
exit;

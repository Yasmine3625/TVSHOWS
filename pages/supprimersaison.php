<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Saisons;
use tvshows\Series;

if (!isset($_GET['serie'], $_GET['saison'])) {
    die("Paramètres manquants.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);

$saisonDb = new Saisons();

$saisonData = $saisonDb->getSaisonsBySerieAndIndex($cleSerie, $numSaison - 1); // L'index commence à 0, donc on soustrait 1

if (!$saisonData) {
    die("Saison introuvable.");
}

// Récupérer l'ID de la saison
$idSaison = $saisonData[0]->cle_saison;

// Supprimer la saison
$success = $saisonDb->supprimerSaison($idSaison);

if (!$success) {
    die("La suppression de la saison a échoué.");
}

// Mise à jour du nombre de saisons dans la table 'serie' après suppression
$serieDb = new Series();
$serieDb->exec(
    "UPDATE serie SET nb_saison = nb_saison - 1 WHERE cle_serie = :cle_serie",
    ['cle_serie' => $cleSerie]
);

// Redirection vers la page de la série
header("Location: serie.php?serie=" . urlencode($cleSerie));
exit;
?>

<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Episode;

if (!isset($_GET['serie'], $_GET['saison'], $_GET['selected_episode'])) {
    die("Paramètres manquants.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);
$episodeNum = intval($_GET['selected_episode']);

$episodeDb = new Episode();

$episodeData = $episodeDb->getBySerieSaisonEtNumero($cleSerie, $numSaison, $episodeNum);

if (!$episodeData) {
    die("Épisode introuvable.");
}

$idSaison = $episodeData['saison']->cle_saison;


$success = $episodeDb->supprimerEpisode($idSaison, $episodeNum);

if (!$success) {
    die("La suppression a échoué.");
}

$sql = "UPDATE episode SET numero_episode = numero_episode - 1
        WHERE id_saison = :saison AND numero_episode > :numero";
$episodeDb->exec($sql, ['saison' => $idSaison, 'numero' => $episodeNum]);

header("Location: saison.php?serie=" . urlencode($cleSerie) . "&saison=" . urlencode($numSaison));
exit;
?>

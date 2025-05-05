<?php
session_start();
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Episode;


if (!isset($_GET['episode_id'])) {
    die("ID de l'épisode non spécifié.");
}

$episodeId = intval($_GET['episode_id']);

if (!isset($_GET['saison_id']) || !isset($_GET['serie_id'])) {
    die("ID de la saison ou de la série non spécifié.");
}

$saisonId = intval($_GET['saison_id']);
$serieId = intval($_GET['serie_id']);

$gdb = new Episode();

// Suppression de l'épisode en base de données
$gdb->exec("DELETE FROM episode WHERE cle_episode = :cle_episode",
['cle_episode' => $episodeId]);

// Rediriger vers la page de la saison
header("Location: saison.php?cle=" . urlencode($saisonId) . "&serie="
. urlencode($serieId));
exit;
?>
<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;

ob_start();

// Vérifie les paramètres GET
if (!isset($_GET['serie']) || !isset($_GET['saison']) ||
!isset($_GET['episode'])) {
    die("Série, saison ou épisode non spécifié.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);
$numEpisode = intval($_GET['episode']);

// Débogage - afficher les paramètres GET pour vérifier
echo "Paramètres GET reçus :<br>";
var_dump($_GET);  // Affiche les paramètres GET reçus
echo "<br><br>";

// Récupère les infos de la série (pour le titre, etc.)
$gdb = new Series();
$querySerie = "SELECT * FROM serie WHERE cle_serie = :cle";
$serieData = $gdb->exec($querySerie, ['cle' => $cleSerie]);

if (count($serieData) === 0) {
    die("Série non trouvée.");
}

$serie = $serieData[0];

// Récupère les infos de la saison
$querySaison = "SELECT * FROM saison WHERE cle_serie = :cleSerie LIMIT
" . ($numSaison - 1) . ", 1";
$paramsSaison = ['cleSerie' => $cleSerie];
$saisons = $gdb->exec($querySaison, $paramsSaison);

if (count($saisons) === 0) {
    die("Saison non trouvée.");
}

var_dump($saisons);

$saison = $saisons[0];

var_dump($saison);

$queryEpisode = "SELECT * FROM episode WHERE id_saison = :cleSaison
AND  numero_episode = :numeroEpisode";  // Remplacez 'numero' par la bonne colonne si nécessaire
$paramsEpisode = ['cleSaison' => $saison->cle_saison, 'numeroEpisode'
=> $numEpisode];
$episodes = $gdb->exec($queryEpisode, $paramsEpisode);

if (count($episodes) === 0) {
    die("Épisode non trouvé.");
}

$episode = $episodes[0];

// Capture HTML
ob_start();
?>
<div class="episode-page">
    <h1><?= htmlspecialchars($serie->titre) ?> - Saison <?= $numSaison
?> - Épisode <?= $numEpisode ?></h1>

    <div class="episode-content">
        <?php if (!empty($episode->affichage)): ?>
            <div class="episode-image">
                <img src="/images/images_series/<?=
htmlspecialchars($episode->affichage) ?>" alt="Image de l'épisode">
            </div>
        <?php endif; ?>

        <div class="episode-details">
            <p><strong>Titre de l'épisode :</strong> <?=
htmlspecialchars($episode->titre) ?></p>
            <p><strong>Description :</strong> <?=
nl2br(htmlspecialchars($episode->synopsis)) ?></p>
            <p><strong>Durée :</strong> <?=
htmlspecialchars($episode->duree) ?> minutes</p>
        </div>

        <div class="navigation-links">
            <a href="saison.php?serie=<?= urlencode($cleSerie)
?>&saison=<?= $numSaison ?>">Retour à la Saison <?= $numSaison
?></a><br>
            <a href="serie.php?serie=<?= urlencode($cleSerie)
?>">Retour à la Série <?= htmlspecialchars($serie->titre) ?></a>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
Template::render($content);
?>

<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\Saisons;

ob_start();

// Vérifie les paramètres GET
if (!isset($_GET['serie']) || !isset($_GET['saison'])) {
    die("Série ou saison non spécifiée.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);

$seriesDb = new Series();
$saisonsDb = new Saisons();

// Récupère les infos de la série
$querySerie = "SELECT * FROM serie WHERE cle_serie = :cle";
$serieData = $seriesDb->exec($querySerie, ['cle' => $cleSerie]);

if (count($serieData) === 0) {
    die("Série non trouvée.");
}
$serie = $serieData[0];

// Récupère les infos de la saison via la classe Saisons
$saisons = $saisonsDb->getSaisonsBySerieAndIndex($cleSerie, $numSaison - 1);

if (count($saisons) === 0) {
    die("Saison non trouvée.");
}
$saison = $saisons[0];

// Récupérer les acteurs pour la saison
$acteurs = $saisonsDb->getActeurParEpisode($saison->cle_saison);

ob_start();
?>

<div id="saison-container">
    <div id="saison-info">
        <div id="background-element">
            <div id="image-saison-overlay"></div>
            <img src="/images/images_series/<?= htmlspecialchars($saison->affichage) ?>" alt="Image de la saison"
                id="saison-background-image">
        </div>

        <div id="foreground-element">
            <h1><?= htmlspecialchars($serie->titre) ?> - Saison <?= $numSaison ?></h1>
            <p><strong>Nombre d'épisodes :</strong> <?= intval($saison->nb_episode) ?></p>
            <p>Acteurs :</p>
        </div>
    </div>

    <hr style="margin: unset;">
    <div id="episodes-main-title">
        <p>Episodes</p>
        <div class="ajout-episode-button">
            <a href="ajoutepisode.php?serie=<?= urlencode($serie->cle_serie) ?>" class="btn-ajout-episode">
                Ajouter un épisode
            </a>
        </div>
    </div>
    <hr style="margin: unset;">
    <div class="episode-section">
        <div class="saisons-episodes-container">
            <?php for ($i = 1; $i <= intval($saison->nb_episode); $i++): ?>
                <div id="ep">
                    <a href="episode.php?serie=<?= urlencode($cleSerie) ?>&saison=<?= $numSaison ?>&episode=<?= $i ?>"
                        class="episode-button">
                        Episode <?= $i ?>
                    </a>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div id="saison-acteur-container">
        <?php if ($acteurs): ?>
            <div class="realisateur-list">
                <?php foreach ($acteurs as $acteur): ?>
                    <div class="realisateur">
                        <img src="/images/images_series/<?= htmlspecialchars($acteur->image) ?>"
                            alt="Image de <?= htmlspecialchars($acteur->nom) ?>">
                        <p><?= htmlspecialchars($acteur->nom) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Aucun acteur trouvé.</p>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
Template::render($content);
?>
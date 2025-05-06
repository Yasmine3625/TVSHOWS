<?php
session_start();
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\Saisons;
use tvshows\Episode;

$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;

ob_start();

if (!isset($_GET['serie']) || !isset($_GET['saison'])) {
    die("Série ou saison non spécifiée.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);

$seriesDb = new Series();
$saisonsDb = new Saisons();
$episodeDb = new Episode();

$querySerie = "SELECT * FROM serie WHERE cle_serie = :cle";
$serieData = $seriesDb->exec($querySerie, ['cle' => $cleSerie]);

if (count($serieData) === 0) {
    die("Série non trouvée.");
}
$serie = $serieData[0];

$saisons = $saisonsDb->getSaisonsBySerieAndIndex($cleSerie, $numSaison - 1);

if (count($saisons) === 0) {
    die("Saison non trouvée.");
}
$saison = $saisons[0];

$episodes = $episodeDb->exec("SELECT * FROM episode WHERE id_saison = :id", ['id' => $saison->cle_saison]);
$episodeCount = count($episodes); // nombre réel

$acteurs = $saisonsDb->getActeurParEpisode($saison->cle_saison);

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
            <p><strong>Nombre d'épisodes :</strong> <?= $episodeCount ?></p>
            <p>Acteurs :</p>
        </div>
    </div>

    <hr style="margin: unset;">
    <div id="episodes-main-title">
        <p>Episodes</p>
    </div>
    <hr style="margin: unset;">
    <div class="episode-section">
        <div id="bar-modif-episode">
            <?php if ($isAdminLogged): ?>
                <div class="ajout-episode-button">
                    <a href="ajoutepisode.php?id_saison=<?= urlencode($saison->cle_saison) ?>" class="btn-ajout-episode">
                        Ajouter un épisode
                    </a>
                </div>

                <form id="episode-selection-form" action="supprimerepisode.php" method="get">
                    <input type="hidden" name="serie" value="<?= htmlspecialchars($cleSerie) ?>">
                    <input type="hidden" name="saison" value="<?= htmlspecialchars($numSaison) ?>">
                    <button type="submit">Supprimer</button>
                <?php endif; ?>

        </div>


        <div class="saisons-episodes-container">
            <?php for ($i = 1; $i <= $episodeCount; $i++): ?>
                <div id="ep">
                    <a href="episode.php?serie=<?= urlencode($cleSerie) ?>&saison=<?= $numSaison ?>&episode=<?= $i ?>"
                        class="episode-button">
                        Episode <?= $i ?>
                    </a>
                    <?php if ($isAdminLogged): ?>
                        <input type="radio" name="selected_episode" value="<?= $i ?>" form="episode-selection-form">
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
        </form>
    </div>

    <div id="saison-acteur-container">
        <a href="ajoutacteur.php">Ajouter un acteur</a>
        <?php if ($acteurs): ?>
            <h2>Acteur/s :</h2>
            <?php if ($isAdminLogged): ?>
                <a href="ajoutacteur.php?id_saison=<?= urlencode($saison->cle_saison) ?>">Ajouter un acteur</a>
            <?php endif; ?>

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

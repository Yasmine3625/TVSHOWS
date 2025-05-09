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
$episodeCount = count($episodes);

$acteurs = $saisonsDb->getActeurParEpisode($saison->cle_saison);
?>
<style>
    .saison-page-wrapper::before {
        background-image: url('/images/images_series/<?= htmlspecialchars($saison->affichage) ?>');
    }
</style>

<div class="saison-page-wrapper">
    <div id="saison-container">
        <!-- Image nette au centre haut -->
        <div id="foreground-element">
            <img src="/images/images_series/<?= htmlspecialchars($saison->affichage) ?>" alt="Image nette de la saison">
            <h1><?= htmlspecialchars($serie->titre) ?> - Saison <?= $numSaison ?></h1>
            <p><strong>Nombre d'épisodes :</strong> <?= $episodeCount ?></p>
        </div>

        <!-- Section épisodes -->
        <div id="episodes-main-title">
            <div class="episode-section">
                <div id="bar-modif-episode">
                    <?php if ($isAdminLogged): ?>
                        <div class="admin-button-group">
                            <a href="ajoutepisode.php?id_saison=<?= urlencode($saison->cle_saison) ?>"
                                class="btn-ajout-episode">
                                +
                            </a>
                            <form id="episode-selection-form" action="supprimerepisode.php" method="get" style="margin: 0;">
                                <input type="hidden" name="serie" value="<?= htmlspecialchars($cleSerie) ?>">
                                <input type="hidden" name="saison" value="<?= htmlspecialchars($numSaison) ?>">
                                <button type="submit">-</button>
                            </form>
                        </div>
                    <?php endif; ?>

                </div>


                <div class="saisons-episodes-container">
                    <?php for ($i = 1; $i <= $episodeCount; $i++): ?>
                        <div id="ep">
                            <a href="episode.php?serie=<?= urlencode($cleSerie) ?>&saison=<?= $numSaison ?>&episode=<?= $i ?>"
                                class="episode-button">Episode <?= $i ?></a>
                            <?php if ($isAdminLogged): ?>
                                <input type="radio" name="selected_episode" value="<?= $i ?>" form="episode-selection-form">
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>
                </form>


                <!-- Liste des acteurs -->
                <div id="saison-acteur-container">
                    <?php if ($acteurs): ?>
                        <h2 style="margin-top: 60px;">Acteur(s)</h2>
                        <?php if ($isAdminLogged): ?>
                            <div class="admin-button-group">
                                <a href="ajoutacteur.php?id_saison=<?= urlencode($saison->cle_saison) ?>"
                                    class="btn-ajout-episode">
                                    +
                                </a>
                            </div>
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
            <div class="section-header">
                <h2>Autres séries à découvrir</h2>
            </div>
            <div id="list-serie">
                <?php
                $gdb = new Series();

                $series = $gdb->getAllSeries();
                foreach ($series as $s) {
                    echo $s->getHTML();
                }
                ?>
            </div>

        </div>


        <?php
        $content = ob_get_clean();
        Template::render($content);
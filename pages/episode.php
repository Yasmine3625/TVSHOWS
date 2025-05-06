<?php

use tvshows\Saisons;
session_start();
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Episode;

$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;


if (!isset($_GET['serie'], $_GET['saison'], $_GET['episode'])) {
    die("Série, saison ou épisode non spécifié.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);
$numEpisode = intval($_GET['episode']);

$gdb = new Episode();
$data = $gdb->getBySerieSaisonEtNumero($cleSerie, $numSaison, $numEpisode);

if (!$data) {
    die("Saison ou épisode non trouvé.");
}

$saison = $data['saison'];
$episode = $data['episode'];

$serieData = $gdb->exec(
    "SELECT * FROM serie WHERE cle_serie = :cle",
    ['cle' => $cleSerie]
);
if (count($serieData) === 0) {
    die("Série non trouvée.");
}
$serie = $serieData[0];



$realisateurs = $gdb->getRealisateursParEpisode($episode->cle_episode);
$saisonsDb = new Saisons();
$saisons = $saisonsDb->getSaisonsBySerieAndIndex($cleSerie, $numSaison - 1);



ob_start();
?>
<div class="episode-page-wrapper">
    <!-- Section Header avec Titre et Infos -->
    <div class="episode-main-header">
        <!-- Image de l'épisode -->
        <img src="/images/images_series/<?= htmlspecialchars($saison->affichage) ?>" alt="Image de l'épisode">

        <!-- Informations sur l'épisode -->
        <div class="episode-info">
            <h1 class="episode-title"><?= htmlspecialchars($serie->titre) ?> - Saison <?= $numSaison ?> | Épisode
                <?= $numEpisode ?>
            </h1>
            <div class="episode-meta">
                <p><strong>Titre de l'épisode :</strong> <?= htmlspecialchars($episode->titre) ?></p>
                <!-- Section Synopsis -->
                <div class="episode-synopsis-container">
                    <p><?= nl2br(htmlspecialchars($episode->synopsis)) ?></p>
                </div>
                <p style="font-size: 15px;"><strong>Durée :</strong> <?= htmlspecialchars($episode->duree) ?> minutes
                </p>
            </div>
        </div>
    </div>


    <?php if ($isAdminLogged): ?>
        <div class="admin-button-group">
            <a href="ajoutepisode.php?id_saison=<?= urlencode($saison->cle_saison) ?>" class="btn-ajout-episode">
                +
            </a>
            <form id="episode-selection-form" action="supprimerepisode.php" method="get" style="margin: 0;">
                <input type="hidden" name="serie" value="<?= htmlspecialchars($cleSerie) ?>">
                <input type="hidden" name="saison" value="<?= htmlspecialchars($numSaison) ?>">
                <button type="submit">-</button>
            </form>
        </div>
    <?php endif; ?>



    <div id="saison-realisateur-container">
        <?php if ($realisateurs): ?>
            <div class="admin-button-group">
                <h2 style="margin-top: 60px;">Réalisé par :</h2>
                <?php if ($isAdminLogged): ?>
                    <a href="ajoutrealisateur.php?cle_episode=<?= urlencode($episode->cle_episode) ?>"
                        class="btn-ajout-episode">+</a>
                <?php endif; ?>
            </div>
            <div class="realisateur-list">
                <?php foreach ($realisateurs as $real): ?>
                    <div class="realisateur">
                        <img src="/images/images_series/<?= htmlspecialchars($real->image) ?>"
                            alt="Image de <?= htmlspecialchars($real->nom) ?>">
                        <p><?= htmlspecialchars($real->nom) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Aucun réalisateur trouvé.</p>
        <?php endif; ?>
    </div>

    <div class="saisons-episodes-container">

        <?php
        $episodeDb = new Episode();

        $episodes = $episodeDb->exec("SELECT * FROM episode WHERE id_saison = :id", ['id' => $saison->cle_saison]);
        $episodeCount = count($episodes);

        for ($i = 1; $i <= $episodeCount; $i++): ?>
            <div id="ep">
                <a href="episode.php?serie=<?= urlencode($cleSerie) ?>&saison=<?= $numSaison ?>&episode=<?= $i ?>"
                    class="episode-button">Episode <?= $i ?></a>
                <?php if ($isAdminLogged): ?>
                    <input type="radio" name="selected_episode" value="<?= $i ?>" form="episode-selection-form">
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
    <div class="saison-boxes">

        <?php foreach ($saisons as $index => $saison): ?>
            <div class="saison-box">
                <a href="saison.php?serie=<?= urlencode($serie->cle_serie) ?>&saison=<?= $index + 1 ?>&id_saison=<?= $saison->cle_saison ?>"
                    class="saison-link">
                    <div class="saison-image-full">
                        <img src="/uploads/<?= htmlspecialchars($saison->affichage) ?>" alt="Image de la saison">
                        <div class="saison-overlay">
                            Saison <?= $index + 1 ?>
                        </div>
                    </div>
                </a>
            </div>


        <?php endforeach; ?>


    </div>
</div>



<script>
    function showSection(id, btn) {
        document.querySelectorAll('.toggle-section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(id).classList.add('active');

        document.querySelectorAll('.toggle-btn').forEach(button => {
            button.classList.remove('active');
        });
        btn.classList.add('active');
    }
</script>


<?php
$content = ob_get_clean();
Template::render($content);
?>
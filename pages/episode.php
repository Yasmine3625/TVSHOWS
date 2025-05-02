<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Episode;

ob_start();

// Vérifie les paramètres GET
if (!isset($_GET['serie'], $_GET['saison'], $_GET['episode'])) {
    die("Série, saison ou épisode non spécifié.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);
$numEpisode = intval($_GET['episode']);

// Utilisation de la classe Episode pour récupérer les données
$gdb = new Episode();
$data = $gdb->getBySerieSaisonEtNumero($cleSerie, $numSaison, $numEpisode);

if (!$data) {
    die("Saison ou épisode non trouvé.");
}

// Selon l'implémentation de Episode::getBySerieSaisonEtNumero,
// supposons que $data['saison'] et $data['episode'] contiennent les infos
$saison = $data['saison'];
$episode = $data['episode'];

// Récupérer aussi les infos de la série
$serieData = $gdb->exec(
    "SELECT * FROM serie WHERE cle_serie = :cle",
    ['cle' => $cleSerie]
);
if (count($serieData) === 0) {
    die("Série non trouvée.");
}
$serie = $serieData[0];

// Récupérer les réalisateurs de l'épisode
$realisateurs = $gdb->exec(
    "SELECT r.nom, r.image
    FROM realisateur r
    INNER JOIN episode_realisateur re ON re.cle_real = r.cle_real
    WHERE re.cle_episode = :id_episode",
    ['id_episode' => $episode->cle_episode]
);

// Capture HTML
ob_start();
?>
<div class="episode-page">
    <h1><?= htmlspecialchars($serie->titre) ?> - Saison <?= $numSaison ?> - Épisode <?= $numEpisode ?></h1>

    <div class="episode-content">
        <?php if (!empty($episode->affichage)): ?>
            <div class="episode-image">
                <img src="/images/images_series/<?= htmlspecialchars($episode->affichage) ?>" alt="Image de l'épisode">
            </div>
        <?php endif; ?>

        <div class="episode-details">
            <div class="titre">
                <p><strong>Titre de l'épisode :</strong> <?= htmlspecialchars($episode->titre) ?></p>
            </div>

            <div class="description">
                <p><strong>Synopsis :</strong> <?= nl2br(htmlspecialchars($episode->synopsis)) ?></p>
            </div>

            <p><strong>Durée :</strong> <?= htmlspecialchars($episode->duree) ?> minutes</p>

            <div class="realisateurs">
                <p><strong>Réalisateur(s) :</strong></p>
                <?php if ($realisateurs): ?>
                    <div class="realisateur-list">
                        <?php foreach($realisateurs as $real): ?>
                            <div class="realisateur">
                                <img src="/images/images_series/<?= htmlspecialchars($real->image) ?>"
                                     alt="Image de <?= htmlspecialchars($real->nom) ?>"
                                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                <p><?= htmlspecialchars($real->nom) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Aucun réalisateur trouvé.</p>
                <?php endif; ?>
            </div>
            <div class="icon">
                <div class="image-icone">
                    <img src="..\images\Icon.png" alt="Icône">
                </div>
            </div>

        </div>

        <div class="navigation-links">
            <a href="saison.php?serie=<?= urlencode($cleSerie) ?>&saison=<?= $numSaison ?>">Retour à la Saison <?= $numSaison ?></a><br>
            <a href="serie.php?serie=<?= urlencode($cleSerie) ?>">Retour à la Série <?= htmlspecialchars($serie->titre) ?></a>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
Template::render($content);
?>

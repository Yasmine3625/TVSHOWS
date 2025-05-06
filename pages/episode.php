<?php
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


ob_start();
?>
<div class="episode-page">
    <div class="episode-content">
        <div class="episode-details">
            <div class="icon">
                <div class="image-icone">
                    <img src="..\images\Icon.png" alt="Icône" class="img">
                </div>

            </div>
        </div>
        <div class="title-container">
            <?php if ($isAdminLogged): ?>
                <a href="supprimerepisode.php">Supprimer un episode</a>
            <?php endif; ?>
            <h2> Épisode <?= $numEpisode ?></h2>
            <h2><?= htmlspecialchars($serie->titre) ?> | Saison <?= $numSaison ?> </h2>
            <p><strong>Titre de l'épisode :</strong> <?= htmlspecialchars($episode->titre) ?></p>
            <p><strong>Durée :</strong> <?= htmlspecialchars($episode->duree) ?> minutes</p>


        </div>
        <br>

        <div class="toggle-buttons">
            <button type="button" class="toggle-btn active" onclick="showSection('synopsis', this)">Synopsis</button>
            <button type="button" class="toggle-btn" onclick="showSection('realisateurs', this)">Réalisateur(s)</button>
        </div>

        <div id="synopsis" class="toggle-section active">
            <h3>Synopsis</h3>
            <p><?= nl2br(htmlspecialchars($episode->synopsis)) ?></p>
        </div>

        <div id="realisateurs" class="toggle-section">
            <h3>Réalisateur(s)</h3>
            <?php if ($isAdminLogged): ?>
                <a href="ajoutrealisateur.php?cle_episode=<?= urlencode($episode->cle_episode) ?>"
                    class="btn-ajout-episode">Ajouter un realisateur</a>

            <?php endif; ?>
            <?php if ($realisateurs): ?>
                <div class="image-real-list">
                    <?php foreach ($realisateurs as $real): ?>
                        <div class="image-real">
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



    </div>
    <div class="episode-section">
        <div class="episodes-container">
            <?php for ($i = 1; $i <= intval($saison->nb_episode); $i++): ?>

                <div id="ep-list">
                    <a href="episode.php?serie=<?= urlencode($cleSerie) ?>&saison=<?= $numSaison ?>&episode=<?= $i ?>"
                        class="episode-button">
                        Episode <?= $i ?>
                    </a>
                </div>

            <?php endfor; ?>
        </div>
    </div>

</div>
</div>
<?php
$content = ob_get_clean();
Template::render($content);
?>
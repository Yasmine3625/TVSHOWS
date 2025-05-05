<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Episode;

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

ob_start();

// Vérifie les paramètres
if (!isset($_GET['id_saison']) || !is_numeric($_GET['id_saison'])) {
    die("ID de saison non spécifié ou invalide.");
}

$id_saison = intval($_GET['id_saison']);

// Récupère les épisodes pour cette saison
$episodeDb = new Episode();
$episodes = $episodeDb->getEpisodesBySaison($id_saison);

if (empty($episodes)) {
    echo "<p>Aucun épisode trouvé pour cette saison.</p>";
} else {
    ?>
    <form action="modifier_episode.php" method="get">
        <h2>Épisodes de la saison</h2>
        <p><?= count($episodes) ?> épisode(s) trouvé(s)</p>
        <div style="margin: 10px 0;">
            <?php foreach ($episodes as $ep): ?>
                <div style="margin-bottom: 10px;">
                    <label>
                        <input type="radio" name="cle_episode" value="<?= $ep->cle_episode ?>" required>
                        <?= "Episode {$ep->numero} - " . htmlspecialchars($ep->titre) ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-dark">Modifier l'épisode sélectionné</button>
    </form>
    <?php
}

$content = ob_get_clean();
Template::render($content);

<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;

ob_start();

// Vérifie les paramètres GET
if (!isset($_GET['serie']) || !isset($_GET['saison'])) {
    die("Série ou saison non spécifiée.");
}

$cleSerie = $_GET['serie'];
$numSaison = intval($_GET['saison']);

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
$params = ['cleSerie' => $cleSerie];
$saisons = $gdb->exec($querySaison, $params);

if (count($saisons) === 0) {
    die("Saison non trouvée.");
}

$saison = $saisons[0];

// Capture HTML
ob_start();
?>
<div class="saison-page">
    <h1><?= htmlspecialchars($serie->titre) ?> - Saison <?= $numSaison ?></h1>

    <div class="saison-content">
        <?php if (!empty($saison->affichage)): ?>
            <div class="saison-image">
                <img src="/images/images_series/<?=
htmlspecialchars($saison->affichage) ?>" alt="Image de la saison">
            </div>
        <?php endif; ?>

        <div class="saison-details">
            <p><strong>Titre de la saison :</strong> <?=
htmlspecialchars($saison->titre) ?></p>
            <p><strong>Nombre d'épisodes :</strong> <?=
intval($saison->nb_episode) ?></p>
            <ul>
                <?php for ($i = 1; $i <= intval($saison->nb_episode); $i++): ?>
                    <li>
                        <a href="episode.php?serie=<?=
                            urlencode($cleSerie) ?>&saison=<?= $numSaison ?>&episode=<?= $i ?>">
                            Episode <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
Template::render($content);
?>

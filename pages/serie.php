<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;

ob_start();

// Vérifie si une clé de série est fournie
if (!isset($_GET['serie'])) {
    die("Aucune série spécifiée.");
}

$cle = $_GET['serie'];

// Requête vers la base de données
$gdb = new Series();
$query = "SELECT * FROM serie WHERE cle_serie = :cle";
$params = ['cle' => $cle];

$serieData = $gdb->exec($query, $params);
if (count($serieData) === 0) {
    die("Série non trouvée.");
}

$serie = $serieData[0];

// Requête pour récupérer les tags associés à la série
$tagQuery = "
    SELECT tag.nom
    FROM tag
    INNER JOIN serie_tag ON tag.id_tag = serie_tag.cle_tag
    WHERE serie_tag.cle_serie = :cle
";
$tags = $gdb->exec($tagQuery, ['cle' => $cle]);

// Capture du contenu HTML
ob_start();
?>
<div class="serie-page">
    <div class="serie-content" style="display: flex; align-items:
center; gap: 40px;">
        <div class="serie-text">
            <div class="info_serie">
                <div class="gauche">
                    <h1><?= htmlspecialchars($serie->titre) ?></h1>
                    <p><strong>Nombre de saisons :</strong> <?=
intval($serie->nb_saison) ?></p>
                </div>
                <div class="serie-image">
                    <img src="/uploads/<?=
htmlspecialchars($serie->image) ?>" alt="Image de la série">
                </div>
            </div>
            <div class="serie-details">

                <ul>
                    <?php for ($i = 1; $i <=
intval($serie->nb_saison); $i++): ?>
                        <li>
                            <a href="saison.php?serie=<?=
urlencode($serie->cle_serie) ?>&saison=<?= $i ?>">
                                Saison <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
                <?php if (!empty($tags)): ?>
                    <p><strong>Tags :</strong>
                        <?php foreach ($tags as $tag): ?>
                            <span class="tag"><?=
htmlspecialchars($tag->nom) ?></span>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>



<?php
$content = ob_get_clean();
Template::render($content);
?>

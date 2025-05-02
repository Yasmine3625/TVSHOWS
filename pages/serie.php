<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;

ob_start();

if (!isset($_GET['serie'])) {
    die("Aucune série spécifiée.");
}

$cle = $_GET['serie'];

$gdb = new Series();
$query = "SELECT * FROM serie WHERE cle_serie = :cle";
$params = ['cle' => $cle];
$serieData = $gdb->exec($query, $params);
if (count($serieData) === 0) {
    die("Série non trouvée.");
}

$serie = $serieData[0];

// Tags
$tagQuery = "
    SELECT tag.nom
    FROM tag
    INNER JOIN serie_tag ON tag.id_tag = serie_tag.cle_tag
    WHERE serie_tag.cle_serie = :cle
";
$tags = $gdb->exec($tagQuery, ['cle' => $cle]);

// Toutes les saisons de cette série
$saisonQuery = "SELECT * FROM saison WHERE cle_serie = :cle";
$saisons = $gdb->exec($saisonQuery, ['cle' => $cle]);

$img = $saisons[0];
ob_start();
?>
<div class="serie-page">
    <div class="serie-content" style="display: flex; align-items: center; gap: 40px;">
        <div class="serie-text">
            <div class="info_serie">
                <div class="gauche">
                    <h1><?= htmlspecialchars($serie->titre) ?></h1>
                    <p><strong>Nombre de saisons :</strong> <?= intval($serie->nb_saison) ?></p>
                </div>
                <div class="serie-image">
                    <img src="/uploads/<?= htmlspecialchars($serie->image) ?>" alt="Image de la série">
                </div>
            </div>

            <div class="serie-details">
            <div class="tag_box">
                <?php if (!empty($tags)): ?>
                    <p><strong>Tags :</strong>
                        <?php foreach ($tags as $tag): ?>
                            <span class="tag"><?= htmlspecialchars($tag->nom) ?></span>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
                </div>
                <div class="saison-boxes">
                    <?php for ($i = 1; $i <= intval($serie->nb_saison); $i++): ?>
                        <div class="saison-box">

                            <a href="saison.php?serie=<?=
                                urlencode($serie->cle_serie) ?>&saison=<?= $i ?>">
                                Saison <?= $i ?>
                            </a>
                            <img src="/uploads/<?= htmlspecialchars($img->affichage) ?>" alt="Image de la saison"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                        </div>
                    <?php endfor; ?>

                </div>
                <div class="tag_box">
                    <?php if (!empty($tags)): ?>
                        <p><strong>Tags :</strong>
                            <?php foreach ($tags as $tag): ?>
                                <span class="tag"><?= htmlspecialchars($tag->nom) ?></span>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
Template::render($content);
?>
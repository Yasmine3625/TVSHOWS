<?php
session_start();
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;

$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;

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

$tagQuery = "
    SELECT tag.nom
    FROM tag
    INNER JOIN serie_tag ON tag.id_tag = serie_tag.cle_tag
    WHERE serie_tag.cle_serie = :cle
";
$tags = $gdb->exec($tagQuery, ['cle' => $cle]);

$saisonQuery = "SELECT * FROM saison WHERE cle_serie = :cle";
$saisons = $gdb->exec($saisonQuery, ['cle' => $cle]);

$img = $saisons[0]; ?>
<?php
$backgroundImage = "/uploads/" . htmlspecialchars($serie->image);
?>

<?php ob_start();
?>
<div class="serie-overlay">
    <div class="serie-page" style="background-image: url('<?= $backgroundImage ?>');>
    <div class=" serie-content" style="display: flex; align-items: center; gap: 40px;flex-direction: column;">

        <div class="serie-text">
            <div class="info_serie avec-bg"
                style="--image-url: url('/uploads/<?= htmlspecialchars($serie->image) ?>');">
                <div class="gauche">
                    <div style="display:flex; flex-direction: column;">
                        <h1><?= htmlspecialchars($serie->titre) ?></h1>
                        <p><strong>Nombre de saisons :</strong> <?= intval($serie->nb_saison) ?></p>
                        <div class="tag_box" style="font-size: xx-small;">
                            <?php if (!empty($tags)): ?>
                                <p><strong>Tags :</strong>
                                    <?php foreach ($tags as $tag): ?>
                                        <span class="tag"><?= htmlspecialchars($tag->nom) ?></span>
                                    <?php endforeach; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="serie-details">
                        <div style="height: 100px;"></div>
                        <div>
                            <h2>Saison/s :</h2>
                            <?php if ($isAdminLogged): ?>
                                <div class="saison-buttons">
                                    <a href="ajoutsaison.php?serie=<?= urlencode($serie->cle_serie) ?>">+</a>
                                    <form method="POST" action="supprimersaison.php" id="saison-selection-form">
                                        <input type="hidden" name="saison" value="">
                                        <input type="submit" value="-">
                                    </form>
                                </div>
                            <?php endif; ?>

                            <div class="saison-boxes">
                                <?php foreach ($saisons as $index => $saison): ?>
                                    <div class="saison-box">
                                        <?php if ($isAdminLogged): ?>
                                            <input type="radio" name="selected_saison"
                                                value="<?= htmlspecialchars($saison->cle_saison) ?>"
                                                style="position: absolute; top: 5px; left: 5px; z-index: 2;">
                                        <?php endif; ?>
                                        <a href="saison.php?serie=<?= urlencode($serie->cle_serie) ?>&saison=<?= $index + 1 ?>&id_saison=<?= $saison->cle_saison ?>"
                                            class="saison-link">
                                            <div class="saison-image-full" style="position: relative;">
                                                <img src="/uploads/<?= htmlspecialchars($saison->affichage) ?>"
                                                    alt="Image de la saison">
                                                <div class="saison-overlay">
                                                    Saison <?= $index + 1 ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="serie-image">
                    <img src="/uploads/<?= htmlspecialchars($serie->image) ?>" alt="Image de la série">
                </div>
            </div>
        </div>
    </div>
    <div class="section-header">
        <h2>Autres séries à découvrir</h2>
        <p>Explorez notre catalogue complet de séries disponibles.</p>
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

</div>

<?php if ($isAdminLogged): ?>
    <script>
        const radioButtons = document.querySelectorAll('input[name="selected_saison"]');
        const saisonForm = document.getElementById('saison-selection-form');
        const saisonInput = saisonForm.querySelector('input[name="saison"]');

        radioButtons.forEach(button => {
            button.addEventListener('change', () => {
                saisonInput.value = button.value;
            });
        });
    </script>
<?php endif; ?>


<?php
$content = ob_get_clean();
Template::render($content);
?>
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

$img = null;
if (!empty($saisons)) {
    $img = $saisons[0];
}
ob_start();
?>
<div class="serie-page">
    <div class="serie-content" style="display: flex; align-items: center; gap: 40px;flex-direction: column;">
        <div class="serie-text">
            <div class="info_serie avec-bg"
                style="--image-url: url('/uploads/<?= htmlspecialchars($serie->image) ?>');">
                <div class="gauche">
                    <div style="display:flex ; flex-direction: column;">
                        <h1><?= htmlspecialchars($serie->titre) ?></h1>
                        <p><strong>Nombre de saisons :</strong> <?= intval($serie->nb_saison) ?></p>
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

                    <div class="serie-details">
                        <div style="height: 100px;"></div>
                        <div>
                            <h2>Saison/s :</h2>
                            <?php
                            if ($isAdminLogged): ?>
                                <div id="bare-edit-serie"><a href="ajoutsaison.php">Ajout saison</a>

                                    <form id="saison-selection-form" action="supprimersaison.php" method="get"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette saison ?');">
                                        <input type="hidden" name="serie"
                                            value="<?= htmlspecialchars($serie->cle_serie) ?>">
                                        <input type="hidden" name="saison" value="">
                                        <!-- On remplira ce champ avec le numéro de la saison sélectionnée -->

                                        <button type="submit" id="delete-season-button">Supprimer la saison
                                            sélectionnée</button>
                                    </form>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                        <div class="saison-boxes">

                            <?php foreach ($saisons as $index => $saison): ?>
                                <div class="saison-box">
                                    <a href="saison.php?serie=<?= urlencode($serie->cle_serie) ?>&saison=<?= $index + 1 ?>&id_saison=<?= $saison->cle_saison ?>"
                                        class="saison-link">
                                        <div class="saison-image-full">
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



                        <script>
                            const radioButtons = document.querySelectorAll('input[name="selected_saison"]');
                            const saisonForm = document.getElementById('saison-selection-form');
                            const saisonInput = saisonForm.querySelector('input[name="saison"]');

                            radioButtons.forEach(button => {
                                button.addEventListener('change', () => {
                                    saisonInput.value = button.value; // Remplir le champ caché avec le numéro de la saison
                                });
                            });
                        </script>



                    </div>
                </div>
                <div class="serie-image">
                    <img src="/uploads/<?= htmlspecialchars($serie->image) ?>" alt="Image de la série">
                </div>


            </div>


        </div>
    </div>
</div>
</div>
<?php
$content = ob_get_clean();
Template::render($content);
?>
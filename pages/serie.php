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

// Récupérer le nombre de saisons pour cette série
$nbSaisonsQuery = "SELECT COUNT(*) AS nb_saisons FROM saison WHERE cle_serie = :cle";
$nbSaisonsResult = $gdb->exec($nbSaisonsQuery, ['cle' => $cle]);

// Récupérer le nombre de saisons
$nbSaisons = !empty($nbSaisonsResult) ? $nbSaisonsResult[0]->nb_saisons : 0;

// Récupérer les saisons de la série
$saisonQuery = "SELECT * FROM saison WHERE cle_serie = :cle";
$saisons = $gdb->exec($saisonQuery, ['cle' => $cle]);

// La première saison pour afficher l'image
$img = !empty($saisons) ? $saisons[0] : null;

ob_start();
?>

<div class="serie-page">
    <div class="serie-content" style="display: flex; align-items: center; gap: 40px;">
        <div class="serie-text">
            <div class="info_serie">
                <div class="gauche">
                    <h1><?= htmlspecialchars($serie->titre) ?></h1>
                    <p><strong>Nombre de saisons :</strong> <?= $nbSaisons ?></p> <!-- Affichage du nombre de saisons -->
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

                <h2>Saison/s :</h2>
                <a href="ajoutsaison.php">Ajouter une saison</a>

                <form id="saison-selection-form" action="supprimersaison.php" method="get">
                    <input type="hidden" name="serie" value="<?= htmlspecialchars($cle) ?>">
                    <div class="saison-boxes">
                    <?php foreach ($saisons as $index => $saison): ?>
                        <div class="saison-box">
                            <label>
                                <a href="saison.php?serie=<?= urlencode($cle) ?>&saison=<?= $index + 1 ?>" class="saison-link">
                                    Saison <?= $index + 1 ?>
                                </a>
                                <input type="radio" name="selected_saison" value="<?= $index + 1 ?>" form="saison-selection-form">
                            </label>
                            <img src="/uploads/<?= htmlspecialchars($saison->affichage) ?>" alt="Image de la saison"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                        </div>
                    <?php endforeach; ?>
                    </div>

                    <form id="saison-selection-form" action="supprimersaison.php" method="get" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette saison ?');">
                        <input type="hidden" name="serie" value="<?= htmlspecialchars($serie->cle_serie) ?>">
                        <input type="hidden" name="saison" value=""> <!-- On remplira ce champ avec le numéro de la saison sélectionnée -->
                        
                        <button type="submit" id="delete-season-button">Supprimer la saison sélectionnée</button>
                    </form>

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

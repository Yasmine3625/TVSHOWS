<?php
namespace tvshows;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class AjoutSaisonForm
{
    public function generateForm(int $serie): void
    {
        ?>
        <div class="ajout-container">
            <h2>Ajouter une nouvelle saison</h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutsaison.php" enctype="multipart/form-data">
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>

                    <label for="numero_episode">Nombre d'épisodes :</label><br>
                    <input type="number" id="numero_episode" name="numero_episode" min="1" required><br><br>

                    <label for="affichage">L'image :</label><br>
                    <input type="file" id="affichage" name="affichage" accept="image/*" required><br><br>

                    <input type="hidden" id="serie" name="serie" value="<?= htmlspecialchars($serie) ?>">

                    <input type="submit" value="Ajouter la saison">
                </form>
            </div>
        </div>
        <?php
    }
}
?>

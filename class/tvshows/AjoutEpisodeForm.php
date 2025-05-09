<?php
namespace tvshows;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class AjoutEpisodeForm
{
    public function generateForm(int $id_saison): void
    { ?>
        <div class="ajout-container">
            <h2>Ajouter un nouvel épisode</h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutepisode.php" id="ajout_form_episode" enctype="multipart/form-data">
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>

                    <label for="synopsis">Synopsis :</label><br>
                    <textarea id="synopsis" name="synopsis" required></textarea><br><br>

                    <label for="duree">Durée (ex : 45min) :</label><br>
                    <input type="text" id="duree" name="duree" required><br><br>

                    <label for="numero_episode">Numéro de l’épisode :</label><br>
                    <input type="number" id="numero_episode" name="numero_episode" required><br><br>

                    <input type="hidden" name="id_saison" value="<?= htmlspecialchars($id_saison) ?>" />

                    <input type="submit" value="Ajouter l’épisode">
                </form>
            </div>
        </div>
    <?php }
}

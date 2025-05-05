<?php
namespace tvshows;

class AjoutActeurForm
{
    public function generateForm(int $id_saison)
    { ?>
        <div class="ajout-container">
            <h2>Ajouter un acteur : </h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutacteur.php" enctype="multipart/form-data">
                    <label for="nom">Nom :</label><br>
                    <input type="text" id="nom" name="nom" required><br><br>

                    <input type="hidden" name="id_saison" value="<?= htmlspecialchars($id_saison) ?>" />

                    <label for="affichage">Image (fichier) :</label><br>
                    <input type="file" id="affichage" name="affichage" accept="image/*" required><br><br>

                    <input type="submit" value="Ajouter l'acteur">
                </form>
            </div>
        </div>
    <?php }
}
?>

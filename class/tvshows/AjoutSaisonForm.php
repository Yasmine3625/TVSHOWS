<?php
namespace tvshows;

class AjoutSaisonForm
{
    public function generateForm(): void
    { ?>
        <div class="ajout-container">
            <h2>Ajouter une nouvelle saison</h2>

            <div class="ajout_form">
                <form method="POST" action="" enctype="multipart/form-data">
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>

                    <label for="le_fichier">Image (fichier) :</label><br>
                    <input type="file" id="le_fichier" name="le_fichier" accept="image/*" required><br><br>

                    <input type="submit" value="Ajouter la saison">
                </form>
            </div>
        </div>
    <?php }
}

<?php
namespace tvshows;

class AjoutSaisonForm
{
    public function generateForm(): void
    { ?>
        <div class="ajout-container">
            <h2>Ajouter une nouvelle saison</h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutsaison.php">
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>


                    <label for="numero_episode">Numéro de saison :</label><br>
                    <input type="number" id="numero_episode" name="numero_episode" required><br><br>

                    <label for="affichage">L'image :</label><br>
                    <input type="file" id="affichage" name="affichage" accept="image/*" required><br><br>

                    <input type="submit" value="Ajouter la saison">
                </form>
            </div>
        </div>
    <?php }
}

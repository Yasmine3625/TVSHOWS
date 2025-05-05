<?php
namespace tvshows;
class AjoutRealisateurForm
{
    public function generateForm()
    { ?>
        <div class="ajout-container">
            <h2>Ajouter un realisateur : </h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutrealisateur.php">
                    <label for="nom">Nom :</label><br>
                    <input type="text" id="nom" name="nom" required><br><br>

                    <label for="affichage">L'image :</label><br>
                    <input type="file" id="affichage" name="affichage" accept="image/*" required><br><br>

                    <input type="submit" value="Ajouter le realisateur">
                </form>
            </div>
        </div>
    <?php }
}


?>
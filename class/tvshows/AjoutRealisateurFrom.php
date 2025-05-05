<?php
namespace tvshows;

class AjoutRealisateurFrom
{

    public function generateForm(int $cle_episode)
    { ?>
        <div class="ajout-container">
            <h2>Ajouter un realisateur : </h2>

            <div class="ajout_form">
                <form method="POST"  action="ajoutrealisateur.php" enctype="multipart/form-data">

                    <label for="nom">Nom :</label><br>
                    <input type="text" id="nom" name="nom" required><br><br>

                    <label for="affichage">L'image :</label><br>
                    <input type="file" id="affichage" name="affichage" accept="image/*" required><br><br>
                    <input type="hidden" name="cle_episode" value="<?= htmlspecialchars($cle_episode) ?>" />


                    <input type="submit" value="Ajouter le realisateur">
                </form>
            </div>
        </div>
    <?php }
}


?>
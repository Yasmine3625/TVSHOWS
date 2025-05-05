<?php
namespace tvshows;
class AjoutRealisateur
{
    public function generateForm()
    { ?>
        <div class="ajout-container">
            <h2>Ajouter un realisateur : </h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutepisode.php">
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>

                    <label for="synopsis">Synopsis :</label><br>
                    <textarea id="synopsis" name="synopsis" required></textarea><br><br>

                    <label for="duree">Durée (ex : 45min) :</label><br>
                    <input type="text" id="duree" name="duree" required><br><br>


                    <label for="numero_episode">Numéro de l’épisode :</label><br>
                    <input type="number" id="numero_episode" name="numero_episode" required><br><br>

                    <input type="submit" value="Ajouter l’épisode">
                </form>
            </div>
        </div>
    <?php }
}


?>
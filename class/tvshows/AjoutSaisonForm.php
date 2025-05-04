<?php
namespace tvshows;

class AjoutSaisonForm
{
    public function generateForm(): void
    { ?>
        <div class="ajout-container">
            <h2>Ajouter une nouvelle série</h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutserie.php" enctype="multipart/form-data">
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>

                    <label>Nombre d'episode :</label><br>
                    <input type="int" id="titre" name="nb_episode" required><br><br>

                    </div>

                    <script>
                        function toggleTags() {
                            const container = document.getElementById("tag-checkboxes");
                            container.style.display = container.style.display === "none" ? "block" : "none";
                        }
                    </script>

                    <br>
                    <label for="le_fichier">Image (fichier) :</label><br>
                    <input type="file" id="le_fichier" name="le_fichier" accept="image/*" required><br><br>

                    <input type="submit" value="Ajouter la série">
                </form>
            </div>
        </div>
    <?php }
}

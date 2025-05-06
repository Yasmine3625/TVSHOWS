<?php
namespace tvshows;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class AjoutSerieForm
{
    public function generateForm(): void
    { ?>
        <div class="ajout-container">
            <h2>Ajouter une nouvelle série</h2>

            <div class="ajout_form">
                <form method="POST" action="ajoutserie.php" enctype="multipart/form-data">
                    <label for="titre">Titre :</label><br>
                    <input type="text" id="titre" name="titre" required><br><br>

                    <label>Tags :</label><br>
                    <button type="button" onclick="toggleTags()">Choisir les tags</button>

                    <div id="tag-checkboxes" style="display: none; margin-top: 10px;">
                        <?php
                        $tagDb = new \tvshows\Tags();
                        $tags = $tagDb->exec("SELECT * FROM tag ORDER BY nom", null, null);

                        foreach ($tags as $tag) {
                            echo "<label><input type='checkbox' name='tags[]' value='" . htmlspecialchars($tag->id_tag) . "'> " . htmlspecialchars($tag->nom) . "</label><br>";
                        }
                        ?>
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
?>

<?php
namespace tvshows;

class Selection
{
    private array $series;

    public function __construct()
    {
        $gdb = new Series();
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $this->series = $gdb->getSeriesByCategory($_GET['category']);
        } else {
            $this->series = $gdb->getAllSeries();
        }
    }

    public function generateShop()
    {
        ?>
        <form class="browser" action="ajoutsaison.php" method="post" autocomplete="off">
            <header>
                <div style="padding: 5px">
                    SÉRIES : <span id="num-series"></span>
                </div>
                <button type="submit" class="btn btn-dark" id="add-to-cart">Ajouter au panier</button>
            </header>
            <div class="browser-content-wrapper">
                <div id="list-serie">
                    <?php foreach ($this->series as $s): ?>
                        <div class="serie-card">
                            <?php echo $s->getHTML(true); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Script pour afficher le bouton radio après avoir cliqué sur l'image -->
            <script>
                // Fonction pour afficher le bouton radio après avoir cliqué sur l'image
                function showSelection(serieId) {
                    // Cacher tous les boutons radio
                    var radios = document.querySelectorAll('.form-check-input');
                    radios.forEach(function(radio) {
                        radio.style.display = 'none';
                    });
    
                    // Montrer le bouton radio correspondant à l'image cliquée
                    var selectedRadio = document.getElementById(serieId);
                    selectedRadio.style.display = 'block';
                    // Cocher le bouton radio
                    selectedRadio.checked = true;
                }
            </script>
        </form>
        <?php
    }
    

    

    public function generateGrid()
    {
        ?>
        <div class="browser-content-wrapper">
            <div id="list-serie">
                <?php foreach ($this->series as $serie): ?>
                    <div class="serie-card">
                        <?php echo $serie->getHTML(true); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php
    }


}

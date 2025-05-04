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
                    <div class="serie-card" onclick="selectSerie('<?php echo $s->getId(); ?>')">
                        <input
                            type="radio"
                            name="selected_serie"
                            value="<?php echo $s->getId(); ?>"
                            id="radio-<?php echo $s->getId(); ?>"
                            class="serie-radio"
                        >
                        <?php echo $s->getHTML(true); ?>
</div>

<?php endforeach; ?>

                </div>
            </div>
            <script>
                function showSelection(serieId) {
                    var radios = document.querySelectorAll('.form-check-input');
                    radios.forEach(function(radio) {
                        radio.style.display = 'none';
                    });
    
                    var selectedRadio = document.getElementById(serieId);
                    selectedRadio.style.display = 'block';
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

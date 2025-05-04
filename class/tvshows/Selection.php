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
        <form class="browser" action="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>pages/add_to_cart.php" method="post" autocomplete="off">
            <header>
                <button type="submit" class="btn btn-dark" id="add-to-cart">Ajouter </button>
            </header>
            <div class="browser-content-wrapper">
                <div id="list-serie">
                    <?php foreach ($this->series as $s): ?>
                        <div class="serie-card" style="cursor: pointer;">
                            <?php echo $s->getHTML(true); ?>
                            <legend>
                                <input class="form-check-input" type="radio" name="selection[]"
                                        value="<?php echo $s->getId(); ?>"
                                        id="serie-<?php echo $s->getId(); ?>">
                            </legend>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Ajout du script pour gérer la sélection au clic -->
            <script>
                document.querySelectorAll('.serie-card').forEach(card => {
                    card.addEventListener('click', () => {
                        const checkbox = card.querySelector('input[type="checkbox"]');
                        if (checkbox) {
                            checkbox.checked = !checkbox.checked;
                        }
                    });
                });
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

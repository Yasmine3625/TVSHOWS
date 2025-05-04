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
                <div style="padding: 5px">
                    SÉRIES : <span id="num-series"></span>
                </div>
                <button type="submit" class="btn btn-dark" id="add-to-cart">Ajouter au panier</button>
            </header>
            <div class="browser-content-wrapper">
                <div class="browser-content">
                    <?php foreach ($this->series as $s): ?>
                        <div class="serie-card">
                            <?php echo $s->getHTML(true); ?>
                            <legend>
                                <label for="serie-<?php echo $s->getId(); ?>">
                                    <?php echo htmlspecialchars($s->getTitle()); ?>
                                </label>
                                <input class="form-check-input" type="checkbox" name="selection[]"
                                       value="<?php echo $s->getId(); ?>"
                                       id="serie-<?php echo $s->getId(); ?>">
                            </legend>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
        <?php
    }

    public function generateGrid()
    {
        ?>
        <div class="browser-content-wrapper">
            <div class="browser-content" style='
    flex: 1;
    overflow-y: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 10px;'>
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

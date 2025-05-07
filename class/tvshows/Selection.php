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
        <form class="browser" action="modifier_serie.php" method="get" autocomplete="off">

            <div style="padding: 5px">
                SERIES DISPONIBLES : <?= count($this->series) ?>
            </div>

            <button type="submit" class="btn btn-dark">Modifier la serie selectionnee</button>

            <div class="browser-content-wrapper">
                <div id="list-serie">
                    <?php foreach ($this->series as $serie): ?>
                        <div class="serie-card">
                            <label>
                                <input type="radio" name="cle_serie" value="<?= $serie->cle_serie ?>" required>
                                <?= htmlspecialchars($serie->titre) ?> (<?= $serie->nb_saison ?> saisons)
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </form>
        <?php
    }
}
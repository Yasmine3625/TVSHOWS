<?php
session_start();

require_once __DIR__ . "/Autoloader.php";
require_once __DIR__ . "/config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\SeriesRenderer;
use tvshows\Tags;
use tvshows\TagsRenderer;

$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
?>


<?php ob_start(); ?>

<div id="home-container">
    <div id="tag-bar">



        <?php if ($isAdminLogged): ?>
            <div id="bare-edit-serie">
                <div class="admin-buttons">
                    <a href="/../pages/ajoutserie.php">+</a>
                    <form method="GET" action="/../pages/supprimerserie.php" id="serie-selection-form">
                        <input type="hidden" name="selected_serie" id="hidden-serie-id">
                        <input type="submit" value="–">
                    </form>
                    <form method="GET" action="/../pages/modifier_serie.php" id="serie-edit-form">
                        <input type="hidden" name="serie" value="">
                        <input type="submit" value="modif">
                    </form>

                </div>
            </div>

        <?php endif; ?>

        <div class="category-menu">
            <h2 class="category-title">Catégories</h2>
            <a href="/index.php" class="category-item">Tout</a>
            <?php
            $tagDb = new Tags();
            $tags = $tagDb->getAllTags();

            foreach ($tags as $tag) {
                echo $tag->getHTML();
            }
            ?>
        </div>

    </div>

    <div id="list-serie-container">
        <?php
        $gdb = new Series();

        ?>
        <div id="rslt">
            <?php
            if (isset($_GET['category']) && !empty($_GET['category'])) {
                $category = $_GET['category'];
                echo "<h2 style='margin: 1em;'>Résultats pour la catégorie : " . htmlspecialchars($category) . "</h2>";
                $series = $gdb->getSeriesByCategory($category);
            } else {
                $series = $gdb->getAllSeries();
            }
            ?>
        </div>
        <div id="affichage-series">
            <div id="diapo">
                <?php
                $diapoSeries = array_slice($series, 0, 5);
                foreach ($diapoSeries as $s) {
                    echo $s->getDiapoHTML();

                }
                ?>
            </div>


            <div id="list-serie">
                <?php
                foreach ($series as $s) {
                    echo $s->getHTML(); ?>
                    <?php if ($isAdminLogged): ?>
                        <input type="radio" name="selected-serie" value="<?= htmlspecialchars($s->getId()) ?>"
                            form="serie-selection-form">
                    <?php endif; ?>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    const slides = document.querySelectorAll('.diapo-slide');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    showSlide(currentSlide);
    setInterval(nextSlide, 6000);

    document.querySelectorAll('input[name="selected-serie"]').forEach(radio => {
        radio.addEventListener('change', function () {
            document.getElementById('hidden-serie-id').value = this.value;
        });
    });

</script>


<?php


$content = ob_get_clean();

Template::render($content);
?>
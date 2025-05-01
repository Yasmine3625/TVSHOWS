<?php
namespace tvshows;
use tvshows\Series;

class SeriesRenderer
{
    //on enleve le $image et on met $this->image
    public function getHTML()
    {
        ?>
        <div id="image-serie">
            <div id="image-container">
                <a href="pages/serie.php?serie=<?= urlencode($this->image) ?>">
                    <img src="<?= $GLOBALS['DOCUMENT_DIR'] . "../uploads/" . $$this->image ?>" alt="imageSerie">
                </a>
            </div>
            <div class="serie-label"><?= htmlspecialchars($$this->name) ?></div>
        </div>
        <?php
    }

}


?>
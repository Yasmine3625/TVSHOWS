<?php
namespace tvshows;
use tvshows\Series;

class SeriesRenderer
{
    //on enleve le $image et on met $this->image
    public function getHTML($image)
    {
        ?>

        <div id="image-serie">
            <div id="image-container">
                <img src="<?= $GLOBALS['DOCUMENT_DIR'] . "../uploads/" . $image ?>" alt="imageSerie">
            </div>
            <div class="serie-label">Serie</div>
        </div>



        <?php
    }
}


?>
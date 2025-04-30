<?php
use tvshows\Series;

class SeriesRenderer
{
    public function getHTML()
    {
        ?>
        <div id="image-serie">
            <img src="<?= $GLOBALS['DOCUMENT_DIR'] . "../" . \tvshows\Series::UPLOAD_DIR . $this->image ?>" alt="imageSerie">
            <legend style="justify-content: center;">
                <label>Serie</label>
            </legend>
        </div>


        <?php
    }
}


?>
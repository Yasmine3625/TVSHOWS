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
            <!-- on remplace le /uploads/   -->
            <img src="<?= $GLOBALS['DOCUMENT_DIR'] . "../uploads/" . $image ?>" alt="imageSerie">
            <legend style="justify-content: center; height: 20px;">
                <label>Serie</label>
            </legend>
        </div>


        <?php
    }
}


?>
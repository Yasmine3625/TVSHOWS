<?php
namespace tvshows;

class Series
{
    public $file;
    function __construct()
    {

    }

    function generateSeries()
    {
        if ($this->file == null) {
            for ($i = 0; $i < 20; $i++): ?>
                <div id="image-serie">
                    <img src="" alt="imageSerie">
                    <legend style="justify-content: center;">
                        <label>Serie</label>
                    </legend>
                </div>


            <?php endfor;

        } else {
            $data = json_decode($this->file);


            foreach ($data as $card): ?>
                <div id="image-serie">
                    <img src="<?php ?>" alt="image">
                    <legend style="justify-content: center;">
                        <label for="<?php ?>"><?php ?></label>
                    </legend>
                </div>


            <?php endforeach; ?>
        <?php }



    }

}

?>
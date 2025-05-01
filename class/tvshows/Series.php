<?php

namespace tvshows;

include __DIR__ . "/../../DB_CREDENTIALS.php";

use PdoWrapper;

class Series extends PdoWrapper
{
    public $file;

    public const UPLOAD_DIR = "uploads/";

    public function __construct()
    {
        parent::__construct(
            $GLOBALS['db_name'],
            $GLOBALS['db_host'],
            $GLOBALS['db_port'],
            $GLOBALS['db_user'],
            $GLOBALS['db_pwd']
        );
    }

    public function getAllSeries()
    {
        $query = "SELECT * FROM serie";
        return $this->exec($query, []);
    }

    public function generateSeries()
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
            <?php endforeach;
        }
    }
}

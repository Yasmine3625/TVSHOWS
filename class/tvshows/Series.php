<?php

namespace tvshows;
require_once __DIR__ . "/Autoloader.php";
require_once __DIR__ . "/config.php";
use PdoWrapper;

include __DIR__ . "../../../DB_CREDENTIALS.php";

class Series
{
    public $file;

    public const UPLOAD_DIR = "uploads/";

    public function __construct()
    {
        // // appel au constructeur de la classe mère
        // parent::__construct(
        //     $GLOBALS['db_name'],
        //     $GLOBALS['db_host'],
        //     $GLOBALS['db_port'],
        //     $GLOBALS['db_user'],
        //     $GLOBALS['db_pwd']
        // );
    }

    public function ajoutSerie($name, $imgFile = null)
    {

        $name = htmlspecialchars($name);

        $imgName = null;
        // enregistrement du fichier uploadé
        if ($imgFile != null) {
            $tmpName = $imgFile['tmp_name'];
            $imgName = $imgFile['name'];
            $imgName = urlencode(htmlspecialchars($imgName));

            $dirname = $GLOBALS['PHP_DIR'] . self::UPLOAD_DIR;
            if (!is_dir($dirname))
                mkdir($dirname);
            $uploaded = move_uploaded_file($tmpName, $dirname . $imgName);
            if (!$uploaded)
                die("FILE NOT UPLOADED");
        } else
            echo "NO IMAGE !!!!";

        $query = ''; //requette pour ajouter une serie 
        $params = [
            'name' => htmlspecialchars($name),
            //+ les autres paramettres 

        ];
        return $this->exec($query, $params);
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